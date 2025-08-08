<?php
function calculateBMI($weight, $heightCm) {
    if ($heightCm <= 0) return 0;
    $heightM = $heightCm / 100;
    return round($weight / ($heightM * $heightM), 1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = trim($_POST['name']);
    $age    = intval($_POST['age']);
    $height = floatval($_POST['height']);
    $weight = floatval($_POST['weight']);

    if ($height > 0 && $weight > 0) {
        $bmi = calculateBMI($weight, $height);

        echo "<div class='bmi-result'>";
        echo "<h3>Hello, " . strtoupper(htmlspecialchars($name)) . "</h3>";
        echo "<p>Age: $age</p>";
        echo "<p>Height: $height cm</p>";
        echo "<p>Weight: $weight kg</p>";
        echo "<p>Your BMI is: <strong>$bmi</strong></p>";

        if ($bmi < 18.5) {
            echo "<p>Status: Underweight</p>";
        } elseif ($bmi < 24.9) {
            echo "<p>Status: Normal weight</p>";
        } elseif ($bmi < 29.9) {
            echo "<p>Status: Overweight</p>";
        } else {
            echo "<p>Status: Obesity</p>";
        }

        $tips = [
            "Stay hydrated",
            "Exercise at least 3 times a week",
            "Eat more vegetables",
            "Get enough sleep"
        ];
        echo "<h3>Health Tips:</h3><ul>";
        foreach ($tips as $tip) {
            echo "<li>$tip</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<p>Please enter valid height and weight.</p>";
    }
}
?>
