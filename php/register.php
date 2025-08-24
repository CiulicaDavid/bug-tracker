<?php
    include('db.php');

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if(empty($username) || empty($password))
            die("Invalid credentials");
        if(strpos($password, ' ') || strpos($username, ' '))
            die("Can't use white spaces");

        $safe_username = mysqli_real_escape_string($conn, $username);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $check_sql = "SELECT * FROM accounts WHERE username='$safe_username'";
        $check_result = mysqli_query($conn, $check_sql);

        if(mysqli_num_rows($check_result) > 0)
            die("Username already taken");

        $insert_sql = "INSERT INTO accounts (username, password) VALUES ('$safe_username', '$hashed_password')";
        $insert_result = mysqli_query($conn, $insert_sql);

        if(!$insert_result)
            die("Error occured while inserting");

        header("Location: ../pages/login.html");
        exit();
    }

    /*fuckass chatgpt says:

    SQL Injection: Directly embedding $username and $password in the SQL string without escaping or prepared statements is a big no-no. An attacker could inject SQL code through the username.
    No error handling: What if the query fails? No feedback or logging.
    No input validation: What if username/password are too short, too long, or contain invalid characters?
    No response: The user gets no confirmation or error message.

    will take into consideration but not todaaayyyy
    */


    /*
            $displayDB_sql = "SELECT * FROM accounts";
        $displayDB_result = mysqli_query($conn, $displayDB_sql);
        if ($displayDB_result && mysqli_num_rows($displayDB_result) > 0) {
            while ($row = mysqli_fetch_assoc($displayDB_result)) {
                echo "ID: " . $row['account_id'] . " | ";
                echo "Username: " . $row['username'] . " | ";
                echo "Password: " . $row['password'] . "<br>";
            }
        }else{
            echo "No records found.";
        } 
    */
?>  