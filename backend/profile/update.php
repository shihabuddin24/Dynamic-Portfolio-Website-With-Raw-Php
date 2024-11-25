<?php

session_start();

include "../../config/database.php";


// name update

if(isset($_POST['nameaddbtn'])){
    $name= $_POST['name'];
    $id= $_SESSION['author_id'];

    // $name_regex = '/^(?! $)[a-zA-Z ]*$/';

    if($name){
        $update_query= "UPDATE users SET name= '$name' WHERE id='$id' ";
        mysqli_query($db_connect,$update_query);
        $_SESSION['name update']= "name update successfull";
        $_SESSION['author_name']= $name;
        header("location: profile.php");

    }else{
        $_SESSION['name error']= "please write a valid name";
        header("location: profile.php");
    }
}


// email update

if(isset($_POST['emailaddbtn'])){
    $email= $_POST['email'];
    $id= $_SESSION['author_id'];

    // $name_regex = '/^(?! $)[a-zA-Z ]*$/';

    if($email){
        $update_query= "UPDATE users SET email= '$email' WHERE id='$id' ";
        mysqli_query($db_connect,$update_query);
        $_SESSION['email update']= "email update successfull";
        $_SESSION['author_email']= $email;
        header("location: profile.php");

    }else{
        $_SESSION['email error']= "please write a valid email";
        header("location: profile.php");
    }
}


// password update



if(isset($_POST['passubtn'])){
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];

    if($old_pass && $new_pass && $con_pass){
        $id = $_SESSION['author_id'];
        $old_e = sha1($old_pass);
        $count_query = "SELECT COUNT(*) AS 'result' FROM `users` WHERE id='$id' AND password='$old_e'";
        $connect = mysqli_query($db_connect,$count_query);
        $result = mysqli_fetch_assoc($connect)['result'];

        if($result == 1){
            if($new_pass == $con_pass){
                $new_e = sha1($new_pass);
                $update_query = "UPDATE users SET password='$new_e' WHERE id='$id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['password_update'] = "password update successfull";
                header("location: profile.php");
            }else{
                $_SESSION['passError'] = "beta age mila then entry kor!";
        header("location: profile.php");
            }
        }else{
            $_SESSION['passError'] = "error paise";
        header("location: profile.php");
        }

    }else{
        $_SESSION['passError'] = "please fillup pass field!";
        header("location: profile.php");
    }

}


// image update

if(isset($_POST['imgaddbtn'])){
    $image= $_FILES['image']['name'];
    $tmp= $_FILES['image']['tmp_name'];
    $id= $_SESSION['author_id'];
    $authname= $_SESSION['author_name'];
    $explode= explode('.',$image);
    $extension= end($explode);
    $new_name= $id . '-' . $authname . '-' . date('d-m-Y-h-i-s') . '-' . rand(0,999999) . '.' . $extension;

    $localpath= "../../public/uploads/profile/" . $new_name;

    if($image){
        $select_query_for_delete_img = "SELECT * FROM users WHERE id='$id'";
            $connect_select = mysqli_query($db_connect, $select_query_for_delete_img);
            $profile = mysqli_fetch_assoc($connect_select);
            $oldimage = $profile['image'];

    if ($oldimage) {
        $existpath = "../../public/uploads/profile/" . $oldimage;
        if (file_exists($existpath)){
            unlink($existpath);
        }
    }

    if(move_uploaded_file($tmp,$localpath)){
        $update_query= "UPDATE users SET image= '$new_name' WHERE id='$id' ";
        mysqli_query($db_connect,$update_query);
        header("location: profile.php");

    }else{
        $update_query= "UPDATE users SET image= '$new_name' WHERE id='$id' ";
        mysqli_query($db_connect,$update_query);
        header("location: profile.php");
    }

    }else{
        header("location: profile.php");
    }
}

// if(isset($_POST['imgaddbtn'])){
//     $image= $_FILES['image']['name'];
//     $tmp= $_FILES['image']['tmp_name'];

//     if($image){
//     $id= $_SESSION['author_id'];
//     $authname= $_SESSION['author_name'];
//     $explode= explode('.',$image);
//     $extension= end($explode);
//     $new_name= $id . '-' . $authname . '-' . date('d-m-Y-h-i-s') . '-' . rand(0,999999) . '.' . $extension;

//     $localpath= "../../public/uploads/profile/" . $new_name;

//     if(move_uploaded_file($tmp,$localpath)){
//         $update_query= "UPDATE users SET image= '$new_name' WHERE id='$id' ";
//         mysqli_query($db_connect,$update_query);
//         header("location: profile.php");

//     }else{
//         echo "kharap";
//     }

//     }else{
//     echo "please select a pic";
//     }
// }


?>