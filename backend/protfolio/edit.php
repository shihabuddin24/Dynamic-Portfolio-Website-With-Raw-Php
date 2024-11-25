<?php
include "../master/header.php";

if(isset($_GET['editid'])){
    $id= $_GET['editid'];
    $edit_query= "SELECT * FROM protfolios WHERE id='$id'";
    $connect= mysqli_query($db_connect,$edit_query);
    $edit_protfolio= mysqli_fetch_assoc($connect);
}

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit <?= $edit_protfolio['title']?> Protfolio...</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3>Protfolio</h3>
            </div>
            <form action="store.php?editid=<?= $edit_protfolio['id']?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <label for="exampleInputName1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="<?= $edit_protfolio['title']?>" >
            <label for="exampleInputName1" class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="<?= $edit_protfolio['subtitle']?>" >
            <label for="exampleInputName1" class="form-label">Description</label>
            <textarea rows="5" type="text" name="description" class="form-control"> <?= $edit_protfolio['description']?> </textarea>

            <picture class="d-block my-4">
                <img id="protfolioimg" src="../../public/uploads/protfolio/<?= $edit_protfolio['image']?>" alt="" style="height:150px; object-fit:contain">
            </picture>
            <label for="exampleInputName1" class="form-label">Image</label>
            <input onchange="document.getElementById('protfolioimg').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="<?= $edit_protfolio['image']?>">

            
            <button type="submit" name="edit" class="btn btn-primary mt-2"><i class="material-icons">edit</i>UPdate</button>

            </div>
            </form>
        </div>
    </div>
</div>


<?php
include "../master/footer.php";


?>