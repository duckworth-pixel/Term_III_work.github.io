<?php

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Validate phone number
    $phonePattern = '/^\+254[1-9][0-9]{8}$/';
    
    if (preg_match($phonePattern, $phone)) {
        // Prepare the SQL query to insert data
        $request = "INSERT INTO `users_tbl`(`name`, `email`, `phone`, `address`) VALUES ('$name', '$email', '$phone', '$address')";

        // Attempt to run the query
        if (mysqli_query($connection, $request)) {
            header('Location: book.php');  // Redirect if success
        } else {
            // Check if the error is due to duplicate email
            if (mysqli_errno($connection) == 1062) {
                echo "Error: The email address '$email' is already in use. Please use a different email.";
            } else {
                echo "Error: " . $request . "<br>" . mysqli_error($connection);
            }
        }
    } else {
        // Count remaining digits
        $totalLength = 13; // "+254" + 9 digits
        $currentLength = strlen($phone);

        if ($currentLength > $totalLength) {
            echo "Error: The phone number is too long.";
        } else {
            $remainingDigits = $totalLength - $currentLength;
            echo "Please enter " . $remainingDigits . " more digit(s) to complete the phone number.";
        }
    }
} else {
    echo 'Something went wrong, please try again';
}

?>
