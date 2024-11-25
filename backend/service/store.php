<?php
session_start();

include "../../config/database.php";

if(isset($_POST['insert'])){
    $title= $_POST['title'];
    $description= $_POST['description'];
    $icon= $_POST['icon'];

    if($title && $description && $icon){
        $query= "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon') ";
        mysqli_query($db_connect,$query);
        $_SESSION['service complete']="New Service Added Successfully!!";
        header("location: services.php");

    }else{
        header("location: services.php");
    }
}



if(isset($_GET['id'])){
    $id= $_GET['id'];
    $delete_query= "DELETE FROM services WHERE id= '$id'";
    mysqli_query($db_connect,$delete_query);
        $_SESSION['service delete complete']="Service Deleted Successfully!!";
        header("location: services.php");
}



if(isset($_GET['statusid'])){
    $id= $_GET['statusid'];
    $select_query= "SELECT * FROM services WHERE id='$id'";
    $connect= mysqli_query($db_connect,$select_query);
    $service= mysqli_fetch_assoc($connect);

    if($service['status'] == 'deactive'){
        $update_query= "UPDATE services SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['service status']="Service status active successfully!!";
        header("location: services.php");

    }else{
        $update_query= "UPDATE services SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['service status']="Service status deactive successfully!!";
        header("location: services.php");
    }

}


if(isset($_POST['edit'])){
    
    if(isset($_GET['editid'])){
        $id= $_GET['editid'];
        $title= $_POST['title'];
        $description= $_POST['description'];
        $icon= $_POST['icon'];

    if($title && $description && $icon){
        $query= "UPDATE services SET title='$title', description='$description', icon='$icon' WHERE id='$id' ";
        mysqli_query($db_connect,$query);
        $_SESSION['service edit complete']="Service Edited Successfully!!";
        header("location: services.php");

    }else{
        header("location: services.php");
    }
}

}




?>