<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "restaurant_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the required POST data is set
if (
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["contact"]) &&
    isset($_POST["order_items"]) &&
    isset($_POST["total"]) &&
    isset($_POST["quantity"]) &&
    isset($_POST["order_number"])
) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $order_items = $_POST["order_items"];
    $total = $_POST["total"];   
    $quantity = $_POST["quantity"];
    $order_number = $_POST["order_number"];

    $sql = "INSERT INTO orders (name, email, contact, order_items, total, quantity, order_number)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdis", $name, $email, $contact, $order_items, $total, $quantity, $order_number);

    if ($stmt->execute()) {
        echo "Order saved successfully! Order No: $order_number";
    } else {
        echo "Error saving order: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Missing required data.";
}

$conn->close();
?>
