<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Student Database</h2>
        <form action="create.php" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="age" placeholder="Age">
            <br>
            <button type="submit">Add Student</button>
        </form>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
            <?php include 'read.php'; ?>
        </table>
    </div>
</body>
</html>
