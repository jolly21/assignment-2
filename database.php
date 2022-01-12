<?php
$pdo = new PDO('mysql:host=mysql;dbname=cars;charset=utf8', 'student', 'student', 
	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);