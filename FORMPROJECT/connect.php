<?php
$firstname = isset($_POST['first_name']) ? htmlspecialchars(trim($_POST['first_name'])) : '';
$lastname  = isset($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : '';
$username  = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
$password  = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($firstname) || empty($lastname) || empty($username) || empty($password)) {
    die("All fields are required.");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "form-accounts";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error){
    die('Connect Error: ' . $conn->connect_error);
}

$checkStmt = $conn->prepare("SELECT acc_id FROM `account-information` WHERE username = ?");
$checkStmt->bind_param("s", $username);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    header("Location: error.php?error=" . urlencode("Sorry, that username is already taken."));
    exit();
}
$checkStmt->close();

$stmt = $conn->prepare("INSERT INTO `account-information` (`first_name`, `last_name`, `username`, `password`) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("ssss", $firstname, $lastname, $username, $hash);

if ($stmt->execute()){
    header("Location: success.php?user=" . urlencode($username));
    exit();

} else {
    if ($checkStmt->num_rows > 0) {
        header("Location: error.php?error=" . urlencode("Sorry, that username is already taken."));
        exit();
    }
    if (!$stmt->execute()){
        header("Location: error.php?error=" . urlencode("Database error: " . $stmt->error));
        exit();
    }
    if (empty($firstname) || empty($lastname) || empty($username) || empty($password)) {
        header("Location: error.php?error=" . urlencode("All fields are required."));
        exit();
    }
}
$stmt->close();
$conn->close();
?>
