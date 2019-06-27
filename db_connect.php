<?php
function db(){
	global $link;
	$link = mysqli_connect('localhost', 'root', '', 'foodpic')or die("couldn't connect to database");
	return $link;
}
?>