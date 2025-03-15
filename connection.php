<?php
	if(!is_file('database/wicys_dummy_data.sqlite3')){
		file_put_contents('database/wicys_dummy_data.sqlite3', null);
	}
	$conn = new PDO('sqlite:database/wicys_dummy_data.sqlite3');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = "CREATE TABLE IF NOT EXISTS memberV0(mem_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, firstname TEXT, lastname TEXT)";
	$conn->exec($query);
?>