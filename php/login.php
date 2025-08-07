<?php
    include("db.php");

    if($_SERVER["REQUEST_METHOD"] === 'POST'){ 
        $username = trim($_POST['username'] ?? ' ');
        $password = trim($_POST['password'] ?? ' ');

        if(empty($username) || empty($password)) 
            die("Invalid credentials");

        $safe_username = mysqli_real_escape_string($conn, $username);

        $retrieve_sql = "SELECT password FROM accounts WHERE username='$safe_username'";
        $retrieve_result = mysqli_query($conn, $retrieve_sql);

        if(mysqli_num_rows($retrieve_result) === 1){
            $row = mysqli_fetch_assoc($retrieve_result);
            $hashed_password = $row['password'];
        }else{
            die("some fucker messed with the database and there 2 users with the same username");
        }

        if(!password_verify($password, $hashed_password))
            die("YOU SHALL NOT PASS!");

        header("Location: home.html");
        exit();
    }

    /*
    if($hasloggedin){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
    }   //idek how to use this shi but ill keep it here when i decide to implement sessions
    */

    // session_destroy();
    // header("Location: index.html");

    /*  $username = filter_input(INPUT_POST, $username, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, $password, FILTER_SANITIZE_SPECIAL_CHARS);   */
        //Sanitizes the user's input to prevent XSS attacks (only needed if input is displayed on screen) 

    /*  if(!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)){
            //do something
        }                                                                   */
        //Checks if the username is ok and does something if not.
?>