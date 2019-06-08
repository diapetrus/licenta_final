<form action="/search" method="GET">
    <div class="form-group">
        <label for="titlep">Cauta</label>
        <input type="text" class="form-control" id="titlep" name="titlep" placeholder="cauta">
    </div>
    <button type="submit" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-search"></span>Cauta
    </button>
    <div class="messages"><?php echo $messages; ?></div>
</form>

<?php if(isset($recommendation) && count($recommendation) > 0) : ?>
    <div class="text-center">
        <?php foreach($recommendation as $rec) : ?>
        <div class="col-sm-12">
            <div class="recommendation text-center">
                <a href="/pizza/<?php echo $rec['idp'] ?>">
                    <img class="img-thumbnail" src="<?=$rec['imagep']?>">
                <div><?=$rec['titlep']?></div></a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
<?php endif;
