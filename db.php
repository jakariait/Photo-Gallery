<?php
$host   = '127.0.0.1';
$user   = 'root';
$pass   = '';
$dbname = 'photo_gallery';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
