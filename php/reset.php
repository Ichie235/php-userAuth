<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    if(empty($email)){
        echo "<p>please enter your email</p>";
    }
    $password = $_POST['password'];
    if(empty($password)){
        echo "<p> please enter your password</p>";
    }

    resetPassword($email,$password);
}

function resetPassword($email,$password){
    //open file and check if the username exist inside
    $handle = fopen("../storage/users.csv","r");
    $form_data = fgetcsv($handle);
    while (($form_data = fgetcsv($handle)) !== FALSE) {
        if ($form_data[2] == $email) {
            $form_data[3]= $password;
           $handle= fopen("../storage/users.csv","w");
           fputcsv($handle,$form_data);
           fclose($handle);
           echo "<h2>Password Succesfully changed <br> <a href='../forms/login.html'>Login Here</a></h2>";
           break;
        }
    }
    echo "<h2 style='color: red'>Email not found</h2>";
}