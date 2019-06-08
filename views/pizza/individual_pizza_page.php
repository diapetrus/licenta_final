<div class="container">
    <div class="row">
        <div class="image-wrapper col-sm-6">
            <img class="image-individual" src="<?php echo $pizza->getImagep() ?>">
        </div>
        <div class="col-sm-6">
            <div class="col-sm-offset-6 col-sm-6">
                <h1><strong><?php echo $pizza->getTitlep(); ?></strong></h1>
            </div>
            <div class="col-sm-offset-6 col-sm-6">
                <?php echo $pizza->getDescribep(); ?>
            </div>
            <div class="col-sm-offset-6 col-sm-6">
                Marime: <?php echo $pizza->getSize(); ?>
            </div>
            <div class="col-sm-offset-6 col-sm-6">
                Pret/buc: <?php echo $pizza->getPricep(); ?> Lei
            </div>
            <form method="post" action="/add-cart">
                <div class="col-sm-offset-6 col-sm-2">
                    <label for="quantity">Cantitate</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1"/>
                    <input type="hidden" name="pizza" value="<?php echo $pizza->getIdp() ?>">
                </div>
                <div class="col-sm-offset-6 col-sm-6">
                    <input type="submit" value="Comanda"  class="btn btn-primary" />
                </div>
                <div class="col-sm-offset-6 col-sm-6" id="total"></div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var pret = parseFloat('<?php echo $pizza->getPricep(); ?>');
        $("#quantity").on('change', function () {
            var cantitate = parseFloat($(this).val());
            total = (cantitate*pret).toFixed(2);
            $("#total").html('Total: '+total);
        })
    })
</script>