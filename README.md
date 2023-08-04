# Online Store Application

The Online Store Application is an e-commerce web application that allows users to browse and purchase products. It is built using a combination of HTML, CSS, JS, jQuery, PHP, OOP/PDO, MVC, and Singleton Design Patterns, with a focus on adhering to SOLID Principles.

## Features

- **User Authentication**: Users are required to sign up and sign in to access the majority of the application's features.
- **Product Categories**: The application offers two product categories, drinks, and foods, allowing users to explore different types of products.
- **Product Listings**: Users can view all products and access specific lists of products within each category.
- **Superuser Privileges**: Superusers have exclusive access to pages for reading, adding, deleting, and updating products. General users are restricted from accessing these pages.
- **User Restrictions**: Non-logged-in users have limited access, preventing them from adding items to the cart or placing orders. Certain navigation menus are hidden for non-registered users.
- **URL Restriction**: Non-logged-in users attempting to access restricted pages through direct URLs are redirected back to the login page or the homepage.
- **Product Review/Comments**: The product page includes a review/comment section for users to provide feedback, and it also features related products.
- **Order History**: The application provides a page where users can view all successfully checked-out orders.
- **Cart Functionality**: Inside the cart page, users can update the quantities of items to be purchased, which automatically modifies the total price before checkout. A successful checkout refreshes the cart to zero (empty).

## Installation

To set up the Online Store Application, follow these steps:

1. Ensure PHP is installed on your system.
2. Start the Apache and MySQL servers using xampp control in the xampp directory.
3. Clone the repository to your local machine using HTTPS or SSH.
4. Move the repository directory into the xampp/htdocs directory.
5. Open the repository in your preferred IDE (e.g., VS Code).
6. In your browser, navigate to http://localhost/phpmyadmin/.
7. Click on the "Databases" tab and create a database named "web_shop".
8. Click on the "Import" tab, select the "web_shop.sql" file from the "db" directory in the project, and click "Go".

## Usage

To use the Online Store Application, follow these steps:

1. Go to phpMyAdmin and access the project's database.
2. Verify that the database privileges have the following details (no password protected intentionally):
   - Hostname: "localhost"
   - Username: "root"
   - Password: ""
3. In your browser, go to http://localhost/online_store-app/.
4. Explore the application, create an account, and log out.
5. Access the admin webpage by logging in as an admin using the following details:
   - Username: "lexis"
   - Password: "unlockme123"

## Technologies

The Online Store Application is built using the following technologies:

- **PHP**: A server-side scripting language used for handling data and rendering views.
- **MySQL**: A database-based storage system used to store product records.
- **CSS**: A frontend styling language used to create appealing visuals for the HTML documents.
- **Bootstrap**: A front-end framework that facilitates responsive and modern user interface design.
- **JavaScript**: A powerful programming language used to add interactivity and dynamic behavior to the website.

## Contributing

Contributions to the project are welcome! If you encounter any issues or have suggestions for improvements, please open an issue or submit a pull request.

Thank you for considering the Online Store Application! We hope you enjoy using it and find it helpful for your e-commerce needs.