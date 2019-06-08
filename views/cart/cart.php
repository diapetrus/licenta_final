<?php
$total = 0;
if(isset($_SESSION['user']->cart)) {
    foreach($_SESSION['user']->cart as $item) {
        $total += $item['pizza']->getPricep() * $item['quantity'];
    }
}
?>
<?php if(isset($_SESSION['user']->cart)) : ?>
<table id="admin-table" class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th></th>
        <th>Produs</th>
        <th>Pret unitar</th>
        <th>Cantitate</th>
        <th>Pret total</th>
        <th>Elimina din cos</th>
    </tr>
        <?php foreach($_SESSION['user']->cart as $item): ?>
        <tr>
            <th class="col-sm-2"><img class="img-thumbnail" src="<?= $item['pizza']->getImagep(); ?>"></th>
            <th class="col-sm-2"><h3><?= $item['pizza']->getTitlep(); ?></h3><br><?= $item['pizza']->getDescribep(); ?></th>
            <th class="col-sm-2"><?= $item['pizza']->getPricep(); ?></th>
            <th class="col-sm-2"><?= $item['quantity']; ?></th>
            <th class="col-sm-2"><?= $item['pizza']->getPricep() * $item['quantity']; ?>
            <th class="col-sm-2"><a href="/remove-from-cart/<?= $item['pizza']->getIdp(); ?>" class="btn btn-primary glyphicon glyphicon-trash"> Sterge</a>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th></th><th></th><th></th><th></th><th></th>
            <th class="total-price col-sm-2">Total cos: <?= $total; ?></th>
        </tr>
    </tbody>
</table>
<a href="/history" class="total-price btn btn-primary">Finalizeaza comanda</a>
<?php else:  ?>
<div>Cosul dumneavoastra este gol</div>
<?php endif; ?>
