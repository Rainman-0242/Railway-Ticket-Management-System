# 🚆 Railway Ticket Management System

A web-based Railway Ticket Management System that allows users to book train tickets and manage their travel history, while giving admins the ability to monitor ticket records, verify users, and track booking activities. The project integrates front-end webpages with a MySQL backend using PHP and phpMyAdmin.

---

## 🌐 Project Overview

This project is a complete simulation of a railway ticketing platform with two types of users:
- **🔒 Admin Panel**: View ticket and user history, verify users, manage records.
- **👤 User Panel**: Login, book tickets, view past bookings, logout.

---

## ⚙️ Features

### ✅ User End
- 🔐 Login & Logout
- 🎟️ Book Tickets
- 📖 View Ticket History
- 🧾 User Info Stored in Database

### 🛠 Admin End
- 👁️ View All Booking History
- ✅ Verify Users
- 🧾 Monitor Seat Class, Distance, and Price Info
- 🧮 Manage Fare Based on Class and Distance

---

## 💻 Tech Stack

### 🌍 Frontend:
- HTML – Page structure
- CSS – Styling
- JavaScript – Client-side interactivity

### 🗃 Backend:
- PHP – Server-side scripting
- MySQL – Database
- phpMyAdmin – Database management interface

---

## 🧮 Database Structure

The database handles:
- 🚉 Seat Classes & Pricing – Stores prices based on seat class and distance.
- 👤 User Records – Login credentials and booking data.
- 🧾 Ticket History – Tracks past bookings.
- 🛠 Admin Activity Logs – Verification and server-side actions.

---

## 🛠️ Functionality Workflow

1. Users log in with their credentials.
2. Upon login, users can book tickets by selecting seat class and entering travel distance.
3. Ticket price is dynamically calculated using database values.
4. All booking data is stored and can be reviewed later.
5. Admins can log in, verify users, and review all ticketing activity.

---

## 🚀 How to Run

1. Clone the repository or download the project files.
2. Place the project in your `htdocs` folder (XAMPP).
3. Start **Apache** and **MySQL** from XAMPP.
4. Import the database `.sql` file into **phpMyAdmin**.
5. Open `localhost/your-folder-name` in your browser to access the system.

---

## 🔐 Default Credentials (example)

```
Admin Login:
Username: admin
Password: admin123

User Login:
Username: user1
Password: user123
```

> ⚠️ Please change default passwords before deploying.

---

## 📌 Future Improvements

- 🧾 E-ticket generation and printable receipts
- 📧 Email notifications
- 📱 Responsive design for mobile booking
- 🔐 Stronger password encryption and role-based access control

---

## 📝 License

This project is for academic and learning purposes. Feel free to modify and expand upon it.
