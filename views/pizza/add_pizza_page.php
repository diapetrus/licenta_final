<h1>Adauga o pizza noua</h1>
<form method="post" class="col-sm-2" id="show-edit-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titlep">Denumire</label>
        <input type="text" class="form-control" id="titlep" name="titlep"/>
    </div>
    <div class="form-group">
        <label for="describep">Descriere</label>
        <input type="text" class="form-control" id="describep" name="describep"/>
    </div>
    <div class="form-group">
        <label for="pricep">Pret</label>
        <input type="text" class="form-control" id="pricep" name="pricep"/>
    </div>
    <div class="form-group">
        <label for="type">Tip</label>
        <select class="form-control" id="type" name="type">
            <option value="cu carne">Cu Carne</option>
            <option value="fara carne">Fara Carne</option>
            <option value="cu peste">Cu Peste</option>
        </select>
    </div>
    <div class="form-group">
        <label for="size">Dimensiune</label>
        <select class="form-control" id="size" name="size">
            <option value="mica">Mica</option>
            <option value="medie">Medie</option>
            <option value="mare">Mare</option>
        </select>
    </div>
    <div class="form-group">
        <label for="imagep">Imagine</label>
        <input type="file" name="imagep"><br/>
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
