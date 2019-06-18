<div>
    <div class="col-sm-12">
        <div class="col-sm-4 ">
            <img class="col-sm-4 border-image image-individual" src="<?php echo $sauce->getImages() ?>">
        </div>
        <div class="col-sm-8">
            <div class="col-sm-offset-4 col-sm-8 title">
                <?php echo $sauce->getNames(); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 describe" >
                Ingrediente: <?php echo $sauce->getDescribes(); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-6 price">
                Pret unitar: <?php echo $sauce->getPrices(); ?> Lei
            </div>
            <form method="post" action="/add-cart">
                <div class="col-sm-offset-4 col-sm-2 quantity">
                    <label for="quantity" class="quantity">Cantitate</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1"/>
                    <input type="hidden" name="pizza" value="<?php echo $sauce->getIds() ?>">
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
        var pret = parseFloat('<?php echo $sauce->getPrices(); ?>');
        $("#quantity").on('change', function () {
            var cantitate = parseFloat($(this).val());
            totall = (cantitate*pret).toFixed(2);
            $("#total").html('Total: '+ totall + ' Lei');
        })
    })
</script>