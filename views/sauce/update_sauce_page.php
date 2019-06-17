<h1>Modifica <?php echo $sauce->getNames() ?> </h1>
<form method="post" class="col-sm-2" id="show-edit-form">
    <div class="form-group">
        <label for="describes">Descriere</label>
        <input value="<?php echo $sauce->getDescribes() ?>" type="text" class="form-control" id="describes" name="describes"/>
        <label for="prices">Pret</label>
        <input  value="<?php echo $sauce->getPrices() ?>" type="text" class="form-control" id="prices" name="prices"/>
        <label for="images">Imagine</label>
        <input value="<?php echo $sauce->getImages() ?>" type="text" class="form-control" id="images" name="images"/>
    </div>
    <button id="edit-submit" type="submit" class="btn btn-info btn-lg">Modifica</button>
    <a href="/adminPage" class="btn btn-info btn-lg">Anuleaza</a>
</form>
