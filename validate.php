<?php

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
        
        //define other variables with submitted values from $_POST
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);

        //md5 hash password for security
        $password = md5($_POST['password']);

        //path were our avatar image will be stored
        $avatar_path = $mysqli->real_escape_string('O:/newok/images/'.$_FILES['avatar']['name']);
        $avatar_new_path = 'http://127.0.0.1/images/'.$_FILES['avatar']['name'];
        //make sure the file type is image
        if (preg_match("!image!",$_FILES['avatar']['type'])) {
            
            //copy image to images/ folder 
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){
                
                //set session variables to display on welcome page
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_new_path;
                //insert user data into database
                $sql = "INSERT INTO pbldb (username, email, password, avatar) ". "VALUES ('$username', '$email', '$password', '$avatar_new_path')";
                
                //check if mysql query is successful
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration successful! ". "Added $username to the database!";
                    //redirect the user to welcome.php
                    header("location: welcome.php");
                }
				else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();          
            }
            else {
                $_SESSION['message'] = 'File upload failed!';
            }
        }
        else {
            $_SESSION['message'] = 'Please only upload GIF, JPG or PNG images!';
        }
    }
    else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>