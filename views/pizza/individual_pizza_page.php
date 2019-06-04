<div class="container">
    <div class="row">
        <div class="image-wrapper col-sm-6">
            <img class="image-individual" src="<?php echo $pizza->getImagep() ?>">
        </div>
        <div class="col-sm-6">
            <div class="col-sm-offset-6 col-sm-6">
                <h1><strong><?php echo $pizza->getTitlep(); ?></strong></h1>
            </div>
            <div class="col-sm-offset-6 col-sm-6">
                <?php echo $pizza->getDescribep(); ?>
            </div>
            <div class="col-sm-offset-6 col-sm-6">
                <strong><?php echo $pizza->getPricep(); ?> Lei</strong>
            </div>
            <form method="post" action="/add-cart">
                <div class="col-sm-offset-6 col-sm-2">
                    <label for="quantity">Cantitate</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1"/>
                    <input type="hidden" name="pizza" value="<?php echo $pizza->getIdp() ?>">
                </div>
                <div class="col-sm-offset-6 col-sm-6">
                    <input type="submit" value="Comanda"  class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>