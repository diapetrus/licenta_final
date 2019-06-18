<h1>Modifica <?php echo $pizza->getTitlep() ?> </h1>
<form method="post" class="col-sm-2" id="show-edit-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="describep">Descriere</label>
        <input value="<?php echo $pizza->getDescribep() ?>" type="text" class="form-control" id="describep" name="describep"/>
        <label for="pricep">Pret</label>
        <input  value="<?php echo $pizza->getPricep() ?>" type="text" class="form-control" id="pricep" name="pricep"/>
        <label for="type">Tip</label>
        <select class="form-control" id="type" name="type">
            <option <?php if($pizza->getType()=="Cu Carne") echo "selected='selected'"?> value="Cu Carne">Cu Carne</option>
            <option <?php if($pizza->getType()=="Fara Carne") echo "selected='selected'"?> value="Fara Carne">Fara Carne</option>
            <option <?php if($pizza->getType()=="Cu Peste") echo "selected='selected'"?> value="Cu Peste">Cu Peste</option>
        </select>
        <label for="size">Dimensiune</label>
        <select class="form-control" id="size" name="size">
            <option <?php if($pizza->getSize()=="Mica") echo "selected='selected'"?> value="Mica">Mica</option>
            <option <?php if($pizza->getSize()=="Medie") echo "selected='selected'"?> value="Medie">Medie</option>
            <option <?php if($pizza->getSize()=="Mare") echo "selected='selected'"?> value="Mare">Mare</option>
        </select>
        <label for="imagep">Imagine</label>
        <p>Imagine curenta: <img src="<?php echo $pizza->getImagep() ?>" class="img-thumbnail"></p>
        <input type="file" name="imagep"><br/>
    </div>
    <button id="edit-submit" type="submit" class="btn btn-info btn-lg">Modifica</button>
    <a href="/adminPage" class="btn btn-info btn-lg">Anuleaza</a>
</form>
