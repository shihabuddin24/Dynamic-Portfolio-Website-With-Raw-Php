<?php
include "../master/header.php";
// include "../../public/fonts/fonts.php";

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Insert New Protfolios...</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3>Protfolio</h3>
            </div>
            <form action="store.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <label for="exampleInputName1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            <label for="exampleInputName1" class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            <label for="exampleInputName1" class="form-label">Description</label>
            <textarea rows="5" type="text" name="description" class="form-control"></textarea>
            <picture class="d-block my-4">
                <img id="protfolioimg" src="../../public/uploads/default/demoimg.jpg" alt="" style="height:150px; object-fit:contain">
            </picture>
            <label for="exampleInputName1" class="form-label">Image</label>
            <input onchange="document.getElementById('protfolioimg').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control hudai" id="exampleInputName1" aria-describedby="nameHelp">

            
            <button type="submit" name="insert" class="btn btn-primary mt-2"><i class="material-icons">add</i>Insert</button>

            </div>
            </form>
        </div>
    </div>
</div>


<?php
include "../master/footer.php";


?>