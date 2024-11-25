<?php
include "../master/header.php";
include "../../public/fonts/fonts.php";

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Insert New Service...</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3>Service</h3>
            </div>
            <form action="store.php" method="POST">
            <div class="card-body">
            <label for="exampleInputName1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            <label for="exampleInputName1" class="form-label">Description</label>
            <textarea rows="5" type="text" name="description" class="form-control"></textarea>
            <label for="exampleInputName1" class="form-label">Icon</label>
            <input type="text" readonly name="icon" class="form-control hudai" id="exampleInputName1" aria-describedby="nameHelp">

            <div class="card">
                <div class="card-header">
                    <h5>Select Icons...</h5>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 300px; ">
                    <?php foreach($fonts as $font): ?>
                    <span class="m-2 fa-2x">
                        <i class="<?= $font?>" onclick="myFun(event)"></i>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <button type="submit" name="insert" class="btn btn-primary mt-2"><i class="material-icons">add</i>Insert</button>

            </div>
            </form>
        </div>
    </div>
</div>

<script>
    let input= document.querySelector('.hudai');
    function myFun(e){
        input.value= e.target.classList.value;
        // console.log(e.target.classList.value);
    }
</script>




<?php
include "../master/footer.php";


?>