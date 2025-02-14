
<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM employees WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id
        ;
        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    if (!isset($_GET["id"]) || empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Employee Record</title>
    <link rel="stylesheet" href="main1.css">


</head>
<body>


    <nav>
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="create.php">Add New Employee</a></li>
            </ul>
        </div>
    </nav>

    <section id="main">
        <div class="container">
            <h2>Delete Employee Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="alert alert-danger">
                    <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                    <p>Are you sure you want to delete this employee record?</p>
                    <p>
                        <input type="submit" value="Yes" class="btn btn-danger">
                        <a href="index.php" class="btn btn-secondary">No</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
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
