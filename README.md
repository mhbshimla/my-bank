# Bank Management System

A university project developed to demonstrate banking automation and provide a complete digital banking workflow.  
This system includes multiple user roles such as Admin, Cashier, CEO, and Customer, allowing efficient management of accounts, transactions, notifications, and more.

---

## 👥 Team Members
- **Mst Hajera Begum Shimla**
- **Suborna Jahan**

---

## 🛠️ Technologies Used
- **PHP**
- **MySQL**
- **HTML**
- **CSS**
- **JavaScript**

---

## 📖 Project Description
This **Bank Management System** was developed as part of a university academic project.  
The system automates basic banking operations and provides a secure platform for users and administrators to interact with banking functionalities.  
It includes structured interfaces for Admins, Customers, Cashiers, and CEO-level users.

---

## 🚀 Features
- Secure Login & Logout  
- User Dashboard  
- Admin Dashboard  
- Cashier Dashboard  
- CEO Dashboard  
- Manage Accounts (Add/Edit/Delete)  
- View User Accounts  
- Fund Transfer  
- Transaction History  
- Notifications & Alerts  
- Contact/Feedback System  
- Search Account  
- View Profile / Update Profile  
- etc.............
---

## 📁 Installation Guide (Step-by-Step)

### **Step 1 — Install XAMPP**
1. Download & install **XAMPP** from the official website.  
2. Start **Apache** and **MySQL** from XAMPP control panel.

---

### **Step 2 — Add the Project File**
1. Download or copy your project folder.  
2. Paste it inside:


### **Step 3 — Create the Database**
1. Open a browser and go to: http://localhost/phpmyadmin 
2. Click **New** → Create a database named: mybank 
3. Click **Import** → Select your SQL file: mybank.sql
4. Click **Go** to import all tables.

---

### **Step 4 — Configure Database Connection**
Open the file:assets/db.php
Make sure your database credentials are correct:

    ```php
    $con = new mysqli("localhost", "root", "", "mybank");


---
## ⚠️ Disclaimer
This project was developed as a part of **university project work**.  
It is intended **for learning and demonstration purposes only** and should not be used in real-world banking operations.  