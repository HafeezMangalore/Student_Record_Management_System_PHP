

```markdown
# Student Record Management System (SRMS)

## Overview

The Student Record Management System (SRMS) is a web-based application designed to manage student records efficiently. Developed using PHP and MySQL, this system provides an intuitive interface for administrators to manage student, course, and subject information effectively.

## Features

- **Admin Secure Login**: Secure authentication for administrators.
- **Dashboard**: View total counts of courses, subjects, students, countries, states, and cities.
- **Course Management**: Add, edit, and delete courses.
- **Subject Management**: Manage subjects linked to courses (add, edit, delete).
- **Student Registration**: Add new student records.
- **Student Management**: View, edit, and delete student details.
- **Session Management**: Update academic session details.
- **Profile Management**: Update admin profile details.
- **Change Password**: Update admin password.
- **Logout**: Securely log out of the system.

## Technology Stack

- **Language Used**: PHP 5.6, PHP 7.x
- **Database**: MySQL 5.x
- **User Interface**: HTML, AJAX, jQuery, JavaScript
- **Web Browser Compatibility**: Mozilla Firefox, Google Chrome, Internet Explorer 8, Opera
- **Software**: XAMPP, WAMP, MAMP, LAMP

## Project Modules

### Admin Module

- **Secure Login**: Admin authentication with secure login credentials.
- **Dashboard**: Overview of courses, subjects, students, countries, states, and cities.
- **Course Management**: Operations to add, edit, and delete courses.
- **Subject Management**: Manage subjects associated with courses.
- **Student Registration**: Add new student details.
- **Student Management**: View, edit, and delete student information.
- **Session Management**: Update academic session details.
- **Profile Management**: Admin profile updates.
- **Change Password**: Admin password management.
- **Logout**: Secure exit from the system.

## Database Design

Tables:

- `cities`
- `countries`
- `registration`
- `session`
- `states`
- `subject`
- `tbl_course`
- `tbl_login`

## Hardware Requirements

- **Processor**: Dual-core processor (e.g., Intel Pentium Dual-Core, AMD Athlon X2) or higher
- **RAM**: 2 GB RAM or higher (4 GB or more recommended)
- **Hard Drive**: 40 GB of free space or higher
- **Internet Connection**: Optional, for updates and online resources

## Software Requirements

- **Operating System**:
  - Windows 7 or later (64-bit recommended)
  - macOS (any recent version)
  - Linux (any major distribution like Ubuntu, Debian, Mint)
- **Web Server**:
  - Apache (https://httpd.apache.org/)
- **PHP**: PHP 7.2 or later (https://www.php.net/downloads.php)
- **MySQL**: MySQL 5.6 or later (https://www.mysql.com/)
- **Database Management Tool (Optional)**:
  - phpMyAdmin (https://blog.devart.com/top-10-mysql-gui-tools-for-database-management-on-windows.html)
  - MySQL Workbench (https://dev.mysql.com/downloads/workbench/)
- **Text Editor or IDE (Optional)**:
  - Visual Studio Code (https://code.visualstudio.com/)


## System Architecture

- **Three-Tier Architecture**:
  - **Presentation Layer**: User interface built with HTML, CSS, and JavaScript.
  - **Business Logic Layer**: PHP scripts handling core functionalities.
  - **Data Access Layer**: MySQL database interaction using PHP's MySQLi extension or PDO.

- **Components**:
  - **User Management**: Different roles with secure login and password hashing.
  - **Student Records**: Manage student information, including personal details and course enrollment.
  - **Course Management (Optional)**: Manage and link courses to students.
  - **Reporting (Optional)**: Generate and export reports.
  - **Security**: Authentication, authorization, input sanitization, data encryption, and regular backups.

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/student-record-management-system.git
   ```

2. **Navigate to the project directory:**

   ```bash
   cd student-record-management-system
   ```

3. **Set up the database:**

   - Import the provided SQL file into your MySQL database.
   - Configure database connection settings in the `config.php` file.

4. **Start the server:**

   - Ensure that XAMPP, WAMP, MAMP, or LAMP is running.

5. **Access the application:**

   Open your browser and navigate to `http://localhost/student-record-management-system`.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes. Ensure that you follow the code of conduct and contribution guidelines.


## Contact

For any inquiries or issues, please contact [your-email@example.com](mailto:hafeezmangalore7@gmail.com).

---

