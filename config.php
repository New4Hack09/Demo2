<?php
session_start();

$db_host = 'localhost';
$db_user = 'mykhanac_Ar';
$db_pass = 'H~j@G~3[fcJ7#)XH';
$db_name = 'mykhanac_Ar';
$base_url = 'https://ar-travels.mykhana.com';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
