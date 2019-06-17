<div class="col-sm-3">
        <div class="pizza-box text-center">
            <a href="/sauce/<?php echo $sauce->getIds() ?>">
            <div class="image-wrapper">
                <img class="img-thumbnail" src="<?php echo $sauce->getImages() ?>">
            </div>
            <div class="pizza-title"><strong><?php echo $sauce->getNames() ?></strong></div>
            </a>
            <div>
                <?php echo $sauce->getDescribes() ?>
            </div>
            <div>
                Pret: <?php echo $sauce->getPrices() ?> Lei
            </div>
            <form method="post" action="/add-cart">
                <div>
                    <label for="quantity"></label>
                    <input type="hidden" class="col-sm-1 form-control" id="quantity" name="quantity" value="1"/>
                    <input type="hidden" name="sauce" value="<?php echo $sauce->getIds() ?>">
                </div>
                <div>
                    <input type="submit" value="Adauga in cos"  class="btn btn-primary" />
                </div>
            </form>
        </div>
</div>