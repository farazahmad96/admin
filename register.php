<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input
    $cus_name = $_POST['cus_name'];
    $cus_email = $_POST['cus_email'];
    $cus_address = $_POST['cus_address'];
    $cus_city = $_POST['cus_city'];
    $cus_country = $_POST['cus_country'];
    $cus_zip = $_POST['cus_zip'];

    // Validate and sanitize user input (you may want to add more validation)
    $cus_name = htmlspecialchars($cus_name);
    $cus_email = filter_var($cus_email, FILTER_VALIDATE_EMAIL);
    $cus_address = htmlspecialchars($cus_address);
    $cus_city = htmlspecialchars($cus_city);
    $cus_country = htmlspecialchars($cus_country);
    $cus_zip = htmlspecialchars($cus_zip);

    // Check if the email is already registered
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$cus_email'";
    $emailResult = $conn->query($checkEmailQuery);

    if ($emailResult->num_rows > 0) {
        $error_message = "Email already registered. Please use a different email address.";
    } else {
        // Insert data into the "users" table
        $insertQuery = "INSERT INTO users (name, email, address, city, country, zip) 
                        VALUES ('$cus_name', '$cus_email', '$cus_address', '$cus_city', '$cus_country', '$cus_zip')";

        if ($conn->query($insertQuery) === TRUE) {
            // Registration successful, redirect to login page
            header('Location: login.html');
            exit();
        } else {
            $error_message = "Error: " . $conn->error;
        }
    }
}

// Close the database connection
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <style>
        .login{
            background: url('./dist/images/login-new.jpeg')
        }
    </style>
    <title>Register</title>
</head>
<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="">
                <p class="text-gray-800 font-medium">Register</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Your Name" aria-label="Name">
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Your Email" aria-label="Email">
                </div>
                <div class="mt-2">
                    <label class=" block text-sm text-gray-600" for="cus_address">Address</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_address" name="cus_address" type="text" required="" placeholder="Street" aria-label="Email">
                </div>
                <div class="mt-2">
                    <label class="hidden text-sm block text-gray-600" for="cus_city">City</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_city" name="cus_city" type="text" required="" placeholder="City" aria-label="Email">
                </div>
                <div class="inline-block mt-2 w-1/2 pr-1">
                    <label class="hidden block text-sm text-gray-600" for="cus_country">Country</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_country" name="cus_country" type="text" required="" placeholder="Country" aria-label="Email">
                </div>
                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                    <label class="hidden block text-sm text-gray-600" for="cus_zip">Zip</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_zip"  name="cus_zip" type="text" required="" placeholder="Zip" aria-label="Email">
                </div>

                <div class="mt-4">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit" name="register">Register</button>
                </div>
                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="login.html">
                    Already have an account ?
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>