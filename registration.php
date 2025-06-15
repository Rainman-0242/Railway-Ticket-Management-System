<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container card">
        <!-- // logo section -->
        <div class="d-flex justify-content-center justify-items-center w-50 m-auto">
            <a href="index.php">
            <img src="assets/images/logo.png" alt="logo" class="img-fluid">
            </a>
        </div>
        
        <?php
        $registration = "active";
        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $username = $_POST["username"];
            $nid = $_POST["nid_card"];
            $phone = $_POST["mobile"];
            $role = "user";
            $avatar = "default.png";

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();
            if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
                array_push($errors,"All fields are required");
               }
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
               }
               if (strlen($password)<8) {
                array_push($errors,"Password must be at least 8 charactes long");
               }
               if ($password!==$passwordRepeat) {
                array_push($errors,"Password does not match");
               }

               
               require_once "database.php";
               $sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username' OR nid_card = '$nid' OR phone_number = '$phone'";
               $result = mysqli_query($conn, $sql);
               $rowCount = mysqli_num_rows($result);
               if ($rowCount>0) {
                array_push($errors,"User Already Exists with this email or username or nid or phone number");
               }


               if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger mt-2'>$error</div>";
                }
               }else{
                
                
                $sql = "INSERT INTO users (name, email, password, username, role, nid_card, phone_number, avatar) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"ssssssss",$fullName, $email, $passwordHash, $username, $role, $nid, $phone, $avatar);
                    mysqli_stmt_execute($stmt);
                    $registration = "passive";
                    echo "<div class='alert alert-success mt-2'>You are registered successfully.</div>";

                }else{
                    die("Something went wrong");
                }    
               } 
        }       
        ?>
        <?php if ($registration == "active") { ?>
        <form action="registration.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" class="form-control" name="fullname" placeholder="John Doe" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="johndoe@example.com" required>
            </div>
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" class="form-control" name="username" placeholder="johndoe" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Phone:</label>
                <input type="tel" class="form-control" name="mobile" placeholder="01900000000" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11">
            </div>
            <div class="form-group">
                <label for="email">NID Card Number:</label>
                <input type="text" class="form-control" name="nid_card" placeholder="1971XXXXXXXXXXXXX" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="***********" required>
            </div>
            <div class="form-group">
                <label for="repeat_password">Repeat Password:</label>
                <input type="password" class="form-control" name="repeat_password" placeholder="***********" required>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn" style="background-color:#9d0858;color:#ffffff" value="Register" name="submit">
            </div>
        </form>
        <?php } else { ?>
            <div><p>Already registered <a href="login.php">Login Here</a></p></div>
        <?php } ?>
    </div>
         
</body>
</html>