<?php
$total = 0;
if(isset($_SESSION['user']->cart)) {
    foreach($_SESSION['user']->cart as $item) {
        $total += $item['pizza']->getPricep() * $item['quantity'];
    }
}
?>
<?php if(isset($_SESSION['user']->cart)) : ?>
<table id="admin-book-table" class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th></th>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Price * Quantity</th>
        <th>Remove from cart</th>
    </tr>
        <?php foreach($_SESSION['user']->cart as $item): ?>
        <tr>
            <th class="col-sm-2"><img class="img-thumbnail" src="<?= $item['pizza']->getImagep(); ?>"></th>
            <th class="col-sm-2"><?= $item['pizza']->getTitlep(); ?></th>
            <th class="col-sm-2"><?= $item['pizza']->getPricep(); ?></th>
            <th class="col-sm-2"><?= $item['quantity']; ?></th>
            <th class="col-sm-2"><?= $item['pizza']->getPricep() * $item['quantity']; ?>
            <th class="col-sm-2"><a href="/remove-from-cart/<?= $item['pizza']->getIdp(); ?>" class="btn btn-primary glyphicon glyphicon-trash"> Remove</a>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th></th><th></th><th></th><th></th><th></th>
            <th class="total-price col-sm-2">Total: <?= $total; ?></th>
        </tr>
    </tbody>
</table>
<a href="/history" class="total-price btn btn-primary">Finalizeaza comanda</a>
<?php else:  ?>
<div>Cosul dumneavoastra este gol</div>
<?php endif; ?>
