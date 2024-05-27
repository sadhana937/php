<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPA Calculator</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .add-button {
            margin-bottom: 1rem;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2rem;
        }
    </style>
    <script>
        function addInput() {
            const gradesDiv = document.getElementById('grades-div');
            const creditsDiv = document.getElementById('credits-div');

            const gradeInput = document.createElement('input');
            gradeInput.setAttribute('type', 'text');
            gradeInput.setAttribute('name', 'grades[]');
            gradeInput.setAttribute('class', 'form-control mb-2');
            gradeInput.setAttribute('required', true);

            const creditInput = document.createElement('input');
            creditInput.setAttribute('type', 'number');
            creditInput.setAttribute('name', 'credits[]');
            creditInput.setAttribute('class', 'form-control mb-2');
            creditInput.setAttribute('min', '0');
            creditInput.setAttribute('required', true);

            gradesDiv.appendChild(gradeInput);
            creditsDiv.appendChild(creditInput);
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">GPA Calculator</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-6" id="grades-div">
                    <label for="grades">Enter grades:</label>
                    <input type="text" name="grades[]" class="form-control" required>
                </div>
                <div class="form-group col-md-6" id="credits-div">
                    <label for="credits">Enter credits:</label>
                    <input type="number" name="credits[]" class="form-control" min="0" required>
                </div>
            </div>
            <button type="button" class="btn btn-secondary add-button" onclick="addInput()">Add another subject</button><br>
            <button type="submit" class="btn btn-primary">Calculate GPA</button>
        </form>

        <?php
        function calculateGPA($grades, $credits) {
            $total_points = 0;
            $total_credits = 0;
           
            $grade_mappings = [
                'S' => 10.0,
                'A' => 9.0,
                'B' => 8.0,
                'C' => 7.0,
                'D' => 6.0,
                'E' => 5.0,
                'F' => 0.0
            ];

            for ($i = 0; $i < count($grades); $i++) {
                $grade = strtoupper(trim($grades[$i]));
                $credit = floatval(trim($credits[$i]));

                if (array_key_exists($grade, $grade_mappings) && $credit > 0) {
                    $total_points += $grade_mappings[$grade] * $credit;
                    $total_credits += $credit;
                }
            }

            if ($total_credits > 0) {
                $gpa = $total_points / $total_credits;
                return number_format($gpa, 2);
            } else {
                return "N/A";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $grades = $_POST["grades"];
            $credits = $_POST["credits"];
            $gpa = calculateGPA($grades, $credits);
            echo "<p class='result'>Your GPA is: $gpa</p>";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
