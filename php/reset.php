<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    if(empty($email)){
        echo "<p>please enter your email</p>";
    }
    $newpassword = $_POST['password'];
    if(empty($newpassword)){
        echo "<p> please enter your password</p>";
    }

    resetPassword($email,$newpassword);
}

function resetPassword($email,$password){
    //open file and check if the username exist inside
    $handle = fopen("../storage/users.csv","r");
    $form_data = fgetcsv($handle);
    while (($form_data = fgetcsv($handle)) !== FALSE) {
        if ($form_data[2] == $email) {
           $file_name= fopen("../storage/users.csv","a");
            $reset = array("password"=>$password); 
            $form_data[3]= $reset;
          fputcsv($file_name,$form_data);
            fclose($file_name);
            $successful = true;
            break;
        }else{
            echo "<p>User doesnt exist</p>";
        }
    }
    fclose($handle);
if(!$successful){
    echo "<p>reset failed</p>";
}else{
    echo"<p>reset successful</P>";
}
}


///////
//    //open file 
//    $file_name = fopen("../storage/users.csv","a");
//    $no_rows = count(file("../storage/users.csv"));
//    // append serial number to the userdata.csv file
//    if($no_rows > 1){
//        $no_rows = ($no_rows-1) + 1 ;
//    }
//    $form_data = array(
//        "serial_no" => $no_rows,
//        "name" => $username,
//        "email"=> $email,
//        "password"=> $password,
//    );
//    fputcsv($file_name,$form_data);
//    fclose($file_name);
//    $name="";
//    $email="";
//    $password="";

//    //////
//    $handle = fopen("../storage/users.csv","r");
//    $form_data = fgetcsv($handle);
//    while (($form_data = fgetcsv($handle)) !== FALSE) {
//        if ($form_data[2] == $email && $form_data[3] == $password) {
//            $successful = true;
//            break;
//        }
//    }
   
