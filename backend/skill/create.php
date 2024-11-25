<?php
include "../master/header.php";
include "../../public/fonts/fonts.php";

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Insert New Education or Skills...</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3>Skill</h3>
            </div>
            <form action="store.php" method="POST">
            <div class="card-body">
            <label for="exampleInputName1" class="form-label">Education-Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            <label for="exampleInputName1" class="form-label">Education-Year</label>
            <input type="number" name="year" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            <label for="exampleInputName1" class="form-label">Education-Ratio</label>
            <select class="form-select" name="ratio">
                <?php for($i=1; $i <= 100; $i++) : ?>
            <option value="<?=$i?>"><?=$i?>%</option>
            <?php endfor; ?>
            </select>


            <!-- <input type="text" readonly name="icon" class="form-control hudai" id="exampleInputName1" aria-describedby="nameHelp"> -->

            
            <button type="submit" name="insert" class="btn btn-primary mt-2"><i class="material-icons">add</i>Insert</button>

            </div>
            </form>
        </div>
    </div>
</div>

<?php
include "../master/footer.php";


?>