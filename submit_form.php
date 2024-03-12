<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $applicantName = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $parentName = $_POST['parentName'];
    $contact = $_POST['contact'];

    // Establish a connection to your MySQL database (adjust these parameters accordingly)
    $servername = "your_server_name";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the "bf" table
    $sql = "INSERT INTO bf (applicantName, age, grade, parentName, contact)
            VALUES ('$applicantName', '$age', '$grade', '$parentName', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
