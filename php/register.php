<?php
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['username'] = $email;

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
        //open file 
        $file_name = fopen("../storage/users.csv","a");
        $no_rows = count(file("../storage/users.csv"));
        // append serial number to the userdata.csv file
        if($no_rows > 1){
            $no_rows = ($no_rows-1) + 1 ;
        }
        $form_data = array(
            "serial_no" => $no_rows,
            "name" => $username,
            "email"=> $email,
            "password"=> $password,
        );
        fputcsv($file_name,$form_data);
        fclose($file_name);
        $name="";
        $email="";
        $password="";
    
    // echo "OKAY";
    echo "<h2>OKAY. YOU ARE REGISTERED</h2>";

}



