<h1>Adauga sos nou</h1>
<form method="post" class="col-sm-2" id="show-edit-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="names">Denumire</label>
        <input type="text" class="form-control" id="names" name="names"/>
    </div>
    <div class="form-group">
        <label for="describes">Descriere</label>
        <input type="text" class="form-control" id="describes" name="describes"/>
    </div>
    <div class="form-group">
        <label for="prices">Pret</label>
        <input type="text" class="form-control" id="prices" name="prices"/>
    </div>
    <div class="form-group">
        <label for="images">Imagine</label>
        <input type="text" name="images"><br/>
    </div>
    <button id="edit-submit" type="submit" class="btn btn-info btn-lg">Adauga</button>
    <a href="/adminPage" class="btn btn-info btn-lg">Anuleaza</a>
</form>

<?php
if (isset($_POST['??????'])) {
    $target_dir = "/images/";
    $target_file = $target_dir . basename($_FILES["imagep"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["imagep"]["tmp_name"], $target_file);
}
?>
