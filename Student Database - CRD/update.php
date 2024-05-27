<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "UPDATE student_data SET name='$name', email='$email', age='$age' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // Handle cases where the form is not submitted properly
    echo "Form submission method is not POST.";
}

mysqli_close($conn);
?>
