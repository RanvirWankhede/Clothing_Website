<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $color = $_POST["color"];
    $style = $_POST["style"];
    $username = "your_username"; // Get the username from session or elsewhere

    $conn = new mysqli("localhost", "your_username", "your_password", "outfit_suggestion");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userResult = $conn->query("SELECT id FROM users WHERE username='$username'");
    $userId = $userResult->fetch_assoc()["id"];

    $sql = "INSERT INTO preferences (user_id, color, style) VALUES ('$userId', '$color', '$style')";
    $conn->query($sql);

    $conn->close();
}
?>
