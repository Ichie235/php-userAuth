<?php
if(isset($_POST['submit'])){
    $email =  $_POST['email'];
    if(empty($email)){
        echo "<p>please enter your username(email)</p>";
    }
    $password = $_POST['password'];
    if(empty($password)){
        echo "<p> please enter your password</p>";
    }

loginUser($email, $password);

}

function loginUser($email, $password){
    /*
     to check if username and password 
    from file match that which is passed from the form
    */
    $handle = fopen("../storage/users.csv","r");
    $form_data = fgetcsv($handle);
    while (($form_data = fgetcsv($handle)) !== FALSE) {
        if ($form_data[2] == $email && $form_data[3] == $password) {
            $successful = true;
            break;
        }
    }
    
fclose($handle);
// define variable
if(!$successful){
    echo "<p>Log in failed</p>";
}else{
    echo"<p>log in successful</P>";
}
}

