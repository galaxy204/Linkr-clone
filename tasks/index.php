<?php
require('../core/init.php');
restrict_without_login(url('/users/signin.php'));

$ip = $_SERVER['REMOTE_ADDR'];
$id = $_SESSION['userid'];
$user_full_name = $_SESSION['fullname'];
$avatar = $_SESSION['avatar'];
$user = $_SESSION['username'];
$time = $_SESSION['time'];


/*
|------------------------------------------------------------------------------------------------
| 1. SEARCH USERS FROM DB
|------------------------------------------------------------------------------------------------
*/
if ( isset($_POST['searchBy']) ) {
    $users = query($conn,
                    "SELECT fullname, id from users");
    $searchedUsers = '';
    foreach ( $users as $user ) {
        $searchedUsers .= '<option value="'. $user["id"] .'" title="|'.  $user["id"] . ',' .'">'. $user["fullname"] .'</option>';
    }
    echo $searchedUsers;
    exit;
}


/*
|------------------------------------------------------------------------------------------------
| 2. SEARCH USERS WITH SELECTED INCLUDING SELECTED
|------------------------------------------------------------------------------------------------
*/
if ( isset($_POST['searchAssignBy']) ) {
    $e_task_id = htmlspecialchars($_POST['eTaskId']);

    // Previously assigned users
    $assigned_users = query($conn,
        "SELECT users.id, users.fullname
                        FROM tasks_assigned
                        INNER  JOIN tasks ON tasks_assigned.task_id = tasks.id
                        INNER JOIN users ON tasks_assigned.as_user_id = users.id
                        WHERE  tasks.id = $e_task_id",
        array());

    $ex_ids = '';
    $count = count($assigned_users);

    for( $i = 0; $i < $count; $i++ ) {

        if( $i < $count - 1 ) {
            $ex_ids .= $assigned_users[$i]['id'] . ',';
        } else {
            $ex_ids .= $assigned_users[$i]['id'];
        }

    }

    // non assigned users
    $non_assigned_users = query($conn,
        "SELECT users.id, users.fullname FROM users
                    LEFT JOIN tasks_assigned ON tasks_assigned.as_user_id = users.id
                    WHERE users.id NOT IN($ex_ids)",
        array());


    $searchedUsers = '';
//    foreach ( $assigned_users as $assigned_user ) {
//        $searchedUsers .= '<option selected value="'. $assigned_user["id"] .'" title="|'.  $assigned_user["id"] . ',' .'">'. $assigned_user["fullname"] .'</option>';
//    }

    foreach ( $non_assigned_users as $non_assigned_user ) {
        $searchedUsers .= '<option value="'. $non_assigned_user["id"] .'" title="|'.  $non_assigned_user["id"] . ',' .'">'. $non_assigned_user["fullname"] .'</option>';
    }

    echo $searchedUsers;
    exit;
}


if( isset($_POST['eAssigned']) ) {
    $e_assigned = $_POST['eAssigned'];
    $e_task_id = $_POST['eId'];

    if( $e_assigned !== "" ) {
        $delete_prev_assigned_users = query($conn,
                                            "DELETE FROM tasks_assigned WHERE task_id = :task_id",
                                            array('task_id' => $e_task_id));

        $e_assigned = explode(',', $e_assigned, -1);

        $return_user_fullname = '';

        foreach ( $e_assigned as $assign ) {
            $e_assigned = explode('|', $assign);

            $as_user_id = $e_assigned[1];
            $as_user_fullname = $e_assigned[0];

            $return_user_fullname .=  $e_assigned[0] . ', ';

            $insert_assigned_users = query_insert($conn,
                "INSERT INTO tasks_assigned (task_id, as_user_id, as_user_fullname) VALUES(:task_id, :as_user_id, :as_user_fullname)",
                array('task_id' => $e_task_id, 'as_user_id' => $as_user_id, 'as_user_fullname' => $as_user_fullname ));
        }

        echo $return_user_fullname;
        exit;
    }


    echo "error";
    exit;
}






/***********************************************************************************************/
/* 2. SAVE ATTACH FILES TO A TMP FOLDER */
/***********************************************************************************************/
if ( isset($_FILES["file"]["type"]) ) {
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];

    $user = trim($_SESSION['username']);
    $time = trim($_SESSION['time']);

    if ( $file_size > 6144000 ) {
        echo "size_error";
        exit;
    }

    if ( $file_error > 0 ) {
        echo "file_error";
        exit;
    }

    if ( file_exists("../users/users_files/tmp_files/$file_name") ) {
        echo "file_exist";
        exit;
    } else {

        $source_path = $tmp_name;
        $time = preg_replace('#[ ]#i', '', microtime());
        $file_name = $time . $file_name;
        $target_path = "../users/users_files/tmp_files/" . $file_name;

        move_uploaded_file($source_path, $target_path);

        // Check file has been uploaded successfully.
        if ( file_exists($target_path) ) {
            echo $target_path;
            exit;
        } else {
            echo "file_error";
            exit;
        }
    }
}



/*
|------------------------------------------------------------------------------------------------
| 3. CREATE NEW TASKS
|------------------------------------------------------------------------------------------------
*/
if( isset( $_POST['title'] ) ) {
    $title = htmlspecialchars( $_POST['title'] );
    $desc = htmlspecialchars( $_POST['desc'] );
    $assigned = htmlspecialchars( $_POST['assigned'] );
    $dueDate = htmlspecialchars( trim( $_POST['dueDate'] ) );
    $dueTime = date('h:m a');
    $priority = htmlspecialchars( trim( $_POST['priority'] ) );
    $state = htmlspecialchars( trim( $_POST['state'] ) );
    $attachments = htmlspecialchars( trim( $_POST['attachments'] ) );

   if( $title == "" ) {
       return "Title field is required!";
       exit;
   }

    if( strlen($title) < 3 ) {
        return "Title field must be at lest 3 characters!";
        exit;
    }

    $insert_new_task = query_insert($conn,
                            "INSERT INTO tasks (user_id, user_full_name, title, description, due_date, due_time, priority, state, date) VALUES(:user_id, :user_full_name, :title, :description, :due_date, :due_time, :priority, :state, NOW())",
                            array('user_id' => $id, 'user_full_name' => $user_full_name, 'title' => $title, 'description' => $desc, 'due_date' => $dueDate, 'due_time' => $dueTime, 'priority' => $priority, 'state' => $state));

    if( $insert_new_task === true ) {
        $task_id = query($conn, "SELECT id FROM tasks WHERE user_id = :user_id ORDER BY id DESC LIMIT 1", array('user_id' => $id))[0]['id'];

        if( $assigned !== "" ) {
            $assigned = explode(',', $assigned, -1);

            foreach ( $assigned as $assign ) {
                $assigned = explode('|', $assign);

                $as_user_id = $assigned[1];
                $as_user_fullname = $assigned[0];
                $insert_assigned_users = query_insert($conn,
                                        "INSERT INTO tasks_assigned (task_id, as_user_id, as_user_fullname) VALUES(:task_id, :as_user_id, :as_user_fullname)",
                                        array('task_id' => $task_id, 'as_user_id' => $as_user_id, 'as_user_fullname' => $as_user_fullname ));
            }
        }

        if( $attachments !== "" ) {
            $attachments = explode(',', $attachments, -1);

            foreach( $attachments as $attachment ) {
                $attachment = explode('|', $attachment);

                $attachment_image_tmp_path = $attachment[0];
                $attachment_desc = $attachment[1];

                $attachment_image = $attachment[0];
                $attachment_image = explode('/', $attachment_image);

                $attachment_image_per_path = $attachment_image[0]."/".$attachment_image[1]."/".$attachment_image[2]."/" . $user . $time ."/" .$attachment_image[4];

                if( file_exists($attachment_image_tmp_path) ) {
                    copy($attachment_image_tmp_path, $attachment_image_per_path);
                    unlink($attachment_image_tmp_path);

                    $attachment_image_url = url('/') . $attachment_image[1]."/".$attachment_image[2]."/" . $user . $time ."/" .$attachment_image[4];

                    $insert_tasks_attachments = query_insert($conn,
                                                    "INSERT INTO tasks_attachments (task_id, a_image, a_description) VALUES(:task_id, :a_image, :a_description)",
                                                    array('task_id' => $task_id, 'a_image' => $attachment_image_url, 'a_description' => $attachment_desc));
                }
            }
        }
        echo 'ok';
        exit;
    }
    return "<p> Some Problem has been occured!</p>";
    exit;
}



/*
|------------------------------------------------------------------------------------------------
| 4. UPDATE TASK FIELDS
|------------------------------------------------------------------------------------------------
*/
/*
 * Update title
 */
if( isset($_POST['etitle']) ) {
    $e_task_id = htmlspecialchars(trim($_POST['eId']));
    $e_task_title = htmlspecialchars($_POST['etitle']);

    if( strlen($e_task_title) < 3 ) {
        return "The title must be atlest 3 characters long!";
        exit;
    }

    $update_task_title = query_update($conn,
                                "UPDATE tasks SET title = :title WHERE id = :id LIMIT 1",
                                array('title' => $e_task_title, 'id' => $e_task_id));
    if( $update_task_title ) {
        echo "ok";
        exit;
    } else {
        echo "updated";
        exit;
    }
    exit;
}


/*
 * Update description
 */
if( isset($_POST['edescription']) ){
    $e_task_id = htmlspecialchars(trim($_POST['eId']));
    $e_task_description = htmlspecialchars($_POST['edescription']);

    $update_task_description = query_update($conn,
        "UPDATE tasks SET description = :description WHERE id = :id LIMIT 1",
        array('description' => $e_task_description, 'id' => $e_task_id));
    if( $update_task_description ) {
        echo "ok";
        exit;
    } else {
        echo "updated";
        exit;
    }
    exit;
}



// Update due date
if( isset($_POST['eDueDate']) ) {
    $e_due_date = htmlspecialchars($_POST['eDueDate']);
    $e_due_time = date('h:m a');
    $e_id = htmlspecialchars($_POST['eId']);

    $update_due_date = query_update($conn,
        "UPDATE tasks SET due_date = :due_date, due_time = :due_time WHERE id = :id LIMIT 1",
        array('due_date' => $e_due_date, 'due_time' => $e_due_time, 'id' => $e_id));
    if( $update_due_date ) {
        return "ok";
    } else {
        echo "error";
        exit;
    }
}


// Update priority
if( isset($_POST['ePriority']) ) {
    $e_priority = htmlspecialchars($_POST['ePriority']);
    $e_id = htmlspecialchars($_POST['eId']);

    $update_task_priority = query_update($conn,
        "UPDATE tasks SET priority = :priority WHERE id = :id LIMIT 1",
        array('priority' => $e_priority, 'id' => $e_id));
    exit;
}

// Update state
if( isset($_POST['eState']) ) {
    $e_state = htmlspecialchars($_POST['eState']);
    $e_state_id = htmlspecialchars($_POST['eId']);

    $update_task_state = query_update($conn,
        "UPDATE tasks SET state = :state WHERE id = :id LIMIT 1",
        array('state' => $e_state, 'id' => $e_state_id));
    exit;
}




/*
|------------------------------------------------------------------------------------------------
| 3. SAVE TASKS COMMENTS ATTACHMENT FILES TO TMP FOLDER
|------------------------------------------------------------------------------------------------
*/
if ( isset($_FILES["commentFile"]["type"]) ) {
    $file_type = $_FILES['commentFile']['type'];
    $file_size = $_FILES['commentFile']['size'];
    $file_error = $_FILES['commentFile']['error'];
    $tmp_name = $_FILES['commentFile']['tmp_name'];
    $file_name = $_FILES['commentFile']['name'];

    $user = trim($_SESSION['username']);
    $time = trim($_SESSION['time']);

    if ( $file_size > 6144000 ) {
        echo "size_error";
        exit;
    }

    if ( $file_error > 0 ) {
        echo "file_error";
        exit;
    }

    if ( file_exists("../users/users_files/tmp_files/$file_name") ) {
        echo "file_exist";
        exit;
    } else {

        $source_path = $tmp_name;
        $time = preg_replace('#[ ]#i', '', microtime());
        $file_name = $time . $file_name;
        $target_path = "../users/users_files/tmp_files/" . $file_name;

        move_uploaded_file($source_path, $target_path);

        // Check file has been uploaded successfully.
        if ( file_exists($target_path) ) {
            echo $target_path;
            exit;
        } else {
            echo "file_error";
            exit;
        }
    }
}




/*
|------------------------------------------------------------------------------------------------
| 4. INSERT TASK COMMENT
|------------------------------------------------------------------------------------------------
*/
if( isset( $_POST['taskComment'] ) ) {
    $task_comment = htmlspecialchars( $_POST['taskComment'] );
    $task_id = htmlspecialchars( $_POST['taskId'] );
    $attachments = htmlspecialchars( trim( $_POST['attachments'] ) );

    $insert_task_comment = query_insert($conn,
        "INSERT INTO tasks_comments (task_id, task_comm,task_comm_user_id) VALUES(:task_id, :task_comm, :task_comm_user_id)",
        array('task_id' => $task_id, 'task_comm' => $task_comment, 'task_comm_user_id' => $id ));

    if( $insert_task_comment === true ) {
        $task_comm_id = query($conn, "SELECT task_comm_id FROM tasks_comments WHERE task_id = :task_id ORDER BY task_comm_id DESC LIMIT 1", array('task_id' => $task_id))[0]['task_comm_id'];

        $record_in_like_tracking = query_insert($conn, "INSERT INTO task_comm_user_tracking (task_comm_id) VALUES($task_comm_id)", array());

        if( $attachments !== "" ) {
            $attachments = explode(',', $attachments, -1);

            foreach( $attachments as $attachment ) {
                $attachment = explode('|', $attachment);

                $attachment_image_tmp_path = $attachment[0];
                $attachment_desc = $attachment[1];

                $attachment_image = $attachment[0];
                $attachment_image = explode('/', $attachment_image);

                $attachment_image_per_path = $attachment_image[0]."/".$attachment_image[1]."/".$attachment_image[2]."/" . $user . $time ."/" .$attachment_image[4];

                if( file_exists($attachment_image_tmp_path) ) {
                    copy($attachment_image_tmp_path, $attachment_image_per_path);
                    unlink($attachment_image_tmp_path);

                    $attachment_image_url = url('/') . $attachment_image[1]."/".$attachment_image[2]."/" . $user . $time ."/" .$attachment_image[4];

                    $insert_tasks_attachments = query_insert($conn,
                        "INSERT INTO tasks_comm_attachments (task_comm_id, task_comm_image, task_comm_desc) VALUES(:task_comm_id, :task_comm_image, :task_comm_desc)",
                        array('task_comm_id' => $task_comm_id, 'task_comm_image' => $attachment_image_url, 'task_comm_desc' => $attachment_desc));
                }
            }
        }


        /*
        |------------------------------------------------------------------------------------------------
        | 4.1. Return task comment
        |------------------------------------------------------------------------------------------------
        */
        $task_comms = query($conn,
                        "SELECT tasks_comments.*,
                        users.avatar,
                        users.fullname,
                        users.id AS user_id,
                        GROUP_CONCAT( DISTINCT tasks_comm_attachments.task_comm_image) AS task_comm_image,
                        GROUP_CONCAT( DISTINCT tasks_comm_attachments.task_comm_desc) AS task_comm_desc
                        FROM tasks_comments
                        LEFT JOIN tasks_comm_attachments ON tasks_comm_attachments.task_comm_id = tasks_comments.task_comm_id
                        LEFT JOIN tasks ON tasks.id = tasks_comments.task_id
                        LEFT JOIN users ON  users.id = tasks.user_id
                        WHERE tasks_comments.task_id = :task_id
                        GROUP  BY tasks_comments.task_comm_id
                        ORDER BY tasks_comments.task_comm_id DESC",
                        array('task_id' => $task_id));

        $return_task_comm = '';
        ?>
        <?php foreach( $task_comms as $task_comm ) : ?>
            <?php $return_task_comm .= '<li id="' . $task_comm["task_comm_id"]  .'" class="comment-item">' ;?>
                <?php $return_task_comm .='<img class="thumb-sm avatar pull-left" width="15" src="' . ternary($task_comm['avatar']) .'">';?>
                <?php $return_task_comm .='<span class="comment-username">' ;?>
                    <?php $return_task_comm .='<a href="'. url('/userprofile?id=') . ternary($task_comm['user_id']) .'">' . ternary($task_comm['fullname']) .'</a>' ;?>
                    <?php $return_task_comm .= ternary($task_comm['task_comm_time']) ;?>
                    <?php $return_task_comm .='<span class="task-comm-btn-area" id="' . ternary( $task_comm["task_comm_id"] ) .'">' ;?>
                        <?php if( isTaskCommliked($conn, $task_comm['task_comm_id'], $id) ) : ?>
                            <?php $return_task_comm .='<button type="button" class="btn btn-primary" onclick="updateTaskCommUnlike(\''. ternary( $task_comm["task_comm_id"] ) .'\');"><i class="fa fa-thumbs-o-up"></i> Like' . ( $task_comm['task_comm_num'] != 0 ) ? ternary($task_comm['task_comm_num']) : "" .'</button>';?>
                        <?php else : ?>
                            <?php $return_task_comm .='<button type="button"  class="btn btn-white" onclick="updateTaskCommLike(\'' . ternary( $task_comm["task_comm_id"] ) . '\');"><i class="fa fa-thumbs-o-up"></i> Like' . ( $task_comm['task_comm_num'] != 0 ) ? ternary($task_comm['task_comm_num']) : "" . '</button>' ;?>
                        <?php endif; ?>
                    <?php $return_task_comm .='</span>' ;?>
                    <?php if( isOwnTaskComment($conn, $task_comm['task_comm_id'], $id) ) : ?>
                        <?php $return_task_comm .='<button type="button"  class="btn btn-white" onclick="deleteTaskComment(\'' . ternary( $task_comm["task_comm_id"] ) .'\');"><i class="fa fa-trash-o"></i> Delete</button>' ;?>
                    <?php endif; ?>
                <?php $return_task_comm .='</span>' ;?>
                <?php $return_task_comm .='<p class="comment-text" style="margin-bottom:0px">' . ternary($task_comm['task_comm']) .'</p>' ;?>
                    <?php $return_task_comm .='<span class="list-comment-attachment">' ;?>

                        <?php if( isset($task_comm['task_comm_image']) ) : ?>
                            <?php $task_comm_images = explode(',', $task_comm['task_comm_image']);?>
                            <?php foreach($task_comm_images as $task_comm_image ) : ?>

                                <?php $return_task_comm .='<figure class="list-img-item">' ;?>
                                    <?php $return_task_comm .='<img src="' . $task_comm_image .'" class="popup">' ;?>
                                    <?php $return_task_comm .='<figcaption class="list-img-title">';?>
                                        <?php if(isset($task_comm['task_comm_desc'])) : ?>

                                            <?php $task_comm_desc = explode(',', $task_comm['task_comm_desc']); $i = 0; ?>
                                            <?php if(isset($task_comm_desc[$i])) : ?>
                                                <?php $return_task_comm .='<h5>' . $task_comm_desc[$i] . $i++ . '</h5>' ;?>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    <?php $return_task_comm .='</figcaption>' ;?>
                                <?php $return_task_comm .='</figure>' ;?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php $return_task_comm .='</span>' ;?>
                    <?php $return_task_comm .='<div class="row clear" style="margin-top: 10px;margin-left: 30px;"></div>' ;?>
            <?php $return_task_comm .='</li>' ;?>
        <?php endforeach; ?>
        <?php $return_task_comm ;?>

        <?php
        echo $return_task_comm;
        exit;
    }
    return "<p> Some Problem has been occured!</p>";
    exit;
}




/*
|------------------------------------------------------------------------------------------------
| 5. UPDATE TASK COMM LIKE
|------------------------------------------------------------------------------------------------
*/
if( isset($_POST['taskCommLikeId']) ) {
    $task_comm_id = htmlspecialchars($_POST['taskCommLikeId']);
    $task_comm_user_id = $id;

    $update_task_comm_like = query_update($conn,
                                "UPDATE tasks_comments SET tasks_comments.task_comm_num = tasks_comments.task_comm_num + 1
                                WHERE tasks_comments.task_comm_id = $task_comm_id",
                                array());

    $record_in_like_tracking = query_insert(
                                $conn,
                                "INSERT INTO task_comm_user_tracking (task_comm_id, task_comm_user_id, task_comm_user_status) VALUES($task_comm_id, $task_comm_user_id, '1')",
                                array());

    $like_num = query($conn,
                        "SELECT task_comm_num FROM tasks_comments WHERE task_comm_id = $task_comm_id",
                        array())[0]['task_comm_num'];


    if( $update_task_comm_like ) {
        echo $like_num;
        exit;
    } else {
        return false;
        exit;
    }
}



/*
|------------------------------------------------------------------------------------------------
| 5. UPDATE TASK COMM UNLIKE
|------------------------------------------------------------------------------------------------
*/
if( isset($_POST['taskCommUnlikeId']) ) {
    $task_comm_id = htmlspecialchars($_POST['taskCommUnlikeId']);
    $task_comm_user_id = $id;

    $update_task_comm_like = query_update($conn,
        "UPDATE tasks_comments SET tasks_comments.task_comm_num = tasks_comments.task_comm_num - 1
                                WHERE tasks_comments.task_comm_id = $task_comm_id",
        array());

    $record_in_like_tracking = query(
        $conn,
        "DELETE FROM task_comm_user_tracking WHERE task_comm_id = $task_comm_id AND task_comm_user_id = $task_comm_user_id",
        array());

    $like_num = query($conn,
                    "SELECT task_comm_num FROM tasks_comments WHERE task_comm_id = $task_comm_id",
                    array())[0]['task_comm_num'];


    if( $update_task_comm_like ) {
        echo $like_num;
        exit;
    } else {
        echo false;
        exit;
    }
}



/*
|------------------------------------------------------------------------------------------------
| 5. DELETE TASK COMMENT
|------------------------------------------------------------------------------------------------
*/
if( isset($_POST['taskCommDeleteId']) ) {
    $task_comm_id = htmlspecialchars($_POST['taskCommDeleteId']);
    $task_comm_user_id = $id;

    $delete_task_comm_like = query($conn,
                                "DELETE FROM tasks_comments
                                WHERE task_comm_id = $task_comm_id AND task_comm_user_id = $task_comm_user_id",
                                array());

    if( $delete_task_comm_like ) {
        $delete_from_like_tracker = query(
                                        $conn,
                                        "DELETE FROM task_comm_user_tracking WHERE task_comm_id = $task_comm_id",
                                        array());
    }


    if( $delete_from_like_tracker ) {
        echo 'ok';
        exit;
    } else {
        echo error;
        exit;
    }
}












// query the tasks
$tasks = query($conn,
                "SELECT tasks.*,
                tasks_assigned.as_user_id, tasks_assigned.as_user_fullname,
                tasks_attachments.a_image, tasks_attachments.a_description,
                GROUP_CONCAT( DISTINCT tasks_assigned.as_user_id) AS as_user_id,
                GROUP_CONCAT( DISTINCT tasks_assigned.as_user_fullname) AS as_user_fullname,
                GROUP_CONCAT( DISTINCT tasks_attachments.a_image) AS a_image,
                GROUP_CONCAT( DISTINCT tasks_attachments.a_description) AS a_description
                FROM tasks
                INNER JOIN tasks_assigned ON tasks_assigned.task_id = tasks.id
                INNER JOIN tasks_attachments ON tasks_attachments.task_id = tasks.id
                GROUP BY tasks.id",
                array());


$my_task_id = [];
foreach( $tasks as $task ) {
    $my_task_id[] = $task['id'];
}

$count = count($my_task_id);
$task_comms = [];
for($i = 0; $i < $count; $i++){
    $my_task = $my_task_id[$i];


    $task_comms[$my_task] = query($conn,
                        "SELECT tasks_comments.*,
                        users.avatar,
                        users.fullname,
                        users.id AS user_id,
                        GROUP_CONCAT( DISTINCT tasks_comm_attachments.task_comm_image) AS task_comm_image,
                        GROUP_CONCAT( DISTINCT tasks_comm_attachments.task_comm_desc) AS task_comm_desc
                        FROM tasks_comments
                        LEFT JOIN tasks_comm_attachments ON tasks_comm_attachments.task_comm_id = tasks_comments.task_comm_id
                        LEFT JOIN tasks ON tasks.id = tasks_comments.task_id
                        LEFT JOIN users ON  users.id = tasks.user_id
                        WHERE tasks_comments.task_id = :task_id
                        GROUP  BY tasks_comments.task_comm_id
                        ORDER BY tasks_comments.task_comm_id DESC",
                        array('task_id' => $my_task));
}

view('tasks/index', compact('tasks', 'task_comms', 'conn', 'id') );