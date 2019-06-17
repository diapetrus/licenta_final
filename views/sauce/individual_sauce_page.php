<div>
    <div class="col-sm-12">
        <div class="col-sm-4 ">
            <img class="col-sm-4 border-image image-individual" src="<?php echo $pizza->getImagep() ?>">
        </div>
        <div class="col-sm-8">
            <div class="col-sm-offset-4 col-sm-8 title">
                <?php echo $pizza->getTitlep(); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 describe" >
                Ingrediente: <?php echo $pizza->getDescribep(); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 size">
                Marime: <?php echo $pizza->getSize(); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-6 price">
                Pret unitar: <?php echo $pizza->getPricep(); ?> Lei
            </div>
            <form method="post" action="/add-cart">
                <div class="col-sm-offset-4 col-sm-2 quantity">
                    <label for="quantity" class="quantity">Cantitate</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1"/>
                    <input type="hidden" name="pizza" value="<?php echo $pizza->getIdp() ?>">
                </div>
                <div class="col-sm-offset-4 col-sm-8 price" id="total"></div>
                <div class="col-sm-offset-4 col-sm-8 cos">
                    <input type="submit" value="Adauga in cos"  class="btn btn-primary " />
                </div>

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
            $("#total").html('Total: '+ total + ' Lei');
        })
    })
</script>