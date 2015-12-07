<?php
session_start();
    $errors = array();
     //empty array to collect errors
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "please enter a valid email";
    }
    if(count($errors) > 0)
    {
        //if there are errors, assign the session variable!
        $_SESSION['errors'] = $errors;
        header('location: index.php');
    }
    else
    {
        require_once('new-connection.php');
        $query = "INSERT INTO email_addresses (email_address, created_at, updated_at)
            VALUES('{$_POST['email']}', NOW(), NOW())";
            if(run_mysql_query($query))
            {
                $_SESSION['success'] = "Your email address you entered ({$_POST['email']}) was added to the database!";
                header('location: success.php');
            }
            else
            {
                $_SESSION['errors'] = "Failed to add new Interest";
                header('Location: index.php');
            }
    }
?>