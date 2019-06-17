<table class="table table-bordered table-striped">
    <tr>
        <td class="col-sm-2"><?php echo $pizza->getTitlep() ?>
        <br><img src="<?php echo $pizza->getImagep() ?>" class="img-thumbnail"/></td>
        <td class="col-sm-2"><?php echo $pizza->getDescribep() ?></td>
        <td class="col-sm-2"><?php echo $pizza->getPricep() ?></td>
        <td class="col-sm-2"><?php echo $pizza->getSize() ?></td>
        <td class="col-sm-2"><?php echo $pizza->getType() ?></td>
        <td class="col-sm-2 "><a href="/adminPage/pizza/update/<?php echo $pizza->getIdp() ?>" class="btn btn-primary glyphicon glyphicon-refresh dist"> Modifică</a><br>
        <a href="/adminPage/pizza/delete/<?php echo $pizza->getIdp() ?>" class="btn btn-primary glyphicon glyphicon-trash"> Șterge</a></td>
    </tr>
</table>