<?php
$total = 0;
if(isset($_SESSION['user']->cart)) {
    foreach($_SESSION['user']->cart as $item) {
        if (isset($item['pizza']))
            $total += $item['pizza']->getPricep() * $item['quantity'];
        else{
            if(isset($item['sauce'])){
                $total += $item['sauce']->getPrices() * $item['quantity'];
            }
        }
    }
}
if ($total<50)
    $transport=10;
else
    $transport=0;
?>
<?php if(isset($_SESSION['user']->cart)) : ?>
    <p class="adv"> * Transportul este GRATUIT la orice comandă de peste 50 de lei!</p>
<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th></th>
        <th>Produs</th>
        <th>Preț unitar</th>
        <th>Cantitate</th>
        <th>Preț total</th>
        <th>Elimina din coș</th>
    </tr>
        <?php foreach($_SESSION['user']->cart as $item):
            if (isset($item['pizza'])):?>
        <tr>
            <th class="col-sm-2"><img class="img-thumbnail" src="<?= $item['pizza']->getImagep(); ?>"></th>
            <th class="col-sm-2"><h3><?= $item['pizza']->getTitlep(); ?></h3><br><?= $item['pizza']->getDescribep(); ?></th>
            <th class="col-sm-2"><?= $item['pizza']->getPricep(); ?> lei</th>
            <th class="col-sm-2"><?= $item['quantity']; ?></th>
            <th class="col-sm-2"><?= $item['pizza']->getPricep() * $item['quantity']; ?> lei</th>
            <th class="col-sm-2"><a href="/remove-from-cart/<?= $item['pizza']->getIdp(); ?>" class="btn btn-primary glyphicon glyphicon-trash"> Șterge</a></th>
        </tr>
            <?php else: ?>
            <tr>
            <th class="col-sm-2"><img class="img-thumbnail" src="<?= $item['sauce']->getImages(); ?>"></th>
            <th class="col-sm-2"><h3><?= $item['sauce']->getNames(); ?></h3><br><?= $item['sauce']->getDescribes(); ?></th>
            <th class="col-sm-2"><?= $item['sauce']->getPrices(); ?> lei</th>
            <th class="col-sm-2"><?= $item['quantity']; ?></th>
            <th class="col-sm-2"><?= $item['sauce']->getPrices() * $item['quantity']; ?> lei</th>
            <th class="col-sm-2"><a href="/remove-from-cart/<?= $item['sauce']->getIds(); ?>" class="btn btn-primary glyphicon glyphicon-trash"> Șterge</a></th>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        <tr>
            <th></th><th></th><th></th><th></th>
            <th class="total-price col-sm-2">Transport: </th>
            <th class="total-price col-sm-2"><?= $transport ?> lei</th>
        </tr>
        <tr>
            <th></th><th></th><th></th><th></th>
            <th class="total-price col-sm-2">Total coș: </th>
            <th class="total-price col-sm-2"><?= $total + $transport; ?> lei</th>
        </tr>

    </tbody>
</table>
<a href="/history" class="total-price dist btn btn-primary">Finalizează comanda</a>
<?php else:  ?>
<div>Coșul dumneavoastră este gol</div>
<?php endif; ?>
