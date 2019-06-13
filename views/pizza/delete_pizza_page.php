<form method="post">
    <label>
        Sunteți sigur ca doriți să ștergeți  "<?php echo $pizza->getTitlep() ?>" ?
    </label>
    <br>
    <input type="submit" value="Da" name="confirm"/>
    <input type="submit" value="Nu" name="no-confirm"/>
</form>

