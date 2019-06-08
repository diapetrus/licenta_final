<table id="admin-show-table" class="table table-bordered table-striped">
    <tr>
        <td class="col-sm-2"><?php echo $pizza->getTitlep() ?></td>
        <td class="col-sm-2"><?php echo $pizza->getDescribep() ?></td>
        <td class="col-sm-2"><?php echo $pizza->getPricep() ?></td>
        <td class="col-sm-2"><img src="<?php echo $pizza->getImagep() ?>" class="img-thumbnail"/></td>
        <td class="col-sm-2"><a href="/adminPage/update/<?php echo $pizza->getIdp() ?>" class="btn btn-primary 	glyphicon glyphicon-refresh"> Update</a></td>
        <td class="col-sm-2"><a href="/adminPage/delete/<?php echo $pizza->getIdp() ?>" class="btn btn-primary glyphicon glyphicon-trash"> Delete</a></td>
    </tr>
</table>