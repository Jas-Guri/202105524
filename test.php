<?php
// This PHP script handles CRUD operations for menu items

// Database connection
$servername = "localhost";
$username = "username"; // Your MySQL username
$password = "password"; // Your MySQL password
$dbname = "aw_database"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create (Insert) operation
function createMenuItem($item_name, $description, $price, $image_url) {
    global $conn;
    $sql = "INSERT INTO menu_items (item_name, description, price, image_url) VALUES ('$item_name', '$description', '$price', '$image_url')";
    if ($conn->query($sql) === TRUE) {
        return "New menu item created successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read (Retrieve) operation
function getAllMenuItems() {
    global $conn;
    $sql = "SELECT * FROM menu_items";
    $result = $conn->query($sql);
    $menuItems = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $menuItems[] = $row;
        }
    }
    return $menuItems;
}

// Update operation
function updateMenuItem($item_id, $item_name, $description, $price, $image_url) {
    global $conn;
    $sql = "UPDATE menu_items SET item_name='$item_name', description='$description', price='$price', image_url='$image_url' WHERE item_id=$item_id";
    if ($conn->query($sql) === TRUE) {
        return "Menu item updated successfully";
    } else {
        return "Error updating menu item: " . $conn->error;
    }
}

// Delete operation
function deleteMenuItem($item_id) {
    global $conn;
    $sql = "DELETE FROM menu_items WHERE item_id=$item_id";
    if ($conn->query($sql) === TRUE) {
        return "Menu item deleted successfully";
    } else {
        return "Error deleting menu item: " . $conn->error;
    }
}

// Close database connection
$conn->close();

