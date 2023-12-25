<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $problem = $_POST["problem"];

  // Validate the form data (you may add additional validation if needed)

  // Connect to the database
  $servername = "your_servername";
  $username = "your_username";
  $password = "your_password";
  $dbname = "psychological_support";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL statement to insert the data into the table
  $sql = "INSERT INTO support_requests (name, email, phone, problem) VALUES ('$name', '$email', '$phone', '$problem')";

  if ($conn->query($sql) === TRUE) {
    // Display a success message
    echo "Thank you for reaching out. We will get back to you soon.";
  } else {
    // Display an error message if the insertion fails
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>