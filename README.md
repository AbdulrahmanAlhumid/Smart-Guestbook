# Smart Guestbook 📝

A simple yet functional PHP + MySQL web project where visitors can submit messages with their name, mood (😄 / 😐 / 😠), and see them displayed publicly. Includes an admin panel with statistics and management features.

---

## 🔧 Features

### 🧑‍💻 Public Side
- Submit name, message, and mood (😄 Happy – 😐 Neutral – 😠 Angry)
- View submitted messages (with name, mood emoji, and timestamp)

### 🔐 Admin Panel
- Protected login with simple password (stored in code)
- View all messages
- Delete specific messages
- View mood statistics (happy/neutral/angry)
- Display top used words in messages
- Logout functionality

---

## 📁 Folder Structure

```
smart-guestbook/
│
├── index.php               # Main public page
├── insert.php              # Handles form submission
│
├── style.css               # Basic styling
│              
│
├── includes/
│   └── db.php              # Database connection
│
├── admin/
│   ├── login.php           # Admin login page
│   ├── dashboard.php       # Admin control panel
│   ├── delete.php          # Delete message
│   ├── logout.php          # Logout script
│   └── auth.php            # Session protection
│
└── DB.sql                  # SQL script to create database and table
```

---

## ⚙️ Setup Instructions

### 1. Requirements
- XAMPP or any PHP server with MySQL
- PHP ≥ 7.4 recommended

### 2. Installation

1. Place the project folder `smart-guestbook` inside your `htdocs` (for XAMPP):
   ```
   C:\xampp\htdocs\smart-guestbook\
   ```

2. Start **Apache** and **MySQL** from the XAMPP Control Panel.

3. Import the database:
   - Open `http://localhost/phpmyadmin`
   - Create a new database called `smart_guestbook`
   - Import `DB.sql` file from the project folder

4. Visit the app:
   ```
   http://localhost/smart-guestbook/
   ```

5. Admin panel:
   ```
   http://localhost/smart-guestbook/admin/login.php
   ```
   - Default password: `admin123`

---

## 🔐 Admin Credentials

- **Username:** (none)
- **Password:** `admin123` *(set in `admin/login.php`)*
