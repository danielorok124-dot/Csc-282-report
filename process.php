<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "school_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$message = ""; // Message to display on the page

if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $matric = trim($_POST['matric']);

    // Validation
    if (empty($fullname) || empty($email) || empty($department) || empty($matric)) {
        $message = "<div class='error'>All fields are required!</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<div class='error'>Invalid email format!</div>";
    } else {
        // Insert into DB
        $stmt = $conn->prepare("INSERT INTO student_records (fullname, email, department, matric) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $department, $matric);

        if ($stmt->execute()) {
            $message = "<div class='success'>Student registered successfully!</div>";
        } else {
            $message = "<div class='error'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Processing Registration</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #1a1a1a, #0d0d0d);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #fff;
}
.container {
    background: #111;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
    width: 400px;
    text-align: center;
}
h2 {
    margin-bottom: 30px;
    color: #0af;
    text-shadow: 0 0 10px #0af;
}
.success {
    background: #0a0;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 0 10px #0a0;
}
.error {
    background: #a00;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 0 10px #a00;
}
a.back-link {
    display: block;
    margin-top: 20px;
    color: #0af;
    text-decoration: none;
    font-weight: 500;
}
a.back-link:hover {
    color: #08c;
    text-shadow: 0 0 5px #0af;
}
</style>
</head>
<body>
<div class="container">
    <h2>Processing Registration</h2>
    <?php if ($message != "") echo $message; ?>
    <a class="back-link" href="index.php">Back to Registration Form</a>
    <a class="back-link" href="view.php">View All Students</a>
</div>
</body>
</html>