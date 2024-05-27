<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];

$sql = "INSERT INTO student_data (name, email, age) VALUES ('$name', '$email', '$age')";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
