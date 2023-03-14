<?php

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
	die("Unauthorized access");
}

// Get user data from form submission
$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];

// Connect to MongoDB database
$mongo = new MongoClient("mongodb://localhost:27017");
$db = $mongo->selectDB("mydb");
$collection = $db->selectCollection("users");

// Update user data in MongoDB
$criteria = array("_id" => new MongoId($user_id));
$update = array(
	'$set' => array(
		"name" => $name,
		"age" => $age,
		"dob" => $dob,
		"contact" => $contact
	)
);
$collection->update($criteria, $update);

// Return success message to frontend
echo "Profile updated successfully";

?>
