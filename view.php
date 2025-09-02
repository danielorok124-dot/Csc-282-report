<?php
$conn = new mysqli("localhost", "root", "", "school_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Delete student if requested
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM student_records WHERE id = $id");
    header("Location: view.php");
    exit();
}

// Fetch students
$result = $conn->query("SELECT * FROM student_records ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Registered Students</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #1a1a1a, #0d0d0d);
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-top: 40px;
    min-height: 100vh;
    color: #fff;
}
.container {
    background: #111;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
    width: 90%;
    max-width: 1000px;
}
h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #0af;
    text-shadow: 0 0 10px #0af;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
th, td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #333;
}
th {
    background: #0af;
    color: #111;
    border-radius: 8px;
}
tr:hover { background: #222; }

/* Buttons */
.btn {
    padding: 5px 12px;
    border-radius: 6px;
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    transition: all 0.3s;
}
.edit { background: #28a745; }
.edit:hover { background: #218838; }
.delete { background: #dc3545; }
.delete:hover { background: #c82333; }

a.back-link {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #0af;
    text-decoration: none;
    font-weight: 500;
}
a.back-link:hover { color: #08c; text-shadow: 0 0 5px #0af; }
</style>
</head>
<body>
<div class="container">
<h2>All Registered Students</h2>

<table>
<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Department</th>
    <th>Matric Number</th>
    <th>Actions</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row['id'] ."</td>";
        echo "<td>". $row['fullname'] ."</td>";
        echo "<td>". $row['email'] ."</td>";
        echo "<td>". $row['department'] ."</td>";
        echo "<td>". $row['matric'] ."</td>";
        echo "<td>
                <a class='btn edit' href='edit.php?id=". $row['id'] ."'>Edit</a>
                <a class='btn delete' href='view.php?delete=". $row['id'] ."' onclick=\"return confirm('Are you sure?')\">Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No students registered yet.</td></tr>";
}
?>

</table>
<a class="back-link" href="index.php">Back to Registration</a>
</div>
</body>
</html>
