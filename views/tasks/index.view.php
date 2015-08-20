					<div class="col-sm-12" id="header_bottom">
						
						<h1><a href="#"><i class="fa fa-tasks"></i> Tasks </a></h1>
					
					</div>				
				</div>
			</div>

			<!-- css for choosen -->
			<link rel="stylesheet" href="../css/chosen.min.css">
			
			<!-- CONTAINER -->
			<div class="container-fluid container" >

				<div class="row">

					<div class="col-md-2">

						<div class="side-panel">

							<ul>
								<li class="side-menu selected">
									<a>Inbox</a>
									<span class="pull-right badge badge-side">2</span>
								</li>
								<li class="side-menu">
									<a>My tasks</a>
									<span class="pull-right badge badge-side ng-binding">1</span>
								</li>
								<li class="side-menu">
									<a>Delegated</a>
									<span class="pull-right badge badge-side">1</span>
								</li>
								<li class="side-menu">
									<a>Archived</a>
								</li>
							</ul>

							<button type="button" id="create-new-task" class="btn btn-xxs btn-primary btn-block">New task</button>

						</div> <!-- end side panel -->

					</div> <!-- end col2 -->
					
					
					<!-- start  right_form  -->
					<div class="col-md-10" id="right_form">
							
						<div class="panel-stream">

							<div class="tasks-wrapper">
								
								<div class="row">

									<div class="col-sm-12">

										<div class="filter-btn-area">
											<span> </span>
											<span class="btn-group pull-right">
												<a class="btn btn-xs btn-white">No grouping</a>
												<a class="btn btn-xs btn-white">Due date</a>
												<a class="btn btn-xs btn-white">Space</a>
												<a class="btn btn-xs btn-white">State</a>
												<a class="btn btn-xs btn-white">Priority</a>
											</span>
										</div> <!-- end filter btn area  -->

									</div> <!-- end col12 -->

								</div> <!-- end row -->

								

								<!-- NEW TASKS -->
								<div class="row">

								 	<div class="col-sm-12">

										<div class="new-tasks-wrapper">	
											
											<div class="form-horizontal">
												
												<div class="row">

													<div class="form-group">
														<label class="col-md-2 control-label">
															<strong>Title</strong>
														</label>

														<div class="col-md-6">
															
															<div class="control-input">
																<input id="task-title" class="form-control input-md" type="text" placeholder="">
																<p id="task-title-status"></p>
															</div>

															<span class="inline-error"></span>
														</div>
													</div> <!-- end form group title -->

												</div> <!-- end row -->
												
												<div class="row">

													<div class="form-group">
														<label class="col-md-2 control-label">
															<strong>Description</strong>
														</label>

														<div class="col-md-6">
															
															<div class="control-input">
																<textarea id="task-description" class="form-control input-md" type="text"> </textarea>
															</div>

															<span class="inline-error"></span>
														</div>
													</div> <!-- end form group description -->

												</div> <!-- end row -->
												
												<div class="row">

													<div class="form-group">

														<label class="col-md-2 control-label">
															<strong>Assigned to</strong>
														</label>

														<div class="col-md-6 new-task-assign">
															<select data-placeholder="Search users..." id="autoship_option" class="chosen-select" multiple style="width: 282px; display: inline-block; height: 60px;" tabindex="4">
																<option value=""></option>
															</select>
														</div>

													</div> <!-- end from froup assaign to -->

												</div> <!-- end row -->

												<div class="row">

													<div class="form-group">

														<label class="col-md-2 control-label">
															<strong>Due date</strong>
														</label>

														<div class="col-md-3">
															
															<input id="task-due-date" class="form-control no-radius" type="text" name="date" data-container="body" autoclose="true">
															<div id="datepicker"></div>
														</div>

													</div> <!-- end form group due date -->

												</div> <!-- end row -->

												<div class="row">

													<div class="form-group">
														<label class="col-md-2 control-label">
															<strong>Priority</strong>
														</label>
														<div class="col-md-8">
															<div class="btn-group btn-priority">
																<button type="button" value="low" class="btn btn-xxs btn-white"> Low</button>
																<button type="button" value="normal" id="task-priority" class="btn btn-xxs btn-white btn-selected"> Normal</button>
																<button type="button" value="high" class="btn btn-xxs btn-white"> High</button>
																<button type="button" value="critical" class="btn btn-xxs btn-white"> Critical</button>
															</div>
														</div>
													</div> <!-- end form froup priority -->

												</div> <!-- end row -->

												<div class="row">

													<div class="form-group">
														<label class="col-md-2 control-label">
															<strong>State</strong>
														</label>

														<div class="col-md-8">
															<div class="btn-group btn-state">
																<button type="button" value="started" id="task-state" class="btn btn-xxs btn-white btn-selected"><i class="fa fa-stop"></i>Not started</button>
																<button type="button" value="progress" class="btn btn-xxs btn-white"><i class="fa ng-scope fa-play"></i>In progress</button>
																<button type="button" value="suspended" class="btn btn-xxs btn-white"><i class="fa ng-scope fa-pause"></i>Suspended</button>
																<button type="button" value="completed" class="btn btn-xxs btn-white"><i class="fa ng-scope fa-check"></i>Completed</button>
																<button type="button" value="canceled" class="btn btn-xxs btn-white"><i class="fa ng-scope fa-times"></i>Canceled</button>
															</div>
															<span class="inline-error"></span>
														</div>
													</div> <!-- end form froup state -->

												</div> <!-- end row -->

												<div class="row">

													<div class="form-group">
														<label class="col-md-2 control-label">
															<strong> </strong>
														</label> <!-- end col2 -->

														<div class="col-md-6">

															<form id="form-attach-file" action="" method="post" enctype="multipart/form-data">
																<div class="task-file-area">
																	<input type="file" name="file" id="task-upload-file" class="task-upload-file" multiple="" accept="*">
																	<button type="button" id="task-open-upload" class="btn btn-sm btn-white">
																		<i class="fa fa-paperclip"></i>
																		Attach files
																	</button>
																</div>
															</form> <!-- end attach form -->

														</div> <!-- end col 6 -->

													</div> <!-- end form group attach file -->

												</div> <!-- end row -->

												<div class="row">
												
													<div class="form-group">
														<label class="col-md-2 control-label">
															<strong> </strong>
														</label>
														<div class="col-md-8">
															<button type="button" id="submit-task" class="btn btn-info btn-sm" onclick="submitTask()">Ok</button>
															<button type="button" id="cancel-create-new-task" class="btn btn-white btn-sm">Cancel</button>
														</div>
													</div> <!-- end form group submit -->

												</div> <!-- end row -->
												
											</div> <!-- end form horizontal -->

										</div> <!-- end new tasks wrapper -->


										<!-- TASK PANEL GROUPS -->
										<div class="row">

											<div class="col-sm-12">
												<div class="task-panel-container">
													<div class="task-panel-mytask">
														<?php if( $tasks != '' ) : ?>
														<?php foreach($tasks as $task) : ?>
														<div class="task-panel">

															<div class="task-heading">

																<a class="task-item">
																	<span class="icon"><i class="fa state-0 fa-fw"></i></span>
																	<span class="icon priority-1"><i class="fa fa-star fa-fw"></i></span>
																	<span style="text-decoration: <?php echo ($task['state'] === 'completed' || $task['state'] === 'canceled') ? 'line-through' : 'none';?>;">
																		<span class="title title<?php ternary($task['id']); ?>"><?php ternary($task['title']); ?></span>
																	</span>
																	<span class="assign"><?php echo "@"; ternary($task['group_id']); ?></span><!-- group -->
																	<span class="assign"><?php ternary($task['user_full_name']); ?></span> <!-- user from -->
																	<span class="assign"><?php echo isset($task['as_user_fullname']) ? '<i class="fa fa-long-arrow-right"></i>' : '' ;?> <?php ternary( multiPrint($task['as_user_fullname'], ',') ); ?></span> <!-- user to -->
																	<span class="pull-right duedate"><?php echo fullDate($task['due_date'], $task['due_time']); ?></span>
																</a>

															</div> <!-- end task heading -->

															<div class="task-body">

																<div class="form-horizontal" style="padding: 5px">

																	<div class="row">
																		<div class="form-group display-block">
																			<label class="col-sm-2 control-label">
																				<strong>Title</strong>
																			</label>
																			<div class="col-sm-10  pull-left">
																				<label class="col-sm-12">
																					<a id="<?php ternary($task['id']); ?>" class="a-title-d float-left display-field"><?php ternary($task['title']); ?></a>
																					<span class="a-title-e input-group edit-field " >
																						<input class="a-title-v form-control input-md" type="text" value="<?php ternary($task['title']); ?>">
																						<button class="a-title-o btn btn-default btn-inline" type="button"><i class="fa fa-check"></i></button>
																						<button class="a-title-c btn btn-default btn-inline" type="button"><i class="fa fa-times"></i></button>
																					</span>
																				</label>
																				<p class="a-title-s" style="color: red; display: none;"></p>
																			</div>

																		</div> <!-- end title -->


																	</div> <!-- end row -->

																	<div class="row">
																		<div class="form-group display-block">
																			<label class="col-sm-2 control-label">
																				<strong>Description</strong>
																			</label>
																			<div class="col-sm-10">
																				<label class="col-sm-10">
																					<a id="<?php ternary($task['id']); ?>" class="a-description-d float-left display-field"><?php ternary($task['description']); ?></a>
																					<span class="a-description-e input-group edit-field " >
																						<input class="a-description-v form-control input-md" type="text" value="<?php ternary($task['description']); ?>">
																						<button class="a-description-o btn btn-default btn-inline" type="button"><i class="fa fa-check"></i></button>
																						<button class="a-description-c btn btn-default btn-inline" type="button"><i class="fa fa-times"></i></button>
																					</span>
																				</label>
																			</div>
																		</div> <!-- end description -->
																	</div> <!-- end row -->


																	<div class="row">
																		<div class="form-group display-block">
																			<label class="col-sm-2 control-label">
																				<strong>Assigned to</strong>
																			</label>
																			<div class="col-sm-10>
																				<label class="col-sm-10 control-label>
																					<a id="<?php ternary($task['id']); ?>" class="a-assigned-d float-left display-field"><?php echo multiPrint($task['as_user_fullname'], ',');?></a>
																					<span id="e-assigned-<?php ternary($task['id']); ?>" class="a-assigned-e input-group edit-field " >
																						<select data-placeholder="Search users..." id="autoship_option" class="chosen-select" multiple style="width: 282px; display: inline-block; height: 60px;" tabindex="4" onclick="updateAssignedOptions();">

																							<option value=""></option>
																							<?php if( isset($task['as_user_id']) ) : ?>
																								<?php $task_as_user_ids = explode(',', $task['as_user_id']); $count = count($task_as_user_ids); print_r($task_as_user_ids);?>
																								<?php $task_as_users_fullname = explode(',', $task['as_user_fullname']); ?>
																								<?php $preselected = ''; ?>

																								<?php for( $i = 0; $i < $count; $i++ ) : ?>
																									<option selected value="<?php echo $task_as_user_ids[$i]; ?>" title="|<?php echo $task_as_user_ids[$i]; ?>,"><?php echo $task_as_users_fullname[$i]; ?></option>
																									<?php $preselected .= '<li class="search-choice"><span>' . $task_as_users_fullname[$i] . '</span><span class="display-none">|' . $task_as_user_ids[$i] . ',</span><a class="search-choice-close"></a></li>'; ?>

																									<?php// $preselected .= '<option selected value="'. $task_as_user_ids[$i] .'" title="|'. $task_as_user_ids[$i] .',">' . $task_as_users_fullname[$i] . '</option>'; ?>
																								<?php endfor; ?>
																								<?php $preselected; ?>

																							<?php endif; ?>

																						</select>
																						<button class="a-assigned-o btn btn-default btn-inline" type="button" onclick="eUpdateAssigned('<?php ternary($task['id']); ?>')"><i class="fa fa-check"></i></button>
																						<button class="a-assigned-c btn btn-default btn-inline" type="button"><i class="fa fa-times"></i></button>
																					</span>
																				</label>
																			</div>
																		</div> <!-- end assign to -->
																	</div> <!-- end row -->

																	<div id="pre-selected">
																		<?php echo $preselected; ?>
																	</div>


																	<div class="row">
																		<div class="form-group display-block">
																			<label class="col-sm-2 control-label">
																				<strong>Due date</strong>
																			</label>
																			<div class="col-sm-10 ng-scope">
																				<label class="col-sm-10 control-label">
																					<a id="<?php ternary($task['id']); ?>" class="a-due-date-d float-left display-field"><?php ternary($task['due_date']); ?></a>
																					<span class="a-due-date-e input-group edit-field " >
																						<input class="a-due-date-v <?php ternary($task['id']); ?> form-control no-radius" type="text" name="date" data-container="body" autoclose="true" value="">
																						<button class="a-due-date-o btn btn-default btn-inline" type="button" onclick="updateDueDate('<?php ternary($task["id"]); ?>')"><i class="fa fa-check"></i></button>
																						<button class="a-due-date-c btn btn-default btn-inline" type="button"><i class="fa fa-times"></i></button>
																						<div class="e-datepicker"></div>
																					</span>
																				</label>
																			</div>
																		</div> <!-- end due date -->
																	</div> <!-- end row -->

																	<div class="row">
																		<div class="form-group display-block">
																			<label class="col-sm-2 control-label">
																				<strong>Priority</strong>
																			</label>
																			<div class="col-sm-10 ng-scope">
																				<label class="col-sm-10 control-label">
																					<a id="<?php ternary($task['id']); ?>" class="a-priority-d float-left display-field"><?php ternary($task['priority']); ?></a>
																					<sapn class="a-priority-e btn-group btn-priority edit-field">
																						<button type="button" value="low" class="btn btn-xxs btn-white <?php echo ( $task['priority'] === 'low' ) ? 'btn-selected' : ''; ?>"> Low</button>
																						<button type="button" value="normal" id="task-priority" class="btn btn-xxs btn-white <?php echo ($task['priority'] === 'normal' ) ? 'btn-selected' : ''; ?>"> Normal</button>
																						<button type="button" value="high" class="btn btn-xxs btn-white <?php echo ( $task['priority'] === 'high' ) ? 'btn-selected' : ''; ?>"> High</button>
																						<button type="button" value="critical" class="btn btn-xxs btn-white <?php echo ( $task['priority'] === 'critical' ) ? 'btn-selected' : ''; ?>"> Critical</button>
																					</sapn>
																				</label>
																			</div>
																		</div> <!-- end prority -->
																	</div> <!-- end row -->

																	<div class="row">
																		<div class="form-group display-block">
																			<label class="col-sm-2 control-label">
																				<strong>State</strong>
																			</label>
																			<div class="col-sm-10">
																				<label class="col-sm-10 control-label">
																					<a id="<?php ternary($task['id']); ?>" class="a-state-d float-left display-field"><?php ternary($task['state']); ?></a>
																					<sapn class="a-state-e btn-group btn-state edit-field">
																						<button type="button" value="started" class="btn btn-xxs btn-white <?php echo( $task['state'] === 'started') ? 'btn-selected' : '' ?>"><i class="fa fa-stop"></i>Not started</button>
																						<button type="button" value="progress" class="btn btn-xxs btn-white <?php echo( $task['state'] === 'progress') ? 'btn-selected' : '' ?>"><i class="fa ng-scope fa-play"></i>In progress</button>
																						<button type="button" value="suspended" class="btn btn-xxs btn-white <?php echo( $task['state'] === 'suspended') ? 'btn-selected' : '' ?>"><i class="fa ng-scope fa-pause"></i>Suspended</button>
																						<button type="button" value="completed" class="btn btn-xxs btn-white <?php echo( $task['state'] === 'completed') ? 'btn-selected' : '' ?>"><i class="fa ng-scope fa-check"></i>Completed</button>
																						<button type="button" value="canceled" class="btn btn-xxs btn-white <?php echo( $task['state'] === 'canceled') ? 'btn-selected' : '' ?>"><i class="fa ng-scope fa-times"></i>Canceled</button>
																					</sapn>
																				</label>
																			</div>
																		</div> <!-- end state -->
																	</div> <!-- end row -->

																	<div class="row">
																		<div class="form-group display-block ng-scope">
																			<label class="col-sm-2 control-label">
																				<strong> </strong>
																			</label>
																			<div class="col-sm-10 clear">
																				<?php if( isset($task['a_image']) ) : ?>
																					<?php $task_images = explode(',', $task['a_image']);?>
																					<?php foreach($task_images as $task_image ) : ?>

																						<figure class="list-img-item">
																							<img src="<?php echo $task_image; ?>" class="popup">
																							<figcaption class="list-img-title">
																								<?php if(isset($task['a_description'])) : ?>

																									<?php $task_desc = explode(',', $task['a_description']); $i = 0; ?>
																									<?php if(isset($task_desc[$i])) : ?>
																										<h5><?php  echo $task_desc[$i]; $i++ ?></h5>
																									<?php endif; ?>

																								<?php endif; ?>
																							</figcaption>
																						</figure>
																					<?php endforeach; ?>
																				<?php endif; ?>

																			</div>
																		</div> <!-- end task attachemnts -->
																	</div> <!-- end row -->

																	<div class="row">
																		<div class="display-block">
																			<div class="col-sm-8 col-sm-offset-2" style="background-color: #F7F7F7; border: 1px solid #e4e4e4;">
																				<div style="background-color: #F7F7F7;;background-color: #F7F7F7;">

																					<?php if( isset( $task_comms[$task['id']] ) ) : ?>
																					<ul class="task-comment-list" id="<?php ternary($task['id']); ?>">

																						<?php foreach( ($task_comms[$task['id']]) as $task_comm ) : ?>
																						<li id="<?php ternary( $task_comm["task_comm_id"] ); ?>" class="comment-item">
																							<img class="thumb-sm avatar pull-left" width="15" src="<?php ternary($task_comm['avatar']); ?>">
																							<span class="comment-username">
																								<a href="<?php echo url('/userprofile?id='); ternary($task_comm['user_id']); ?>"><?php ternary($task_comm['fullname']); ?></a>
																								<?php ternary($task_comm['task_comm_time']);?>
																								<span class="task-comm-btn-area" id="<?php ternary( $task_comm["task_comm_id"] ); ?>">
																									<?php if( isTaskCommliked($conn, $task_comm['task_comm_id'], $id) ) : ?>
																										<button type="button" class="btn btn-primary" onclick="updateTaskCommUnlike('<?php ternary( $task_comm["task_comm_id"] ); ?>');"><i class="fa fa-thumbs-o-up"></i> Like <?php ( $task_comm['task_comm_num'] != 0 ) ? ternary($task_comm['task_comm_num']) : ""; ?></button>
																									<?php else : ?>
																										<button type="button"  class="btn btn-white" onclick="updateTaskCommLike('<?php ternary( $task_comm["task_comm_id"] ); ?>');"><i class="fa fa-thumbs-o-up"></i> Like <?php ( $task_comm['task_comm_num'] != 0 ) ? ternary($task_comm['task_comm_num']) : ""; ?></button>
																									<?php endif; ?>
																								</span> <!-- end task comm btn area -->
																								<?php if( isOwnTaskComment($conn, $task_comm['task_comm_id'], $id) ) : ?>
																									<button type="button"  class="btn btn-white" onclick="deleteTaskComment('<?php ternary( $task_comm["task_comm_id"] ); ?>');"><i class="fa fa-trash-o"></i> Delete</button>
																								<?php endif; ?>
																							</span>
																							<p class="comment-text" style="margin-bottom:0px"><?php ternary($task_comm['task_comm']); ?></p>
																							<span class="list-comment-attachment">

																								<?php if( isset($task_comm['task_comm_image']) ) : ?>
																									<?php $task_comm_images = explode(',', $task_comm['task_comm_image']);?>
																								<?php foreach($task_comm_images as $task_comm_image ) : ?>

																								<figure class="list-img-item">
																									<img src="<?php echo $task_comm_image; ?>" class="popup">
																									<figcaption class="list-img-title">
																										<?php if(isset($task_comm['task_comm_desc'])) : ?>

																											<?php $task_comm_desc = explode(',', $task_comm['task_comm_desc']); $i = 0; ?>
																											<?php if(isset($task_comm_desc[$i])) : ?>
																											<h5><?php  echo $task_comm_desc[$i]; $i++ ?></h5>
																											<?php endif; ?>

																										<?php endif; ?>
																									</figcaption>
																								</figure>
																								<?php endforeach; ?>
																								<?php endif; ?>
																							</span>
																							<div class="row clear" style="margin-top: 10px;margin-left: 30px;"></div>
																						</li>
																						<?php endforeach; ?>

																					</ul><!-- end task comment list -->
																					<?php endif; ?>


																					<hr>

																					<div class="col-sm-11 comment-editor" style="margin-left: 4%">
																						<textarea id="comm-text-<?php ternary($task['id']); ?>" class="form-control comment-textarea" placeholder="Write a comment..." rows="2" style="border: 1px solid rgb(221, 221, 221); overflow: hidden; word-wrap: break-word; resize: horizontal; height: 39px;"> </textarea>
																						<p id="<?php ternary($task['id']); ?>" class="dedicated-comment-id"></p>

																						<div class="comment-attachment-area" style="margin-bottom:2px; margin-top:10px">

																							<div id="form-attach-comment-file-<?php ternary($task['id']); ?>" class="form-attach-comment-file"">

																								<form id="task-comment-file-area-<?php ternary($task['id']); ?>">
																									<input type="file" name="commentFile" id="task-comment-upload-file-<?php ternary($task['id']); ?>" class="task-comment-upload-file" multiple="" accept="*">
																									<button type="button" id="task-comment-open-upload-<?php ternary($task['id']); ?>" class="open-upload btn btn-sm btn-white">
																										<i class="fa fa-paperclip"></i>
																										Attach files
																									</button>
																									<button type="button" id="task-comment-post-<?php ternary($task['id']); ?>" class="btn btn-primary btn-sm pull-right" onclick="submitTaskComment('<?php ternary($task["id"]); ?>');">Post</button>
																								</form>

																								<div class="task-comment-attachments-area-<?php ternary($task['id']); ?>">

																								</div> <!-- end task comment attachments -->

																							</div> <!-- end attach form -->

																						</div>

																					</div>

																				</div>

																			</div>
																		</div> <!-- end task comments -->
																	</div> <!-- end row -->

																	<div class="row">
																		<div class="form-group btn-comm-action">
																			<label class="col-sm-2 control-label">
																				<strong> </strong>
																			</label>
																			<div class="col-sm-10">
																				<a class="btn btn-xs btn-white" bs-popover="" title="Are you sure you want to archive this task?">Archive task</a>
																				<a class="btn btn-xs btn-white" bs-popover="" title="Are you sure you want to delete this task?">Delete task</a>
																			</div>
																		</div>
																	</div> <!-- end row -->

																</div> <!-- end form -->

															</div> <!-- end body panel -->

														</div> <!-- end tasks panel -->
														<?php endforeach; ?>
														<?php endif; ?>
													</div> <!-- end task panel my tsk -->
												</div> <!-- emd tasl panel container -->

											</div> <!-- end col 12 -->

										</div><!-- end row -->












									</div> <!-- end col12 -->

								</div> <!-- end row -->

							</div> <!-- end tasks wrapper -->
							

						</div> <!-- end panel strem -->				
					
					</div><!-- end col9 --> <!-- end right form -->

				</div><!-- end my profile row-->
			
			</div><!-- end my profile area -->

<!-- main js -->
<script src="../js/main.js"></script>

<!-- ajax js -->
<script src="../js/ajax.js"></script>

<!-- choosen jquery -->
<script src="../js/chosen.jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:5},
		'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		'.chosen-select-width'     : {width:"95%"}
	}
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	}

	$('div.chosen-drop').css('display', 'none');

	$('.new-task-assign').find('.chosen-choices .search-field input.default').one('click', function() {
		var searchBy = 'default';
		var searchUsers = ajaxObj("POST", "index.php");
		searchUsers.onreadystatechange = function() {
			if(ajaxReturn(searchUsers) == true) {
				{
					$('.new-task-assign').find('select.chosen-select').append( searchUsers.responseText );
					$('.new-task-assign').find('#autoship_option').val('').trigger('chosen:updated');
				}
			}
		}
		searchUsers.send("searchBy="+searchBy);
	});

	$('.new-task-assign').find('.chosen-choices .search-field input.default').on('keyup', function() {
		var searchBy = $(this).val();
		if( searchBy.length > 2 ) {

			$('.new-task-assign').find('div.chosen-drop').css('display', 'block');
		} else {
			$('.new-task-assign').find('div.chosen-drop').css('display', 'none');
		}
	});
</script>



<!-- Date picker styles -->
<link rel="stylesheet" href="../css/datepicker.css">

<!-- Date picker js -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="../js/datepicker.js"></script>

<script>
	// Date picker
	$('#task-due-date').click(function(event) {
		$('#datepicker').slideDown();
	});

	$('#datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        startDate: 'today',
	});

	$("#datepicker").on("changeDate", function(event) {
	    $("#task-due-date").val(
	        $("#datepicker").datepicker('getFormattedDate')
	    );
	    $('#datepicker').fadeOut();
	});

	$(document).mouseup(function (e)
	{
		var container = $("#datepicker");

		if (!container.is(e.target) // if the target of the click isn't the container...
			&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			container.hide();
		}
	});



	// Attach file
	$('#task-open-upload').click(function(){ 
		$('#task-upload-file').trigger('click'); 
	});

	// Tasks Priority
	$('.btn-priority button').click( function () {
		$this = $(this);
		$this.siblings('button').attr('id', '');
		$this.attr('id', 'task-priority');
		$this.siblings('button').removeClass('btn-selected');
		$this.addClass('btn-selected');
	});

	// Tasks State
	$('.btn-state button').click( function () {
		$this = $(this);
		$this.siblings('button').attr('id', '');
		$this.attr('id', 'task-state');
		$this.siblings('button').removeClass('btn-selected');
		$this.addClass('btn-selected');
	});

	// Attach file
	$('#task-upload-file').on('change', function() {
		// get micro time
		var uploadTime = microtime();

		// Add new form with file name and desc field
		var fileName = _('task-upload-file').value;
		$newForm = '<div class="add-new-form" id="'+uploadTime+'"><span id="upload-status"><img src="../images/file.gif" alt=""></span><p id="attach-file-name">' + fileName + '</p><button type="button" class="remove-new-form btn">Remove</button><p><input id="attach-file-description" class="form-control no-radius" type="text" placeholder="File Description"></p></div>';
		$('.task-file-area').append($newForm);

		// add remove button to new form
		$('.remove-new-form').click(function() {
			$(this).parents('.add-new-form').remove();
		});

		// Send an ajax request to upload the file.
		var fd = new FormData(document.getElementById('form-attach-file'));
		$.ajax({
			url: "index.php", 		  // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: fd, 				  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				if ( data == 'type_error' ) {
					notification('Only .jpg, .jpeg, .png file allowed!');
				} else if( data == 'size_error' ) {
					notification('Maximum file size is 300kb!');
				} else if ( data == 'file_error' ) {
					notification('Some error has been occured!');
				} else if(data == 'file_exist'){
					notification('File already exists!');
				} else {
					//notification('Photo has been updated successfully!');
					$('#'+uploadTime).append('<p id="attach-file-url">'+data+'</p>');
					$('#'+uploadTime).find('#upload-status').find('img').attr('src', '../images/ok.png');
				};
			}
		});
	});



	// Submit tasks
	function submitTask() {

		var count = $('.add-new-form').length;

		var attachFilesDesc = '';
		var i = 0;
		while ( i < count ) {
			var aFileName = $('.task-file-area').find('.add-new-form').eq(i).find('#attach-file-url').text();
			var aFileDescription = $('.task-file-area').find('.add-new-form').eq(i).find('#attach-file-description').val();

			var aFileNameAndDescription = aFileName+'|'+aFileDescription+',';

			var attachFilesDesc = attachFilesDesc + aFileNameAndDescription;
			i++
		}
		var attachFilesDesc;

		var title = _('task-title').value;
		var desc = _('task-description').value;
		var assigned = $('ul.chosen-choices li.search-choice').text();
		var dueDate = _('task-due-date').value;
		var priority = _('task-priority').value;
		var state = _('task-state').value;
		var attachments = attachFilesDesc;

		if( title === "" ){
			_('task-title-status').innerHTML = 'Title field is required!';
		} else if( title.length < 3 ) {
			_('task-title-status').innerHTML = 'Title field must be at lest 3 characters!';
		} else {
			_('submit-task').disabled = true;
			_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

			var submitNewTask = ajaxObj("POST", "index.php");
			submitNewTask.onreadystatechange = function() {
				if(ajaxReturn(submitNewTask) == true) {
					if(submitNewTask.responseText != 'ok'){
						_('processing').innerHTML = "";
						notification(submitNewTask.responseText);
						_("submit-task").disabled = false;
					} else {
						_('processing').innerHTML = "";
						notification('Tasks has been created successfully!')
						_("submit-task").disabled = false;
					}
				}
			}
			submitNewTask.send("title="+title+"&desc="+desc+"&assigned="+assigned+"&dueDate="+dueDate+"&priority="+priority+"&state="+state+"&attachments="+attachments);
		}
	}

</script>

<script>
/*
|------------------------------------------------------------------------------------------------
| 01. view tasks
|------------------------------------------------------------------------------------------------
*/
	// show and hide task's body
	$('.task-panel').find('.task-heading').click(function() {
		$(this).parent('.task-panel').siblings('.task-panel').find('.task-body').slideUp();
		$(this).parent('.task-panel').find('.task-body').slideToggle();
	});

	// EDIT SECTION.//
	//-------------//

	/*
	*  Hide display field.
	*  Show editor field
	*/


	/*
	* Hide editor field
	* Show display field
	*/


	/*
	* Edit title
	*/
	$('.a-title-d').click(function() {
		var $this = $(this);
		window.eId = $this.attr('id');
		$this.hide();
		$this.next('.a-title-e').show();
	});

	$('.a-title-c').click(function() {
		$('.a-title-e').hide();
		$('.a-title-d').show();
	});

	// hide error message on focus in title edit field
	$('.a-title-v').focus(function() {
		$('.a-title-s').text('');
	});

	// Update title field
	$('.a-title-o').click(function() {
		var etitle = $('#'+eId).next('.a-title-e').find('.a-title-v').val();
		console.log(etitle);

		if( etitle.length < 3 ) {
			$('.a-title-s').show();
			$('.a-title-s').text('Title must be at lest 3 characters long!');
		} else {
			$('.a-title-o').prop("disabled", true);
			_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

			var sendETitle = ajaxObj("POST", "index.php");
			sendETitle.onreadystatechange = function() {
				if(ajaxReturn(sendETitle) == true) {
					if(sendETitle.responseText == 'updated'){
						_('processing').innerHTML = "";
						notification('Already updated!');
						$(".a-title-o").prop("disabled", false);
					} else {
						_('processing').innerHTML = "";
						$("#"+eId).text(etitle);
						$("#"+eId).next('.a-title-e').find('.a-title-v').val(etitle);
						$("#"+eId).next('.a-title-e').hide();
						$("#"+eId).show();
						$(".a-title-o").prop("disabled", false);
					}
				}
			}
			sendETitle.send("etitle="+etitle+"&eId="+eId);
		}
	});


	/*
	* Edit Description
	*******************************************/
	$('.a-description-d').click(function() {
		var $this = $(this);
		window.eId = $this.attr('id');
		$this.hide();
		$this.next('.a-description-e').show();
	});

	$('.a-description-c').click(function() {
		$('.a-description-e').hide();
		$('.a-description-d').show();
	});

	// Update description field
	$('.a-description-o').click(function() {
		console.log(eId);
		var edescription = $('#'+eId+'.a-description-d').next('.a-description-e').find('.a-description-v').val();
		console.log(edescription);

		// send ajax request
		$('.a-description-o').prop("disabled", true);
		_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

		var sendETitle = ajaxObj("POST", "index.php");
		sendETitle.onreadystatechange = function() {
			if(ajaxReturn(sendETitle) == true) {
				if(sendETitle.responseText == 'updated'){
					_('processing').innerHTML = "";
					notification('Already updated!');
					$(".a-description-o").prop("disabled", false);
				} else {
					_('processing').innerHTML = "";
					$('#'+eId+'.a-description-d').text(edescription);
					$('#'+eId+'.a-description-d').next('.a-description-e').find('.a-description-v').val(edescription);
					$('#'+eId+'.a-description-d').next('.a-description-e').hide();
					$('#'+eId+'.a-description-d').show();
					$(".a-description-o").prop("disabled", false);
				}
			}
		}
		sendETitle.send("edescription="+edescription+"&eId="+eId);
	});


	/*
	* Update task due date
	* ***************************************/
	$('.e-datepicker').datepicker({
		autoclose: true,
		todayHighlight: true,
		startDate: 'today',
	});

	$('.a-due-date-v').click(function(event) {
		$('.e-datepicker').slideDown();
	});

	$(document).mouseup(function (e)
	{
		var container = $(".e-datepicker");

		if (!container.is(e.target) // if the target of the click isn't the container...
			&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			container.hide();
		}
	});



	$('.a-due-date-d').click(function() {
		var $this = $(this);
		window.eId = $this.attr('id');
		$this.hide();
		$this.next('.a-due-date-e').css('display', 'block');
	});

	$('.a-due-date-c').click(function() {
		$('.a-due-date-e').hide();
		$('.a-due-date-d').show();
	})

	$(".e-datepicker").on("changeDate", function(event) {
		$this = $(this);
		$("#" + window.eId + ".a-due-date-d").next('.a-due-date-e').find(".a-due-date-v").val(
			$this.datepicker('getFormattedDate')
		);
		$this.fadeOut();
	});

	function updateDueDate(id) {
		var eId = id;
		var eDueDate = $('.a-due-date-v.'+id).val();

		if( eId != "" && eDueDate != "" ) {
			// send ajax request
			$('.a-due-date-e').prop("disabled", true);
			_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

			var sendEDueDate = ajaxObj("POST", "index.php");
			sendEDueDate.onreadystatechange = function() {
				if(ajaxReturn(sendEDueDate) == true) {
					if(sendEDueDate.responseText != 'error'){
						_('processing').innerHTML = "";
						$('#'+eId+'.a-due-date-d').text(eDueDate);
						$('#'+eId+'.a-due-date-d').next('.a-due-date-e').hide();
						$('#'+eId+'.a-due-date-d').show();
						$(".a-due-date-e").prop("disabled", false);
						notification('Due date has been updated!');
					} else {
						$(".a-due-date-e").prop("disabled", false);
						notification('Already Updated!');
					}
				}
			}
			sendEDueDate.send("eDueDate="+eDueDate+"&eId="+eId);
		}

	}


	/*
	* Update assigned
	* ****************************************/
	$('.a-assigned-d').click(function() {
		var $this = $(this);
		window.eId = $this.attr('id');
		$this.hide();
		$this.next('.a-assigned-e').show();
		$('#autoship_option_chosen').css('width', '282px');
	});

	$('.a-assigned-c').click(function() {
		$('.a-assigned-e').hide();
		$('.a-assigned-d').show();
	});

	$('.a-assigned-e').find('.chosen-choices').one('click', function() {
		var divId = $(this).closest('.a-assigned-e').attr('id');
		var eTaskId = idFromStr(divId);
		console.log(divId);
		console.log(eTaskId);

		var searchAssignBy = 'default';
		var eSearchUsers = ajaxObj("POST", "index.php");
		eSearchUsers.onreadystatechange = function() {
			if(ajaxReturn(eSearchUsers) == true) {
				{
					$('#'+divId+'.a-assigned-e').find('select.chosen-select').append( eSearchUsers.responseText );
					$('#'+divId+'.a-assigned-e').find('#autoship_option').val('').trigger('chosen:updated');
					var preselected = $('#pre-selected').html();
					$('#'+divId+'.a-assigned-e').find('ul.chosen-choices').append( preselected );
					$('#'+divId+'.a-assigned-e').find('#autoship_option').val('').trigger('chosen:updated');

				}
			}
		}
		eSearchUsers.send("searchAssignBy="+searchAssignBy+"&eTaskId="+eTaskId);
	});


	$('.a-assigned-e').find('.chosen-choices .search-field input#search-field').on('keyup', function() {
		var searchBy = $(this).val();
		if( searchBy.length > 2 ) {

			$('div.chosen-drop').css('display', 'block');
		} else {
			$('div.chosen-drop').css('display', 'none');
		}
	});

 	function eUpdateAssigned(eId) {
		var eAssigned = $('#e-assigned-'+eId).find('ul.chosen-choices li.search-choice').text();

		// send ajax request
		$('.a-assigned-e').prop("disabled", true);
		_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

		var sendEAssigned = ajaxObj("POST", "index.php");
		sendEAssigned.onreadystatechange = function() {
			if(ajaxReturn(sendEAssigned) == true) {
				if(sendEAssigned.responseText != 'error'){
					_('processing').innerHTML = "";
					var rtext = sendEAssigned.responseText;
				    var rtext = rtext.substring(0, rtext.length - 2);
					$('#'+eId+'.a-assigned-d').text(rtext);
					$('#'+eId+'.a-assigned-d').next('.a-assigned-e').hide();
					$('#'+eId+'.a-assigned-d').show();
					$(".a-assigned-e").prop("disabled", false);
					notification('Assigned users has been updated!');
				} else {
					$(".a-assigned-e").prop("disabled", false);
					notification('Already Updated!');
				}
			}
		}
		sendEAssigned.send("eAssigned="+eAssigned+"&eId="+eId);
	}



	/*
	* Update priority
	*******************************************/
	$('.a-priority-d').click(function() {
		var $this = $(this);
		window.eId = $this.attr('id');
		$this.hide();
		$this.next('.a-priority-e').css('display', 'block');
	});

	// Tasks Priority
	$(".a-priority-d").next('.a-priority-e').find('button').click( function () {
		$this = $(this);
		var ePriority = $this.val();
		$this.siblings('button').attr('id', '');
		$this.attr('id', 'task-priority');
		$this.siblings('button').removeClass('btn-selected');
		$this.addClass('btn-selected');

		// send ajax request
		$('.a-priority-e').prop("disabled", true);
		_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

		var sendEPriority = ajaxObj("POST", "index.php");
		sendEPriority.onreadystatechange = function() {
			if(ajaxReturn(sendEPriority) == true) {
				if(sendEPriority.responseText != 'error'){
					_('processing').innerHTML = "";
					$('#'+eId+'.a-priority-d').text(ePriority);
					$('#'+eId+'.a-priority-d').next('.a-priority-e').hide();
					$('#'+eId+'.a-priority-d').show();
					$(".a-priority-e").prop("disabled", false);
				} else {
					$(".a-priority-e").prop("disabled", false);
				}
			}
		}
		sendEPriority.send("ePriority="+ePriority+"&eId="+eId);

	});


	/*
	 * Update state
	 *******************************************/
	$('.a-state-d').click(function() {
		var $this = $(this);
		window.eId = $this.attr('id');
		$this.hide();
		$this.next('.a-state-e').css('display', 'block');
	});

	// Tasks Priority
	$(".a-state-d").next('.a-state-e').find('button').click( function () {
		$this = $(this);
		var eState = $this.val();
		console.log(eState);
		$this.siblings('button').attr('id', '');
		$this.attr('id', 'task-state');
		$this.siblings('button').removeClass('btn-selected');
		$this.addClass('btn-selected');

		// send ajax request
		$('.a-state-e').prop("disabled", true);
		_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

		var sendEState = ajaxObj("POST", "index.php");
		sendEState.onreadystatechange = function() {
			if(ajaxReturn(sendEState) == true) {
				if(sendEState.responseText != 'error'){
					_('processing').innerHTML = "";
					$('#'+eId+'.a-state-d').text(eState);
					$('#'+eId+'.a-state-d').next('.a-state-e').hide();
					$('#'+eId+'.a-state-d').show();
					$(".a-state-e").prop("disabled", false);
					if( eState === 'completed' || eState === 'canceled') {
						$('.title'+eId).css('text-decoration', 'line-through');
					} else if( eState === 'started' || eState === 'progress' || eState === 'suspended' ) {
						$('.title'+eId).css('text-decoration', 'none');
					}
				} else {
					$(".a-state-e").prop("disabled", false);
				}
			}
		}
		sendEState.send("eState="+eState+"&eId="+eId);

	});

	/*
	* Task comments section
	*****************************************/
	$('.comment-textarea').click(function() {
		var $this = $(this);
		window.eId = $this.next('.dedicated-comment-id').attr('id');
		$('div#form-attach-comment-file-'+window.eId+'.form-attach-comment-file').slideDown();
	});

	$('.open-upload').click(function() {
		var id = idFromStr($(this).attr('id'));
		var selectAttachment = $('#task-comment-upload-file-'+id).trigger("click");
	})


	$('.task-comment-upload-file').on('change', function() {
		// get the id
		var id = idFromStr($(this).attr('id'));
		// get microtime
		var uploadTime = microtime();

		// Add new form with file name and desc field
		var commentFileName = _('task-comment-upload-file-'+id).value;
		$commentNewForm = '<div class="add-comment-new-form" id="'+uploadTime+'"><span id="upload-comment-status"><img src="../images/file.gif" alt=""></span><p id="attach-comment-file-name">' + commentFileName + '</p><button type="button" class="remove-comment-new-form btn">Remove</button><p><input id="attach-comment-file-description" class="form-control no-radius" type="text" placeholder="File Description"></p></div>';
		$('.task-comment-attachments-area-'+id).append($commentNewForm);

		// add remove button to new form
		$('.remove-comment-new-form').click(function() {
			$(this).parents('.add-comment-new-form').remove();
		});

		// Send an ajax request to upload the file.
		fData = document.getElementById('task-comment-file-area-'+id);
		var tfd = new FormData(fData);
		$.ajax({
			url: "index.php", 		  // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: tfd, 				  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				if( data == 'size_error' ) {
					notification('Maximum file size is 5mb!');
				} else if ( data == 'file_error' ) {
					notification('Some error has been occured!');
				} else if(data == 'file_exist'){
					notification('File already exists!');
				} else {
					//notification('Photo has been updated successfully!');
					$('#'+uploadTime).append('<p id="attach-comment-file-url">'+data+'</p>');
					$('#'+uploadTime).find('#upload-comment-status').find('img').attr('src', '../images/ok.png');
				};
			}
		});
	});

	// submit task comment
	function submitTaskComment(id) {
		var count = $('.task-comment-attachments-area-'+id).find('.add-comment-new-form').length;

		var attachFilesDesc = '';
		var i = 0;
		while ( i < count ) {
			var aFileName = $('.task-comment-attachments-area-'+id).find('.add-comment-new-form').eq(i).find('#attach-comment-file-url').text();
			var aFileDescription = $('.task-comment-attachments-area-'+id).find('.add-comment-new-form').eq(i).find('#attach-comment-file-description').val();

			var aFileNameAndDescription = aFileName+'|'+aFileDescription+',';

			var attachFilesDesc = attachFilesDesc + aFileNameAndDescription;
			i++
		}
		var attachFilesDesc;

		var taskComment = _('comm-text-'+id).value;
		var attachments = attachFilesDesc;
		var taskId = id;

//		_('task-comment-post-'+id).disabled = true;
//		_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";
//
//		var submitNewTaskComm = ajaxObj("POST", "index.php");
//		submitNewTaskComm.onreadystatechange = function() {
//			if(ajaxReturn(submitNewTaskComm) == true) {
//				if(submitNewTaskComm.responseText == 'error'){
//					_('processing').innerHTML = "";
//					notification(submitNewTaskComm.responseText);
//					_('task-comment-post-'+id).disabled = false;
//				} else {
//					_('processing').innerHTML = "";
//					var return_comm = submitNewTaskComm.responseText;
//					var tar = $('.task-comment-list#'+id).prepend(return_comm);
//					notification(return_comm);
//					_('task-comment-post-'+id).disabled = false;
//				}
//			}
//		}
//		submitNewTaskComm.send("taskComment="+taskComment+"&attachments="+attachments+"&taskId="+taskId);






		var cData = "taskComment=" + encodeURIComponent(taskComment) + "&attachments=" + encodeURIComponent(attachments) + "&taskId=" + encodeURIComponent(taskId);

		$.ajax({
			url: "index.php", 		  // Url to which the request is send
			method: "POST",             // Type of request to be send, called as method
			data: cData,
			dataType: 'html',
						// Data sent to server, a set of key/value pairs (i.e. form fields and values)
			        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				//$('#'+taskId+'.task-comment-list').html(data);
				notification('Comment has been added!');
			}
		});























	}

	function updateTaskCommLike(taskCommLikeId) {
		var taskCommLikeId = taskCommLikeId;
		var eId = taskCommLikeId;

		var submitTaskLike = ajaxObj("POST", "index.php");
		submitTaskLike.onreadystatechange = function() {
			if(ajaxReturn(submitTaskLike) == true) {
				_('processing').innerHTML = "";
				var like_num = submitTaskLike.responseText;
				$('#'+eId+'.task-comm-btn-area').html('<button type="button" class="btn btn-primary" onclick="updateTaskCommUnlike(' + eId + ');"><i class="fa fa-thumbs-o-up"></i> Like '+like_num+'</button>');
			}
		}
		submitTaskLike.send("taskCommLikeId="+taskCommLikeId);
	}

	function updateTaskCommUnlike(taskCommUnlikeId) {
		var taskCommUnlikeId = taskCommUnlikeId;
		var eId = taskCommUnlikeId;

		var submitTaskUnlike = ajaxObj("POST", "index.php");
		submitTaskUnlike.onreadystatechange = function() {
			if(ajaxReturn(submitTaskUnlike) == true) {
				_('processing').innerHTML = "";
				var like_num = submitTaskUnlike.responseText;
				$('#'+eId+'.task-comm-btn-area').html('<button type="button" class="btn btn-white" onclick="updateTaskCommLike(' + eId + ');"><i class="fa fa-thumbs-o-up"></i> Like '+like_num+'</button>');
			}
		}
		submitTaskUnlike.send("taskCommUnlikeId="+taskCommUnlikeId);
	}

	function deleteTaskComment(taskCommDeleteId) {
		var taskCommDeleteId = taskCommDeleteId;
		var eId = taskCommDeleteId;
		var submitTaskDelete = ajaxObj("POST", "index.php");
		submitTaskDelete.onreadystatechange = function() {
			if(ajaxReturn(submitTaskDelete) == true) {
				_('processing').innerHTML = "";
				$('.comment-item#'+eId).remove();
				notification('Comment has been deleted successfully!')
			}
		}
		submitTaskDelete.send("taskCommDeleteId="+taskCommDeleteId);
	}




	/*
	|------------------------------------------------------------------------------------------------
	| 3. UI activities
	|------------------------------------------------------------------------------------------------
	*/
	$('#create-new-task').click(function() {
		$('.new-tasks-wrapper').slideToggle(400);
	});

	$('#cancel-create-new-task').click(function() {
		$('.new-tasks-wrapper').slideUp(400);
	});

</script>