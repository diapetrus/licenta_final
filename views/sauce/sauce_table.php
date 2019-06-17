<table class="table table-bordered table-striped">
    <tr>
        <td class="col-sm-3"><?php echo $sauce->getNames() ?>
        <br><img src="<?php echo $sauce->getImages() ?>" class="img-thumbnail"/></td>
        <td class="col-sm-3"><?php echo $sauce->getDescribes() ?></td>
        <td class="col-sm-3"><?php echo $sauce->getPrices() ?></td>
        <td class="col-sm-3 "><a href="/adminPage/sauce/update/<?php echo $sauce->getIds() ?>" class="btn btn-primary glyphicon glyphicon-refresh dist"> Modifică</a><br>
        <a href="/adminPage/sauce/delete/<?php echo $sauce->getIds() ?>" class="btn btn-primary glyphicon glyphicon-trash"> Șterge</a></td>
    </tr>
</table>