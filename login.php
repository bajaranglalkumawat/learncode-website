<?php
$SERVER="localhost";
$username="root";
$password="";
$database="hello";

$conn=mysqli_connect($SERVER,$username,$password,$database);
if(mysqli_connect_errno()){echo "".mysqli_connect_error();}

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO `hi` ( `username`, `email`, `password`, `time`) 
VALUES ('$username', '$email', '$password', current_timestamp())";
$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        /* General Reset */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .form-wrapper {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
            animation: fadeIn 1.5s ease-out;
        }

        /* Title Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            font-weight: 700;
            animation: slideIn 1s ease-out;
        }

        /* Slide-in Animation for Heading */
        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Label Styling */
        label {
            font-size: 14px;
            margin-bottom: 8px;
            text-align: left;
            width: 100%;
            color: #555;
        }

        /* Input Styling */
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #6a11cb;
            outline: none;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.6);
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #6a11cb;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
        }

        button:hover {
            background-color: #2575fc;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(1px);
        }

        /* Placeholder Styling */
        input::placeholder {
            color: #888;
        }

        input:focus::placeholder {
            color: transparent;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .form-wrapper {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }

            input {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }

        /* Hover Effect on Form Fields */
        input:hover, button:hover {
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.5);
            border-color: #6a11cb;
        }

    </style>
</head>
<body><br>
    <div class="container">
        <div class="form-wrapper">
            <h2>Create a New Account</h2>
            <form action="index.php" method="POST" class="form-container">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">

                <button type="submit">Create Account</button>
            </form>
        </div>
    </div>
</body>
</html>
