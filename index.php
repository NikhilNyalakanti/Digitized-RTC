<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password,"digitized_rtc");

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO `trial` (`name`, `age`, `gender`, `email`, `phone`) VALUES ('$name', '$age', '$gender', '$email', '$phone')";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        // Flag for successful insertion
        $insert = true;

        echo  '<script>window.alert("You have been logged in to DIGITIZED RTC")</script>';
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <!-- <img class="img" src="img3.jpg" alt="transport"> -->
    <div class="container">
        <h1>LOGIN SUCCESSFUL</h1>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for logging in</p>";
        }
    ?>
        <!-- <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <button class="btn">Submit</button> 
        </form> -->
    </div>
    <script src="index.js"></script>
    
</body>
</html>
