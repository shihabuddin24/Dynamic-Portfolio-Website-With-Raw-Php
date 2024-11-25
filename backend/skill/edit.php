<?php
include "../master/header.php";

if(isset($_GET['editid'])){
    $id= $_GET['editid'];
    $edit_query= "SELECT * FROM skills WHERE id='$id'";
    $connect= mysqli_query($db_connect,$edit_query);
    $edit_skill= mysqli_fetch_assoc($connect);
}

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit <?=$edit_skill['title']?> Education or Skills...</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3>Skill</h3>
            </div>
            <form action="store.php?editid=<?= $edit_skill['id']?>" method="POST">
            <div class="card-body">
            <label for="exampleInputName1" class="form-label">Education-Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="<?= $edit_skill['title']?>">
            <label for="exampleInputName1" class="form-label">Education-Year</label>
            <input type="number" name="year" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="<?= $edit_skill['year']?>">
            <label for="exampleInputName1" class="form-label">Education-Ratio</label>
            <select class="form-select" name="ratio" value="<?=$edit_skill['ratio']?>">
                <?php for($i=1; $i <= 100; $i++) : ?>
            <option <?= ($edit_skill['ratio'] == "$i %") ? 'selected' : '' ?>><?= $i ?>%</option>
            <?php endfor; ?>
            </select>


            <!-- <input type="text" readonly name="icon" class="form-control hudai" id="exampleInputName1" aria-describedby="nameHelp"> -->

            
            <button type="submit" name="edit" class="btn btn-primary mt-2"><i class="material-icons">edit</i>Update</button>

            </div>
            </form>
        </div>
    </div>
</div>

<?php
include "../master/footer.php";


?>