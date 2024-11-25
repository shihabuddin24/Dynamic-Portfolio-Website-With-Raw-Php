<?php
include "../master/header.php";

$protfolios_query= "SELECT * FROM protfolios";
$protfolios= mysqli_query($db_connect,$protfolios_query);
$protfolio= mysqli_fetch_assoc($protfolios);


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Protfolios Page</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['protfolio complete'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['protfolio complete']?></span>
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['protfolio complete']);?>


<?php if(isset($_SESSION['protfolio delete complete'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['protfolio delete complete']?></span>
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['protfolio delete complete']);?>


<?php if(isset($_SESSION['protfolio status'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['protfolio status']?></span>
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['protfolio status']);?>


<?php if(isset($_SESSION['protfolio edit complete'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['protfolio edit complete']?></span>
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['protfolio edit complete']);?>


<div class="row">
    <div class="col12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>The list of Protfolios...</h5>
                <a href="create.php" name="nameaddbtn" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            
            <div class="card-body">
            <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Subtitle</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php if(empty($protfolio)): ?> 
                                    <tr>
                                        <td colspan="7" class="text-danger text-center">No Data Found</td>
                                    </tr>
                                <?php else : ?> 
                            <?php
                                $num=1;
                                 foreach($protfolios as $protfolio): ?>                                                   
                                <tr>
                                    <th scope="row">
                                    <?= $num++?>
                                    </th>
                                    <td>
                                    <img src="../../public/uploads/protfolio/<?=$protfolio['image']?>" alt="" style="width: 70px; height: 60px; object-fit:cover;">
                                    </td>
                                    <td>
                                    <?=$protfolio['title']?>
                                    </td>
                                    <td>
                                    <?=$protfolio['subtitle']?>
                                    </td>
                                    <td>
                                    <?=$protfolio['description']?>
                                    </td>
                                    <td>
                                        <a href="store.php?statusid=<?= $protfolio['id'] ?>" class="<?=($protfolio['status']== 'active') ? 'badge bg-success' : 'badge bg-danger' ?>" >
                                        <?=$protfolio['status']?>
                                        </a>
                                    </td>
                                    <td>
                                    <div class="d-flex justify-content-around">
                                    <a href="edit.php?editid=<?= $protfolio['id']?>" class="text-edit" >
                                        <i class="fa-2x fa fa-edit"></i>
                                    </a>
                                    <a href="store.php?deleteid=<?= $protfolio['id']?>" class="text-danger" >
                                        <i class="fa-2x fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endforeach; endif;?>
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