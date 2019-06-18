<?php foreach ($data as $d): ?>
    <?php $price = 0;?>
    <?php foreach ($d['pizza'] as $pizza):
        $price += $pizza->getPricep();
    endforeach; ?>
    <div class="col-sm-3">
        <div class="pizza-box text-center">
                <div class="image-wrapper">
                    <img class="img-thumbnail" src="<?php echo $d['pizza'][0]->getImagep() ?>">
                </div>
                <div class="pizza-title" style="max-height: 100px">
                        <?php foreach ($d['pizza'] as $pizza): ?>
                            <strong><?= $pizza->getTitlep(); ?></strong><br>
                        <?php endforeach; ?>
                    <strong>+ 1 <?=$d['free']->getTitlep(); ?> GRATIS</strong>
                </div>
            <div>
                Pret: <?=$price?> Lei
            </div>
            <form method="post" action="/offer">
                <div>
                    <label for="quantity"></label>
                    <input type="hidden" class="col-sm-1 form-control" id="quantity" name="oferta_id" value="<?=$d['id']?>"/>
                </div>
                <div>
                    <input type="submit" value="Adauga in cos" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>