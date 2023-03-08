<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "game_store";

    // Create Connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check Connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $db = $conn->query('SELECT * FROM games');
?>