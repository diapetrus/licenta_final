<div class="col-sm-3">
        <div class="pizza-box text-center">
            <a href="/pizza/<?php echo $pizza->getIdp() ?>">
            <div class="image-wrapper">
                <img class="img-thumbnail" src="<?php echo $pizza->getImagep() ?>">
            </div>
            <div class="pizza-title"><strong><?php echo $pizza->getTitlep() ?></strong></div>
            </a>
            <div>
                <?php echo $pizza->getDescribep() ?>
            </div>
            <div>
                Marime: <?php echo $pizza->getSize() ?>
            </div>
            <div>
                <?php echo $pizza->getPricep() ?> Lei
            </div>
            <form method="post" action="/add-cart">
                <div>
                    <label for="quantity"></label>
                    <input type="hidden" class="col-sm-1 form-control" id="quantity" name="quantity" value="1"/>
                    <input type="hidden" name="pizza" value="<?php echo $pizza->getIdp() ?>">
                </div>
                <div>
                    <input type="submit" value="Comanda"  class="btn btn-primary" />
                </div>
            </form>
        </div>
</div>