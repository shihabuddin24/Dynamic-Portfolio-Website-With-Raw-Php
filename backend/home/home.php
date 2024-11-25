<?php

include "../master/header.php";
$users_query= "SELECT * FROM users";
$users= mysqli_query($db_connect,$users_query);



$num = 1 ;
$authorid= $_SESSION['author_id'];

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['temp_name'])) : ?>

<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Welcome Mr. <?= $_SESSION['temp_name']?></span>
        <span class="alert-text">Your Email Is- <?= $_SESSION['author_email']?></span>
    </div>
</div>
</div>

</div>
<?php endif; unset($_SESSION['temp_name']);?>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Users Information
            </div>
            
            <div class="card-body" style= "overflow-y: scroll ; height: 27rem" >
            <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>                                                      
                                <?php foreach($users as $user):
                                if($user["id"] == $_SESSION['author_id']){
                                    continue;
                                }
                                
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?= $num++?>
                                    </th>
                                    <td>
                                        <?= $user["name"]?>
                                    </td>
                                    <td>
                                    <?= $user["email"]?>
                                    </td>
                                    <td>
                                    <!-- <?= $user["ac"]?> -->edit or delete
                                    </td>
                                </tr>
                                <?php endforeach;?>
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
