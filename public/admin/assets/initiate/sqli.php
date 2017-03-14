<?php

function query($sql){

	global $mysqli;

	$result = mysqli_query($mysqli,$sql) or die();

	return $result;
}

function get_num_rows($sql){

	$num = mysqli_num_rows($sql);

	return $num;
}

