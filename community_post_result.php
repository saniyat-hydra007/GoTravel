<?php

	$name = $_GET["name"];

	$topic = $_GET["topic"];

    $question = $_GET["question"];



	require_once('db_connect.php');

	$connect = mysqli_connect( HOST, USER, PASS, DB )

		or die("Can not connect");



	mysqli_query( $connect, "INSERT INTO post VALUES ( '$name', '$topic', '$question' )" )

		or die("Can not execute query");



	// echo "Record inserted:<br> f0 = $f0 <br> f1 = $f1";



	// echo "<p><a href=read.php>READ all records</a>";

?>