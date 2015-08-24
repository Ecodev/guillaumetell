<?php

$db = new DBMysql('localhost', 'user', 'password');
$db->connect('database_name');

return $db;
