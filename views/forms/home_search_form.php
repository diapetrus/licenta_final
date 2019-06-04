<form action="/search" method="GET">
    <div class="form-group">
        <label for="titlep">Search</label>
        <input type="text" class="form-control" id="titlep" name="titlep" placeholder="search">
    </div>
    <button type="submit" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-search"></span>Search
    </button>
    <div class="messages"><?php echo $messages; ?></div>
</form>

<?php if(isset($recomandari) && count($recomandari) > 0) : ?>
    <div class="recomandari">
        <?php foreach($recomandari as $recomandare) : ?>
            <div class="recomandare">
                <img class="img-thumbnail" src="<?=$recomandare['imagep']?>">
                <div><?=$recomandare['titlep']?></div>
            </div>
        <?php endforeach;?>
    </div>
<?php endif;
