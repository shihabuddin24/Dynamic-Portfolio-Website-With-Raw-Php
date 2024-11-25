<?php
include "../master/header.php";

$service_query= "SELECT * FROM services";
$services= mysqli_query($db_connect,$service_query);
$service= mysqli_fetch_assoc($services);


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Services Page</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['service complete'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['service complete']?></span>
        <!-- <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span> -->
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['service complete']);?>


<?php if(isset($_SESSION['service delete complete'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['service delete complete']?></span>
        <!-- <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span> -->
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['service delete complete']);?>


<?php if(isset($_SESSION['service status'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"><?= $_SESSION['service status']?></span>
        <!-- <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span> -->
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['service status']);?>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>The list of services...</h5>
                <a href="create.php" name="nameaddbtn" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            
            <div class="card-body">
            <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(empty($service)): ?> 
                                    <tr>
                                        <td colspan="7" class="text-danger text-center">No Data Found</td>
                                    </tr>
                                <?php else : ?> 
                                <?php
                                $num=1;
                                 foreach($services as $service): ?>   
                                                                                     
                                <tr>
                                    <th scope="row">
                                        <?= $num++?>
                                    </th>
                                    <td>
                                    <i class="fa-2x <?= $service['icon']?>"></i>
                                    </td>
                                    <td>
                                    <?= $service['title']?>
                                    </td>
                                    <td>
                                    <?= $service['description']?>
                                    </td>
                                    <td>
                                        <a href="store.php?statusid=<?= $service['id'] ?>" class="<?=($service['status']== 'active') ? 'badge bg-success' : 'badge bg-danger' ?>" >
                                        <?= $service['status']?>
                                        </a>
                                    </td>
                                    <td>
                                    <div class="d-flex justify-content-around">
                                    <a href="edit.php?editid=<?= $service['id']?>" class="text-edit" >
                                        <i class="fa-2x fa fa-edit"></i>
                                    </a>
                                    <a href="store.php?id=<?= $service['id']?>" class="text-danger" >
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