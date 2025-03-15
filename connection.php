<?php
	if(!is_file('database/wicys_dummy_data.sqlite3')){
		file_put_contents('database/wicys_dummy_data.sqlite3', null);
	}
	$conn = new PDO('sqlite:database/wicys_dummy_data.sqlite3');
	// if(!is_file('database/walletSolution.sqlite3')){
	// 	file_put_contents('database/walletSolution.sqlite3', null);
	// }
	// $conn = new PDO('sqlite:database/walletSolution.sqlite3');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $query1 = "CREATE TABLE IF NOT EXISTS member(mem_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, firstname TEXT, lastname TEXT, publickey TEXT)";
	$query = "CREATE TABLE IF NOT EXISTS memberV0(mem_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, firstname TEXT, lastname TEXT)";
	// $conn->exec($query1);
	$conn->exec($query);
?>