<?php

include "../master/header.php";



?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>
    </div>
</div>

<!-- name update -->

<div class="row">
    <div class="col-12">

    <?php if(isset($_SESSION['name update'])) : ?>
            <div id="nameHelp" class= "form-text text-success">
                <?= $_SESSION['name update']?>

            </div>
            <?php endif ; unset($_SESSION['name update']) ; ?>

        <div class="card">
            <div class="card-header">
                <h3>Username Update</h3>
            </div>
            <form action="update.php" method="POST">
            <div class="card-body">
            <label for="exampleInputName1" class="form-label">User-Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            
            <?php if(isset($_SESSION['name error'])) : ?>
            <div id="nameHelp" class= "form-text text-danger">
                <?= $_SESSION['name error']?>

            </div>
            <?php endif ; unset($_SESSION['name error']) ; ?>
            <button type="submit" name="nameaddbtn" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- email update -->


<div class="row">
    <div class="col-12">

    <?php if(isset($_SESSION['email update'])) : ?>
            <div id="emailHelp" class= "form-text text-success">
                <?= $_SESSION['email update']?>

            </div>
            <?php endif ; unset($_SESSION['email update']) ; ?>

        <div class="card">
            <div class="card-header">
                <h3>Email Update</h3>
            </div>
            <form action="update.php" method="POST">
            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">Email-Address</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="EmailHelp">
            
            <?php if(isset($_SESSION['email error'])) : ?>
            <div id="nameHelp" class= "form-text text-danger">
                <?= $_SESSION['email error']?>

            </div>
            <?php endif ; unset($_SESSION['email error']) ; ?>
            <button type="submit" name="emailaddbtn" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button>

            </div>
            </form>
        </div>
    </div>
</div>


<!-- password update -->



<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>password update</h3>
            </div>
            <form action="update.php" method="POST">
            <div class="card-body">

            <?php if(isset($_SESSION['passError'])) :  ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $_SESSION['passError'] ?>
            </div>
            <?php endif; unset($_SESSION['passError']); ?>


            <?php if(isset($_SESSION['password_update'])) :  ?>
            <div id="emailHelp" class="form-text text-success">
                <?= $_SESSION['password_update'] ?>
            </div>
            <?php endif; unset($_SESSION['password_update']); ?>

            <label for="exampleInputEmail1" class="form-label mb-2" >old password</label>
            <input type="password" name="old_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label  my-2">new password</label>
            <input type="password" name="new_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label  my-2">confirm password</label>
            <input type="password" name="con_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
            <button type="submit" name="passubtn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Add</button>   
        </div>
            </form>
        </div>
    </div>


    <!-- image update -->

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3>Image Update</h3>
            </div>
            <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <picture class="d-block my-4">
                <img id="profileimg" src="../../public/uploads/default/demoimg.jpg" alt="" style="height:150px; object-fit:contain">
            </picture>
            <label for="exampleInputName1" class="form-label">Image</label>
            <input onchange="document.getElementById('profileimg').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control hudai" id="exampleInputName1" aria-describedby="nameHelp">
            
            <button type="submit" name="imgaddbtn" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button>

            </div>
            </form>
        </div>
    </div>
</div>





<?php

include "../master/footer.php";



?>