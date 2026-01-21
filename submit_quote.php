php 

<?php
// DB credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pixel_db";

// DB connections
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get & sanitize input
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']); 
$email = htmlspecialchars($_POST['email']);
$requirement = htmlspecialchars($_POST['requirement']);

// SQL insert
$stmt = $conn->prepare("INSERT INTO quotes (name, phone, email, requirement) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone, $email, $requirement);

// Execution 
if ($stmt->execute()) {
  echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
