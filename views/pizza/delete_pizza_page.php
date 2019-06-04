<form method="post">
    <label>
        Are you sure you want to delete  "<?php echo $pizza->getTitlep() ?>" ?
    </label>
    <br>
    <input type="submit" value="Yes" name="confirm"/>
    <input type="submit" value="No" name="no-confirm"/>
</form>

