<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "restaurant_db"; // make sure this matches your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

$first_name = $data["first_name"];
$last_name = $data["last_name"];
$email = $data["email"];
$password = password_hash($data["password"], PASSWORD_DEFAULT);
$contact = $data["contact"];

$sql = "INSERT INTO users (first_name, last_name, email, password, contact_number)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $first_name, $last_name, $email, $password, $contact);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$stmt->close();
$conn->close();
?>
