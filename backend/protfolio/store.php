<?php
session_start();

include "../../config/database.php";

if(isset($_POST['insert'])){
    $title= $_POST['title'];
    $subtitle= $_POST['subtitle'];
    $description= $_POST['description'];
    $image= $_FILES['image']['name'];

    if($title && $subtitle && $description && $image){
        $tmp= $_FILES['image']['tmp_name'];
        $id= $_SESSION['author_id'];
        $authname= $_SESSION['author_name'];
        $explode= explode('.',$image);
        $extension= end($explode);
        $new_name= $id . '-' . $title . '-' . date('d-m-Y-h-i-s') . '-' . rand(0,999999) . '.' . $extension;
    
        $localpath= "../../public/uploads/protfolio/" . $new_name;
    
        if(move_uploaded_file($tmp,$localpath)){
            $query= "INSERT INTO protfolios (title,subtitle,description,image) VALUES ('$title','$subtitle','$description','$new_name') ";
            mysqli_query($db_connect,$query);
            $_SESSION['protfolio complete']="New protfolio insert Successfully!!";
            header("location: protfolios.php");        

    }else{
        header("location: protfolios.php");
    }
}

};




if(isset($_GET['deleteid'])){
    $id= $_GET['deleteid'];

    $protfolio_query= "SELECT * FROM protfolios WHERE id= '$id'";
    $connect= mysqli_query($db_connect,$protfolio_query);
    $protfolio= mysqli_fetch_assoc($connect);

    if($protfolio['image']){
        $oldname= $protfolio['image'];
        $existpath= "../../public/uploads/protfolio/" . $oldname;

        if(file_exists($existpath)){
            unlink($existpath);
            $delete_query= "DELETE FROM protfolios WHERE id= '$id'";
            mysqli_query($db_connect,$delete_query);
            $_SESSION['protfolio delete complete']="Protfolio Deleted Successfully!!";
            header("location: protfolios.php");
        }

    
    }

};




if(isset($_GET['statusid'])){
    $id= $_GET['statusid'];
    $select_query= "SELECT * FROM protfolios WHERE id='$id'";
    $connect= mysqli_query($db_connect,$select_query);
    $protfolio= mysqli_fetch_assoc($connect);

    if($protfolio['status'] == 'deactive'){
        $update_query= "UPDATE protfolios SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['protfolio status']="Protfolio status active successfully!!";
        header("location: protfolios.php");

    }else{
        $update_query= "UPDATE protfolios SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['protfolio status']="Protfolio status deactive successfully!!";
        header("location: protfolios.php");
    }

};





    
if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $new_name = $id . "-" . $title . '-' . date("d-m-Y-h-i-s") . '-' . rand(0,999999) . "." . $extension;
    $localpath = "../../public/uploads/protfolio/" . $new_name;

    if ($image) {
        $select_query_for_delete_img = "SELECT * FROM protfolios WHERE id='$id'";
        $connect_select = mysqli_query($db_connect, $select_query_for_delete_img);
        $port = mysqli_fetch_assoc($connect_select);
        $oldimage = $port['image'];

        if ($oldimage) {
            $existpath =  "../../public/uploads/protfolio/" . $oldimage;
            if (file_exists($existpath)){
                unlink($existpath);
            }
        }
        if (move_uploaded_file($tmp, $localpath)) {
            $query = "UPDATE protfolios SET title='$title',subtitle='$subtitle',description='$description',image='$new_name' WHERE id='$id'";
            mysqli_query($db_connect, $query);
            $_SESSION['protfolio edit complete'] = "Protfolio Edited Successfully!!";
            header("location: protfolios.php");
        }
    } else {
        $query = "UPDATE protfolios SET title='$title',subtitle='$subtitle',description='$description' WHERE id='$id'";
        mysqli_query($db_connect, $query);
        $_SESSION['protfolio edit complete'] = "Protfolio Edited Successfully!!";
        header("location: protfolios.php");
    }
}


?>