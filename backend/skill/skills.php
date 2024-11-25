<?php
include "../master/header.php";

$skill_query= "SELECT * FROM skills";
$skills= mysqli_query($db_connect,$skill_query);
$skill= mysqli_fetch_assoc($skills);


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Education & Skills Page</h1>
        </div>
    </div>
</div>



<?php if(isset($_SESSION['skills_success'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['skills_success']?></span>
        <!-- <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span> -->
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['skills_success']);?>



<?php if(isset($_SESSION['skill delete complete'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['skill delete complete']?></span>
        <!-- <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span> -->
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['skill delete complete']);?>



<?php if(isset($_SESSION['skill status'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['skill status']?></span>
        <!-- <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span> -->
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['skill status']);?>



<?php if(isset($_SESSION['skill edit complete'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['skill edit complete']?></span>
        <!-- <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span> -->
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['skill edit complete']);?>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>The list of skills...</h5>
                <a href="create.php" name="nameaddbtn" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            
            <div class="card-body">
            <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Education-Title</th>
                                    <th scope="col">Education-Year</th>
                                    <th scope="col">Education-Ratio</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(empty($skill)): ?> 
                                    <tr>
                                        <td colspan="6" class="text-danger text-center">No Data Found</td>
                                    </tr>
                                <?php else : ?> 
                                <?php
                                $num=1;
                                 foreach($skills as $skill): ?>   
                                                                                     
                                <tr>
                                    <th scope="row">
                                        <?= $num++?>
                                    </th>
                                    <td>
                                    <?= $skill['title'] ?>
                                    </td>
                                    <td>
                                    <?= $skill['year'] ?>
                                    </td>
                                    <td>
                                    <?= $skill['ratio'] ?>
                                    </td>
                                    <td>
                                        <a href="store.php?statusid=<?= $skill['id'] ?>" class="<?=($skill['status']== 'active') ? 'badge bg-success' : 'badge bg-danger' ?>" >
                                        <?= $skill['status']?>
                                        </a>
                                    </td>
                                    <td>
                                    <div class="d-flex justify-content-around">
                                    <a href="edit.php?editid=<?= $skill['id']?>" class="text-edit" >
                                        <i class="fa-2x fa fa-edit"></i>
                                    </a>
                                    <a href="store.php?id=<?= $skill['id']?>" class="text-danger" >
                                        <i class="fa-2x fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    </td>
                                </tr>
                               <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>





<?php
include "../master/footer.php";


?>