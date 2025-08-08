<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ruppin Gym - Schedule & Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/home.js" defer></script>
</head>

<body class="homePage">
<header>
    <h1>Welcome to Ruppin Gym</h1>
</header>

<?php include 'nav.php'; ?>

<main>
<?php
$servername = "sql210.byethost22.com";
$username   = "b22_39630884";
$password   = "156245";
$dbname     = "b22_39630884_gymDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<h2>Database Connection Failed:</h2> " . $conn->connect_error);
}
?>

<div class="signup-container">

    <!-- Weekly Schedule -->
    <div id="weekly-section" class="content-box">
        <h2>This Week's Schedule</h2>
        <?php
        $week_sql = "SELECT * FROM available_classes 
                     WHERE WEEK(class_date) = WEEK(CURDATE()) 
                     ORDER BY class_date, class_time";
        $week_result = $conn->query($week_sql);

        if ($week_result && $week_result->num_rows > 0) {
            echo "<table border='1' cellpadding='8' class='weekly-table'>
                    <tr><th>Day</th><th>Class</th><th>Trainer</th><th>Time</th></tr>";
            while ($row = $week_result->fetch_assoc()) {
                $day = date('l', strtotime($row['class_date']));
                echo "<tr>
                        <td>{$day}</td>
                        <td>".htmlspecialchars($row['class_name'])."</td>
                        <td>".htmlspecialchars($row['instructor'])."</td>
                        <td>".htmlspecialchars($row['class_time'])."</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No classes scheduled this week.</p>";
        }
        ?>
        <div class="btn-row">
            <button onclick="showSignup()">Sign Up for a Class</button>
            <button onclick="toggleRegistrations()">View Registrations</button>
        </div>
    </div>

    <!-- Registrations Table (hidden by default) -->
    <?php
    $reg_result = $conn->query("
        SELECT cr.full_name, ac.instructor, ac.class_name, ac.class_date, ac.class_time
        FROM class_registrations cr
        INNER JOIN available_classes ac ON cr.class_id = ac.class_id
        ORDER BY ac.class_date, ac.class_time, ac.class_name
    ");
    ?>
    <div id="registrations-table" class="content-box" style="display:none;">
        <h3>Class Registrations</h3>
        <?php if ($reg_result && $reg_result->num_rows > 0): ?>
            <table border="1" cellpadding="8" class="signup-table">
                <tr>
                    <th>Full Name</th>
                    <th>Trainer</th>
                    <th>Class Type</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php while ($r = $reg_result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['full_name']) ?></td>
                        <td><?= htmlspecialchars($r['instructor']) ?></td>
                        <td><?= htmlspecialchars($r['class_name']) ?></td>
                        <td><?= htmlspecialchars($r['class_date']) ?></td>
                        <td><?= htmlspecialchars($r['class_time']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No registrations yet.</p>
        <?php endif; ?>
    </div>

    <!-- Monthly Schedule + Signup (hidden by default) -->
    <div id="signup-section" class="content-box" style="display:none;">
        <h2>Full Month Schedule</h2>
        <?php
        $month_sql = "SELECT * FROM available_classes 
                      WHERE MONTH(class_date) = MONTH(CURDATE()) 
                      ORDER BY class_date, class_time";
        $month_result = $conn->query($month_sql);

        if ($month_result && $month_result->num_rows > 0) {
            echo "<table border='1' cellpadding='8' class='signup-table'>
                    <tr><th>Date</th><th>Class</th><th>Trainer</th><th>Time</th></tr>";
            while ($row = $month_result->fetch_assoc()) {
                echo "<tr>
                        <td>".htmlspecialchars($row['class_date'])."</td>
                        <td>".htmlspecialchars($row['class_name'])."</td>
                        <td>".htmlspecialchars($row['instructor'])."</td>
                        <td>".htmlspecialchars($row['class_time'])."</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No classes scheduled this month.</p>";
        }

        $dropdown_result = $conn->query("SELECT class_id, class_name, instructor, class_date, class_time 
                                         FROM available_classes ORDER BY class_date, class_time");
        if ($dropdown_result && $dropdown_result->num_rows > 0) {
            echo '<h2>Register for a Class</h2>
                  <form action="signup_process.php" method="post" class="contact-form">
                      <input type="text" name="full_name" placeholder="Full Name" required>
                      <input type="tel" name="phone" placeholder="Phone Number" required>
                      <label for="class_id">Choose Class:</label>
                      <select name="class_id" required>';
            while ($row = $dropdown_result->fetch_assoc()) {
                $option = htmlspecialchars("{$row['class_name']} with {$row['instructor']} on {$row['class_date']} at {$row['class_time']}");
                echo "<option value='{$row['class_id']}'>$option</option>";
            }
            echo '  </select>
                    <button type="submit">Sign Up</button>
                  </form>
                  <button onclick="showWeekly()">← Back</button>';
        }
        ?>
    </div>

</div><!-- /.signup-container -->
</main>

<footer>
    <p>Today&apos;s date: <span id="footer-date"></span></p>
</footer>

<!-- Visible document.write for JS requirement -->
<script>
  document.write('<div id="js-banner" class="js-banner">Site loaded with JavaScript ✔</div>');
</script>

<!-- Handle ?signup=success|duplicate|full|max=... and switch sections -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const params = new URLSearchParams(window.location.search);
  if (!params.has('signup')) return;

  // Always show signup section on return
  const weekly = document.getElementById('weekly-section');
  const signup = document.getElementById('signup-section');
  if (weekly && signup) { weekly.style.display = 'none'; signup.style.display = 'block'; }

  // Alert user based on status
  switch (params.get('signup')) {
    case 'success':
      alert('✅ You have successfully signed up for the class!');
      const form = document.querySelector('#signup-section form');
      if (form) form.reset();
      break;
    case 'duplicate':
      alert('⚠️ You are already registered for this class.');
      break;
    case 'full':
      const max = params.get('max') || '';
      alert(`⚠️ Sorry, this class is full${max ? ` (max ${max} students)` : ''}.`);
      break;
    case 'error':
      alert('❌ Error processing signup. Please try again.');
      break;
  }

  // Clean the URL so refresh won’t repeat alert
  params.delete('signup');
  params.delete('max');
  const cleanURL = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
  history.replaceState({}, '', cleanURL);
});
</script>

</body>
</html>
