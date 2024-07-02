<?php
$dsn = "msql:host=localhost;dbname=campaign_feedback";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, feedback, rating, submission_date FROM feedback";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Feedbacks</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid maroon;
    }
    th {
      background-color: lightcoral;
    }
    body{
      background-color: paleturquoise;
    }
  </style>
</head>
<body>
  <h1>List of Feedback</h1>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Feedback</th>
        <th>Rating</th>
        <th>Submitted Work</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["feedback"] . "</td>";
          echo "<td>" . $row["rating"] . "</td>";
          echo "<td>" . $row["submission_date"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>There's no feedback found</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <?php
  $conn->close();
  ?>
</body>
</html>
