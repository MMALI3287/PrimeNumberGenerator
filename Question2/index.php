<!DOCTYPE html>
<html lang="en">

<head>
    <title>Prime Numbers</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="containerHeader">
            <h1>Prime Numbers Generator</h1>
            <p>Welcome to my prime number generator page</p>
            <p>Simply input a numerical limit to get all the numbers that are prime</p>
        </div>
    </header>
    <main>
        <div class="container">
            <form method="post">
                <div class="form-group">
                    <label for="start">The starting number:</label>
                    <input type="number" id="start" name="start" required>
                </div>
                <div class="form-group">
                    <label for="end">The ending number:</label>
                    <input type="number" id="end" name="end" required>
                </div>
                <button type="submit">Generate All the Prime Numbers</button>
            </form>

            <?php
            // Function to check if a number is prime
            function is_prime($num)
            {
                // Check if the number is less than or equal to 1 or even
                if ($num <= 1 || $num % 2 == 0) {
                    return false;
                }
                // Check if the number is divisible by any prime number from 3 to the square root of the number
                for ($i = 3; $i <= sqrt($num); $i += 2) {
                    if ($num % $i == 0) {
                        return false;
                    }
                }
                return true;
            }

            // Check if the form has been submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $start = $_POST["start"];
                $end = $_POST["end"];
                echo "<table>";
                echo "<tr><th>Prime Numbers from $start to $end</th></tr>";
                // Check if the starting number is less than or equal to 2
                if ($start <= 2) {
                    echo "<tr><td>2</td></tr>";
                    $start = 3;
                }
                // Check if the starting number is even
                if ($start % 2 == 0) {
                    $start++;
                }
                // Loop through all odd numbers from the starting number to the ending number
                for ($i = $start; $i <= $end; $i += 2) {
                    if (is_prime($i)) {
                        echo "<tr><td>$i</td></tr>";
                    }
                }
                echo "</table>";
            }
            ?>

        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; Prime Numbers Generator</p>
        </div>
    </footer>
</body>

</html>