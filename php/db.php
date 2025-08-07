<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "accounts";
    /** @var mysqli|null $conn */   //a zis chatgpt ca daca bag asta aici dispar warningurile din vscode 😀👍
    $conn = null;

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }catch(mysqli_sql_exception){
        echo "Database failed to connect";
    }

?>