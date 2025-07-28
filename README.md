Guestbook Web Application - README

A simple **PHP + MySQL** guestbook project built using **XAMPP**.
This project allows visitors to leave messages and admins to manage inappropriate content.

---

## Features

- **Page 1 (index.php):**
  - Form for visitors to leave their **name** and **message**.
  - Displays all previous messages with timestamps.

- **Page 2 (admin.php):**
  - Admin login to manage guestbook entries.
  - Ability to **delete inappropriate messages**.

- **Database Features:**
  - Messages are stored in a MySQL database.
  - Each entry contains a **name**, **message**, and **timestamp**.
  - Basic spam protection (e.g., CAPTCHA can be added).

---

## Technologies Used

- **Backend:** PHP (Core PHP)
- **Frontend:** HTML, CSS
- **Database:** MySQL
- **Server:** XAMPP (Apache + MySQL)

---

## Installation Guide

### 1. Install XAMPP
- Download and install XAMPP from https://www.apachefriends.org.

### 2. Start Apache and MySQL
- Launch **XAMPP Control Panel**.
- Click **Start** for **Apache** and **MySQL**.

### 3. Database Setup
- Open http://localhost/phpmyadmin.
- Create a new database called **guestbook_db**.
- Run this SQL query:
  ```sql
  CREATE TABLE messages (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100) NOT NULL,
      message TEXT NOT NULL,
      timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
  );
  ```

### 4. Project Files
- Copy the project folder **guestbook** into:
  `C:\xampp\htdocs\`
- The folder structure should look like:
  ```
  C:\xampp\htdocs\guestbook\
      ├── index.php
      ├── admin.php
      ├── db.php
      ├── style.css
  ```

### 5. Database Connection
- Update **db.php** if needed:
  ```php
  <?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "guestbook_db";

  $conn = new mysqli($host, $user, $pass, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  ?>
  ```

### 6. Run the Project
- Open your browser:
  - **Guestbook Page:** http://localhost/guestbook/index.php
  - **Admin Page:** http://localhost/guestbook/admin.php

---

## Default Admin Login
- **Username:** admin
- **Password:** admin123 (default; can be changed in `admin.php`)

---

## Learning Objectives

- Handling **form submissions** with PHP.
- Performing **CRUD operations** with MySQL.
- Implementing **basic admin authentication**.
- Using **XAMPP** for local PHP development.

---

## Future Enhancements

- Add **CAPTCHA** for spam protection.
- Implement **AJAX** for dynamic message loading.
- Improve **security** (hashed passwords for admin, prepared SQL statements).
- Add **pagination** for messages.

---

## Author

Developed as a sample project for learning PHP and database management.

