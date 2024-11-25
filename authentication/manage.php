<?php

include "../config/database.php";

session_start();

if(isset($_POST["signupbtn"])){

$name= $_POST["name"];
$email= $_POST["email"];
$password= $_POST["password"];
$c_password= $_POST["c_password"];

$name_regex = '/^(?! $)[a-zA-Z ]*$/';
$email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$password_regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

$flag= false;



if(!$name){
    $flag= true;
    $_SESSION["name error"] = "write a valid name";
    header("location: signup.php");
}else if(!preg_match($name_regex,$name)){
    $flag= true;
    $_SESSION["name error"] = "number does't support";
    header("location: signup.php");
}else{
    $_SESSION["old_name"]= $name;
    header("location: singup.php");
}


if(!$email){
    $flag= true;
    $_SESSION["email error"] = "write a valid email";
    header("location: signup.php");
}else if(!preg_match($email_regex,$email)){
    $flag= true;
    $_SESSION["email error"] = "write a valid email";
    header("location: signup.php");
}else{
    $_SESSION["old_email"]= $email;
    header("location: singup.php");
}


if(!$password){
    $flag= true;
    $_SESSION["password error"] = "write a valid password";
    header("location: signup.php");
}else if(!preg_match($password_regex,$password)){
    $flag= true;
    $_SESSION["password error"] = "password should be at least 8 charecter & minumum one special charecter & minumum one number";
    header("location: signup.php");
}else{
    $_SESSION["old_password"]= $password;
    header("location: singup.php");
}


if(!$c_password){
    $flag= true;
    $_SESSION["c_password error"] = "write a valid password";
    header("location: signup.php");
}else if($c_password != $password){
        $flag= true;
        $_SESSION["c_password error"] = "please write same password again";
        header("location: signup.php");
    }else{
        $_SESSION["old_c_password"]= $c_password;
        header("location: singup.php");
    }


    if($flag){
        header("location: signup.php");
    
    }else{
        // $db_connect= mysqli_connect("localhost","root","","shihab_uddin");
        $encrypt_pass= sha1($password);
        $query= "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encrypt_pass')";
        mysqli_query($db_connect,$query);
        // alert dekhanor jonno
        $_SESSION["register_complete"]= "Congratulations!! Registration Completed";
        $_SESSION["register_name"]= "$name";
        // signin page e zeno email fill-up thake
        $_SESSION["register_email"]= "$email";

        header("location: signin.php");

    }
}

// end signup & signin page

// signin page start

if(isset($_POST["signinbtn"])){
    $email= $_POST["email"];
    $password= $_POST["password"];
    $email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $password_regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    $flag= false;

    if(!$email){
        $flag= true;
        $_SESSION["email error"] = "write a valid email";
        header("location: signin.php");
    }else if(!preg_match($email_regex,$email)){
        $flag= true;
        $_SESSION["email error"] = "write a valid email";
        header("location: signin.php");
    // }else{
    //     $_SESSION["old_email"]= $email;
    //     header("location: singin.php");
    }
    
    
    if(!$password){
        $flag= true;
        $_SESSION["password error"] = "write a valid password";
        header("location: signin.php");
    }else if(!preg_match($password_regex,$password)){
        $flag= true;
        $_SESSION["password error"] = "password should be at least 8 charecter & minumum one special charecter & minumum one number";
        header("location: signin.php");
    // }else{
    //     $_SESSION["old_password"]= $password;
    //     header("location: singin.php");
    }

    if(!$flag){
        $encrypt_pass= sha1($password);
        $query= "SELECT COUNT(*) AS 'valid' FROM users WHERE email= '$email' AND password= '$encrypt_pass'";
        $connect= mysqli_query($db_connect,$query);
        $result= mysqli_fetch_assoc($connect);

        if($result['valid'] == 1){
            $query= "SELECT * FROM users WHERE email= '$email' AND password= '$encrypt_pass'";
            $connect= mysqli_query($db_connect,$query);
            $author= mysqli_fetch_assoc($connect);

            $_SESSION['author_id']= $author['id'];
            $_SESSION['author_name']= $author['name'];
            $_SESSION['temp_name']= $author['name'];
            $_SESSION['author_email']= $author['email'];
            $_SESSION['author_img']= $author['image'];
            
            header("location: ../backend/home/home.php");

        }else{
            $_SESSION["sign-in failed"] = "candidate does't match!!";
        header("location: signin.php");
        }
    }




}

?>