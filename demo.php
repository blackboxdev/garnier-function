<?php 

define('DB_NAME', 'garnier');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link){
	die('Could not connect:'.mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected){
	die('Can\'t use' . DB_NAME . ':' . mysql_error());
}

// echo 'Connected successfully';

$value = $_POST['email'];
$value2 = $_POST['password'];
$value3 = $_POST['email2'];

$sql = "INSERT INTO users (email, password, email2) VALUES ('$value', '$value2' , '$value3')"; 

if (!mysql_query($sql)){
	die ('Error: '.mysql_error());
	}

mysql_close();
?>