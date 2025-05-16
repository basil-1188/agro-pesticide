# MACF - Agro Pesticide Online Shopping

**MACF** is an online platform designed to simplify the buying and selling of agro pesticides and related agricultural products. The system provides farmers and agro-product dealers a convenient way to browse, order, and manage pesticide purchases online.

## Features

- Browse various categories of pesticides and agro-products  
- Secure user registration and login system  
- Add products to cart and place orders online  
- Admin dashboard for managing products, orders, and users  
- Order tracking and status updates  
- Responsive design for easy use on mobile and desktop  

## Technologies Used

- Frontend: HTML, CSS, JavaScript, Bootstrap  
- Backend: PHP  
- Database: MySQL  

## Project Structure

macf/
├── admin/ # Admin panel for product and order management
├── assets/ # CSS, JS, images
├── includes/ # Common PHP files and configurations
├── user/ # User-facing pages for browsing and ordering
├── config/ # Database configuration files
├── index.php # Home page
└── README.md # Project documentation

bash
Copy
Edit

## Installation and Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/macf.git
Import Database

Create a MySQL database named macf or your preferred name.

Import the db.sql file located in the project folder to set up tables.

Configure Database Connection

Edit the database config file (e.g., config/db.php) and update your credentials:

php
Copy
Edit
$host = 'localhost';
$user = 'your_db_username';
$pass = 'your_db_password';
$dbname = 'macf';
Run the project

Use a local server environment like XAMPP, WAMP, or LAMP.

Place the project folder in the web root directory (htdocs for XAMPP).

Access the application via browser:

arduino
Copy
Edit
http://localhost/macf/
Usage
Users can browse products and add them to the cart.

Registered users can place orders and track their status.

Admins can manage products, view orders, and update order statuses.

Future Enhancements
Implement online payment gateway integration.

Add product reviews and ratings.

Include notifications for order updates.

Author
Basil M K
LinkedIn | GitHub
