<form method="post">
    <label>
        Sunteti sigur ca doriti sa stergeti  "<?php echo $pizza->getTitlep() ?>" ?
    </label>
    <br>
    <input type="submit" value="Da" name="confirm"/>
    <input type="submit" value="Nu" name="no-confirm"/>
</form>

