<?php
require_once "config.php";

$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal for A&W Database-Driven Web Application</title>
    <link rel="stylesheet" href="main1.css">
</head>

<body>
    <header>
        <nav>
            <img src="download.jpeg" alt="logo">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#form_elements.html">Customize Your Order</a></li>
                <li><a href="#contact_form.html">Contact Us</a></li>
                <li><a href="#giftcards_form.html">Gift cards</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1>Welcome to A&W's Online Ordering Platform</h1>
            <p>Experience the convenience of ordering your favorite A&W meals from the comfort of your home with our database-driven web application. Discover exciting features designed to enhance your dining experience!</p>
            <h2>Features:</h2>
            <ol>
                <li>Customizable Orders: Our web application allows you to personalize your meal by selecting your preferred ingredients, toppings, and sides from our extensive menu. Whether you're craving a classic burger or a delicious salad, the choice
                    is yours.</li>
                <li>Order Tracking: Stay updated on the status of your order in real-time, from preparation to delivery. You'll receive notifications every step of the way, ensuring a smooth and hassle-free experience.</li>
                <li>Nutritional Information: Access detailed nutritional information for each menu item, empowering you to make informed choices that align with your dietary preferences and health goals. Whether you're counting calories or monitoring your
                    intake of specific nutrients, our web application has you covered.</li>
                <li>Special Offers: Enjoy exclusive discounts and promotions available only to our online customers. From BOGO deals to free upgrades, our special offers make your A&W experience even more rewarding.</li>
            </ol>
        </section>

        

        <section>
            <h2 id="contact_form">Contact Us</h2>
            <!-- Contact form code -->
            <form action="submit_contact.php" method="post">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
                <input type="submit" value="Submit">
            </form>
        </section>

        <section>
            <h2 id="giftcards_form">Gift cards</h2>
            <!-- Gift cards form code -->
            <form action="submit_giftcards.php" method="post">
                <label for="recipient_name">Recipient Name:</label><br>
                <input type="text" id="recipient_name" name="recipient_name"><br>
                <label for="email">Recipient Email:</label><br>
                <input type="email" id="recipient_email" name="recipient_email"><br>
                <label for="amount">Amount:</label><br>
                <input type="number" id="amount" name="amount"><br>
                <input type="submit" value="Submit">
            </form>
        </section>

        <section id="employees">
                    <h2>Employees</h2>
                    <div class="container">
                        <ul>
                            <li><a href="create.php">Add New Employee</a></li>
                        </ul>
                    </div>
                    <?php
                    $query = "SELECT * FROM employees";
                    $result = mysqli_query($link, $query);

                    if (mysqli_num_rows($result) > 0) :
                        ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['salary']; ?></td>
                                        <td>
                                            <a href="read.php?id=<?php echo $row['id']; ?>" title="View Record">View</a>
                                            <a href="update.php?id=<?php echo $row['id']; ?>" title="Update Record">Update</a>
                                            <a href="delete.php?id=<?php echo $row['id']; ?>" title="Delete Record">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No records found.</p>
                    <?php endif; ?>
                </section>
        <?php
        ?>
        </section>

    </main>
    <footer>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#form_elements">Customize Your Order</a></li>
                <li><a href="#contact_form">Contact Us</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>