<?php
    if($_SERVER["REQUEST_METHOD"] === 'POST'){ 
        $username = $_POST['username'] ?? ' ';
        $password = $_POST['password'] ?? ' ';
    }
    //This gets the user's input and checks that it is not null to avoid errors.

    $username = trim($username);
    $password = trim($password);
    //This trims whitespace

    






    /*  $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');   */
        //Sanitizes the user's input to prevent XSS attacks (only needed if input is displayed on screen) 

    /*  if(!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)){
            //do something
        }                                                                   */
        //Checks if the username is ok and does something if not.
?>