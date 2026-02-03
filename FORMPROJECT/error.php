<?php
$errorMessage = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'An unexpected error occurred.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Error</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form>
            <h2>Oops!</h2>
            <p><?php echo $errorMessage; ?></p>
            <button type="button" onclick="window.location.href='Index.html'">Back to Signup</button>
        </form>
    </div>
</body>
</html>
