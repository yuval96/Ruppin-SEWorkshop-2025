<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator - Ruppin Gym</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <h1>BMI Calculator</h1>
</header>

<style>
  #logicTitle { color:#1565c0; font-size:1.9rem; }
  .logicNote { color:#444; font-style:italic; }
</style>


<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<main>
    <form action="" method="post" class="contact-form">
        <h2 id="logicTitle">BMI Calculator</h2>
        <p class="logicNote">Enter height and weight to calculate your BMI.</p>
        <input type="text" name="name" placeholder="Name"
               value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" required>
        <input type="number" name="age" placeholder="Age"
               value="<?php echo isset($_POST['age']) ? $_POST['age'] : '' ?>" required>
        <input type="number" name="height" placeholder="Height (cm)"
               value="<?php echo isset($_POST['height']) ? $_POST['height'] : '' ?>" required>
        <input type="number" name="weight" placeholder="Weight (kg)"
               value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : '' ?>" required>
        <button type="submit">Calculate</button>
    </form>

    <div id="result">
        <?php
        include 'logic_result.php';
        ?>
    </div>
</main>
</body>
</html>
