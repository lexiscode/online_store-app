# Online Store Application

A online-shop (ecommerce or e-shop) can be described as a sales and communication-oriented website. This web application is created using HTML, CSS, JS, jQuery, PHP, OOP/PDO, MVC and Singleton Design Patterns, and also ensured to adhere to SOLID Principles.


## Features

- A signup and signin form is created and are required in order to gain majority access to the features of the application.
- Instead of single product, there are two product categories, like drinks and foods product
- There is a link where we can view all products, and links to view a specific categorized products lists
- There are page(s) to read, add, delete and update products, this page(s) should only be accessible to a logged-in superuser(s) only, and not accessible to general users (like customers).
- There are many restrictions to the site for non-logged-in users, for example they can’t add to cart nor order any goods, and neither can they see other navigation main menus which others registered login users can access.
- Directly typing a specific url on the browser is restricted/redirected whereby if a non-logged-in user tries to access the cart page or checkout page by typing the url path in the browser, it should redirect them back to login page or the homepage for non-logged in users.
- Inside the product page where we can have the “Add To Cart” button, there is as well a “review/comment section” too, and also "Related Products".
- There is a page where we can see the lists of all checked-out successful orders.
- Inside the cart page, there is an input field and update button to update/set the amount of quantities of goods to be bought, which would modified the total price automatically before checkout.
- The checkout page can as well have a summary of the cart  which are to be purchased; and on successful checkout, the previous cart should be refreshed to zero (i.e. empty).

For the project demo, you can look at the video below:

https://github.com/lexiscode/online_store-app/assets/42210784/fb85d85f-737a-48b6-8eec-2ef14bfac280


## Installation

1. Make sure you have PHP installed on your system.
2. Start the phpMyAdmin Apache and MySQL server in the from the xampp control, located in the xampp directory.
3. Clone the repository via HTTPS or SSH to your local machine.
4. Move the repo directory into xampp/htdocs directory.
5. Open the repository with your VS Code IDE (or any other IDEs).
6. Open a browser and go to URL http://localhost/phpmyadmin/
7. Then, click on the "Databases" tab.
8. Create a database naming “web_shop” and then click on the "Import" tab.
9. Click on "browse file" and select “web_shop.sql” file which is inside this project repo "db" directory.
10. Click on "Go". 


## Usage

- Go to phpMyAdmin, click on the project's database created, then click on the "Privileges" tab and ensure you find details as this below present; it's intentionally not password protected.
Hostname: "localhost";
Username: "root";
Password: "";
- Open a browser and go to URL http://localhost/online_store-app/
- Navigate around the application and create an account. When satified, logout and check out the admin webpage by logging in as an admin using the details below.
- Administration access login information
Username: "lexis";
Password: "unlockme123"


## Technologies

- PHP: Server-side scripting language used for handling data and rendering views.
- MySQL: Database-based storage used to store the student records.
- CSS: Frontend styling language used to style an HTML document.
- Bootstrap: Front-end framework for responsive and modern user interface design.
- JavaScript: Powerful programming language that can add interactivity to a website.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.
