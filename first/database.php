<?php
$link = mysqli_connect('95.217.218.21', 'hidgi', '1234', 'database');
    if (!$link) {
          die("Connection failed: " . mysqli_connect_error());
    }
?>