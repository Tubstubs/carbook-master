<?php

// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

// Database connection
// 3307 port on XAMP
$conn = new mysqli('localhost:3307', 'root', '', 'test');

if ($conn->connect_error){
    die("Connection failed : " .$conn->connect_error);
} else {

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, phone, email, password, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $phone, $email, $password, $gender);

    // Execute the statement
    $stmt->execute();
    $note = "Registration Successful";

    // Echoing the note within a tab
    echo '<div class="tab">
              <div class="tab-content">' . $note . '</div>
          </div>';

    $stmt->close();
    $conn->close();
    
    // Redirect to the login form after a delay
    header("Refresh: 3; url=GDRLogin.html");
}

?>