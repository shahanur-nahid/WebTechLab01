<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
</head>
<body>

<?php

$errors = [];

if (isset($_POST['register'])) {

    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $age = $_POST['age'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $course = $_POST['course'];
    $terms = isset($_POST['terms']);

    // 1. empty check
    if (empty($fullName) || empty($email) || empty($username) || empty($password) || empty($confirmPassword) || empty($age)) {
        $errors[] = "All fields are required.";
    }

    // 2. name validation
    if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
        $errors[] = "Full Name must contain only letters and spaces.";
    }

    // 3. email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // 4. username length
    if (strlen($username) < 5) {
        $errors[] = "Username must be at least 5 characters.";
    }

    // 5. password length
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    // 6. password match
    if ($password != $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // 7. age check
    if ($age < 18) {
        $errors[] = "Age must be 18 or above.";
    }

    // 8. gender check
    if (empty($gender)) {
        $errors[] = "Please select gender.";
    }

    // 9. course check
    if (empty($course)) {
        $errors[] = "Please select course.";
    }

    // 10. terms check
    if (!$terms) {
        $errors[] = "You must accept Terms & Conditions.";
    }

    // OUTPUT (NO REDIRECT)

    if (count($errors) > 0) {

        echo "<h3 style='color:red;'>Validation Errors</h3>";

        foreach ($errors as $error) {
            echo $error . "<br>";
        }

    } else {

        echo "<h2 style='color:green;'>Registration Successful!</h2>";

        echo "<h3>Submitted Details:</h3>";

        echo "Full Name: $fullName <br>";
        echo "Email: $email <br>";
        echo "Username: $username <br>";
        echo "Age: $age <br>";
        echo "Gender: $gender <br>";
        echo "Course: $course <br>";
    }
}

?>

</body>
</html>