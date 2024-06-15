<?php
// Example database functions (sample)
include_once 'db_config.php';

function registerUser($username, $password) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    return $stmt->execute();
}

function getPasswordHash($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return
