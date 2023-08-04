Mahmoud's Corner Documentation

This is an eShop website built by Mahmoud Abusara. It is built using PHP, MySQL, JavaScript, HTML5, Bootstrap and CSS. The website has extensive features beyond the ability to buy different items. The site supports workflows based on different user roles; admins, support staff, and customers. Additionally, the website offers data collection, reporting and visualization for admins to use.

In summary, the website has the following features:

1. Account creation and management
    a. Sign-up and Login page (for customers)
    b. Support staff Login (for support)
    c. Support staff email and password assignment for their special accounts (for admins)
3. Orders
    a. Item selection and purchases (for customers)
    b. Adding additional items to sell (for admins)
    c. Purchase history and sales visualizations (for admins)
4. Customer support
    a. Creation of support tickers (for customers)
    b. Viewing of pending tickets (for customers)
    c. Assignment and completion of tickets (for support staff)
    d. Ticket history of solved and unsolved tickets (for admins)

To run the source code, please follow these steps:
1. Install XAMPP which includes MySQL and Apache web server
2. Import the techstore.sql script into PHPMyAdmin while Apache and MYSQL are running
3. Navigate to localhost/eCommerce/views/pages/index.php
4. To create a customer account, use the login and sign up buttons on the homepage
5. To access the site as an admin, you must be added into the admin table in the database and access the site with specific URLs
