<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Registration</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
/* General styles */
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
form label {
    display: block;
    text-align: left;
    margin-top: 15px;
    color: #ccc;
    font-weight: 500;
}
form input {
    width: 100%;
    padding: 10px 15px;
    margin-top: 5px;
    border: none;
    border-radius: 8px;
    outline: none;
    background: #222;
    color: #fff;
    transition: all 0.3s ease;
}
form input:focus {
    box-shadow: 0 0 10px #0af;
    background: #111;
}
button {
    margin-top: 25px;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #0af;
    color: #111;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}
button:hover {
    background: #08c;
    color: #fff;
    transform: translateY(-2px);
}
a.view-link {
    display: block;
    margin-top: 15px;
    color: #0af;
    text-decoration: none;
    font-weight: 500;
}
a.view-link:hover {
    color: #08c;
    text-shadow: 0 0 5px #0af;
}
.success {
    background: #0a0;
    padding: 10px;
    border-radius: 8px;
    margin-top: 15px;
    box-shadow: 0 0 10px #0a0;
}
.error {
    background: #a00;
    padding: 10px;
    border-radius: 8px;
    margin-top: 15px;
    box-shadow: 0 0 10px #a00;
}
</style>
</head>
<body>
<div class="container">
    <h2>Register Student</h2>
    <!-- You can dynamically show messages here -->
    <!-- <div class="success">Student registered successfully!</div> -->
    <form action="process.php" method="POST">
        <label>Full Name</label>
        <input type="text" name="fullname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Department</label>
        <input type="text" name="department" required>

        <label>Matric Number</label>
        <input type="text" name="matric" required>

        <button type="submit" name="register">Register</button>
    </form>
    <a class="view-link" href="view.php">View Students</a>
</div>
</body>
</html>