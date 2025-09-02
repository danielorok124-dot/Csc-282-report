Student Registration Web Application

Name: Daniel Effiong Orok
Reg Number: 23/CSC/073
Course Code: CSC 282

📌 Project Overview

This is a simple PHP web application for registering students into a database. It allows students to input their details (Full Name, Email, Department, and Matric Number), stores the data in a MySQL database, and displays all registered students.

The application also has an extra feature (+5 marks): a Delete button to remove students from the records.

⚙️ Features

Student registration form with required fields.

Input validation (all fields required, email format must be valid).

Stores data in a MySQL database (student_records table).

View page to display all registered students in a clean table.

Option to delete student records.

Includes a custom stylesheet (style.css) for better design.

📂 Project Structure
student_registration/
│
├── index.php        # Main registration form
├── process.php      # Handles form submission and inserts data into DB
├── view.php         # Displays all students with delete option
├── delete.php       # Handles deleting students
├── style.css        # Custom stylesheet
└── README.md        # Documentation

🛠️ Setup Instructions

Clone or Download the Project
Save the project files inside your web server folder (htdocs for XAMPP or www for WAMP).

Create the Database
Open phpMyAdmin and run:

CREATE DATABASE student_db;
USE student_db;

CREATE TABLE student_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    department VARCHAR(50) NOT NULL,
    matric_number VARCHAR(50) NOT NULL
);


Update Database Connection
Inside each PHP file that connects to the DB, update your credentials if needed:

$conn = new mysqli("localhost", "root", "", "student_db");


Run the Application

Open your browser and go to:

http://localhost/student_registration/index.php


Fill out the form and submit.

View all registered students at:

http://localhost/student_registration/view.php

🎨 Styling (style.css)

This project includes a custom stylesheet (style.css) that makes the form and table look modern and professional with different colors compared to previous assignments.

✅ Extra Credit

Added Delete button beside each record for removing a student.

👨‍🎓 Student Info

Name: Promise

Reg Number: 23/CSC/202
