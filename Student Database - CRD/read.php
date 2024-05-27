<?php
include 'db.php';

$sql = "SELECT * FROM student_data";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['age'] . "</td><td> <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td></tr>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
