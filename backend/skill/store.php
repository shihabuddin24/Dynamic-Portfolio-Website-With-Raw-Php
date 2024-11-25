<?php

include "../../config/database.php";

session_start();

if(isset($_POST['insert'])){

    $title = $_POST['title'];
    $year = $_POST['year'];
    $ratio = $_POST["ratio"];

    if($title && $year && $ratio){
        $query= "INSERT INTO skills (title,year,ratio) VALUES ('$title','$year','$ratio')";
        mysqli_query($db_connect,$query);
        $_SESSION['skills_success']= "New Skill Added Successfully!!";
        header('location: skills.php');

    }
};




if(isset($_GET['id'])){
    $id= $_GET['id'];
    $delete_query= "DELETE FROM skills WHERE id= '$id'";
    mysqli_query($db_connect,$delete_query);
        $_SESSION['skill delete complete']="Skill Deleted Successfully!!";
        header("location: skills.php");
};




if(isset($_GET['statusid'])){
    $id= $_GET['statusid'];
    $select_query= "SELECT * FROM skills WHERE id='$id'";
    $connect= mysqli_query($db_connect,$select_query);
    $service= mysqli_fetch_assoc($connect);

    if($service['status'] == 'deactive'){
        $update_query= "UPDATE skills SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['skill status']="Skill status active successfully!!";
        header("location: skills.php");

    }else{
        $update_query= "UPDATE skills SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['skill status']="Skill status deactive successfully!!";
        header("location: skills.php");
    }

};




if(isset($_POST['edit'])){
    
    if(isset($_GET['editid'])){
        $id= $_GET['editid'];
        $title= $_POST['title'];
        $year= $_POST['year'];
        $ratio= $_POST['ratio'];

    if($title && $year && $ratio){
        $query= "UPDATE skills SET title='$title', year='$year', ratio='$ratio' WHERE id='$id' ";
        mysqli_query($db_connect,$query);
        $_SESSION['skill edit complete']="Skill Edited Successfully!!";
        header("location: skills.php");

    }else{
        header("location: skills.php");
    }
}

};





?>