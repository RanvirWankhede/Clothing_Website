<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $top = $_POST["top"];
    $bottom = $_POST["bottom"];
    $shoes = $_POST["shoes"];
    $username = "your_username"; // Get the username from session or elsewhere

    $conn = new mysqli("localhost", "your_username", "your_password", "outfit_suggestion");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userResult = $conn->query("SELECT id FROM users WHERE username='$username'");
    $userId = $userResult->fetch_assoc()["id"];

    $sql = "INSERT INTO outfits (user_id, top, bottom, shoes) VALUES ('$userId', '$top', '$bottom', '$shoes')";
    $conn->query($sql);

    $conn->close();
}
?>
