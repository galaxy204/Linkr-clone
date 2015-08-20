<?php 
// echo "<pre>";
// $var = range('A', 'Z');
// print_r($var);
// echo "<br>";
// $marge = array_rand($var);
// echo "$marge";
// echo '</pre>';
// echo "<hr>";

// $main_pass = '1234';
// $md5 = md5($main_pass);
// $crypt = crypt($md5, 'tf');

// //tfZAa5rbopCtg
// $input = '1234';
// $imd5 = md5($input);
// $icrypt = crypt($imd5, 'tfdsfdsfdsfh');
// echo "<hr>";

// if ( $crypt === $icrypt ) {
// 	echo "Ok";
// 	echo "<br>";
// 	echo "$icrypt";
// }
// echo "<hr>";

// $blue = crypt('trasmuslerdorfh', '$2y$07$usesomesillystringfore$');

// echo $blue;
// echo "<br>";
// echo '$2y$07$usesomesillystringfored$';
//
//echo "<hr>";
//$md5 = md5('12345');
//$sha1 = sha1($md5);
//$encrypt = crypt($sha1, '$2y$04$uuesomesillystrongfjk$');
//echo $encrypt;
//echo "<hr>";
//echo '$eYuLyKEIn.HI66la6uOkZ24l51n8zkEi';
//$arr = ['tanvir', 'hasna', 'du', 'mine'];
//var_dump($arr);
$a = 5;
$b = 4;

function myfunc() {
    global $a, $b;
    echo $a + $b;
}

echo strtotime("8/9/2015");

myfunc();


