<?php
$conn = mysqli_connect("localhost", "root", "", "projectdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $msg = mysqli_real_escape_string($conn, $_POST["msg"]);

    $sql = "INSERT INTO user (F_name, Email, Msg) VALUES ('$fname', '$email', '$msg')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
