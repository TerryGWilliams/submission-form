<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

if($_SERVER["REQUEST_METHOD"]== "POST"){

  $name = $_POST["name"];
  $email = $_POST["email"];
  $feedback = $_POST["feedback"];
  $rating = $_POST["rating"];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO feedback (name, email, feedback, rating, submission_date) 
              VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";

  $stmt = $conn->prepare($sql);

  // Bind parameters for security (prevents SQL injection)
  $stmt->bind_param("ssss", $name, $email, $feedback, $rating);

  if ($stmt->execute()) {
    $message = "Thank you for your time, We Appreciate your Feedback";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submission of Feedback</title>
  <style>
    body{
      background-color: paleturquoise;
    }
  </style>
</head>
<body>
  <h1><?php echo isset($message) ? $message : ''; ?></h1>
  </body>
</html>

