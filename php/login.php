<?php
    if($_SERVER["REQUEST_METHOD"] === 'POST'){ 
        $username = $_POST['username'] ?? ' ';
        $password = $_POST['password'] ?? ' ';
    }
    //This gets the user's input and checks that it is not null to avoid errors.

    $username = trim($username);
    $password = trim($password);
    //This trims whitespace

    






    /*  $username = filter_input(INPUT_POST, $username, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, $password, FILTER_SANITIZE_SPECIAL_CHARS);   */
        //Sanitizes the user's input to prevent XSS attacks (only needed if input is displayed on screen) 

    /*  if(!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)){
            //do something
        }                                                                   */
        //Checks if the username is ok and does something if not.
?>