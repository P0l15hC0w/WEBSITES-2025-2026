<?php
$username = isset($_GET['user']) ? htmlspecialchars($_GET['user']) : 'User';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Successful</title>
    <link rel="stylesheet" href="style.css"> <!-- your CSS file -->
</head>
<body>
    <div class="container">
        <form>
            <h2>Welcome, <?php echo $username; ?>!</h2>
            <p>You have successfully signed up.</p>
            <button type="button" onclick="window.location.href='login.php'">Go to Login</button>
        </form>
    </div>
</body>
</html>
