<table id="admin-table" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="col-sm-2">Utilizator</th>
        <th class="col-sm-2">Pretul total</th>
        <th class="col-sm-2">Cantitate</th>
        <th class="col-sm-2">Produse</th>
    </tr>
    </thead>
    <tbody>
        <?php if(isset($history) && count($history) > 0) :?>
            <?php foreach($history as $item) : ?>
                <tr>
                    <td><?=$item[0]['email']?></td>
                    <td><?=$item[0]['totalprice']?></td>
                    <td><?php foreach ($item as $i) : ?><p><?=$i['quantity']?></p>
                    <?php endforeach;?>
                    <td>
                        <?php foreach($item as $pizza) :?>
                        <p><?= @$pizza['names']?> <b><?= @$pizza['prices']?></b></p>
                        <p><?= @$pizza['titlep']?> <b><?= @$pizza['pricep']?></b></p>
                        <?php endforeach;?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(!isset($history) || count($history) == 0) : ?>
            Nu exista istoric.
        <?php endif;?>
    </tbody>
</table>
