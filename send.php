<?php
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$comment = filter_var(trim($_POST['com']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root','test');
$mysql->query("INSERT INTO `userspost` (`name`, `email`, `comment`) VALUES('$name', '$email', '$comment')")





?>