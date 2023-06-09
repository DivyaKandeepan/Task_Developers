<?php
// Start MySQL connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Preparing statement and bind parameters
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

// Setting parameter and execute statement
$email = $_POST["email"];
$stmt->execute();

// Getting result and validate password
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($_POST["password"], $user["password"])) {
	echo json_encode($user);
} else {
	http_response_code(401);
}

// Closing statement and MySQL connection
$stmt->close();
$conn->close();
?>
