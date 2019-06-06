<h1>Edit <?php echo $pizza->getTitlep() ?> </h1>
<form method="post" class="col-sm-2" id="show-edit-form">
    <div class="form-group">
        <label for="describep">Describe</label>
        <input type="text" class="form-control" id="describep" name="describep"/>
        <label for="pricep">Price</label>
        <input type="text" class="form-control" id="pricep" name="pricep"/>
        <label for="type">Tip</label>
        <select class="form-control" id="type">
            <option value="cu carne">Cu Carne</option>
            <option value="fara carne">Fara Carne</option>
        </select>
        <label for="imagep">Image(root)</label>
        <input type="text" class="form-control" id="imagep" name="imagep"/>
    </div>
    <button id="edit-submit" type="submit" class="btn btn-info btn-lg">Update</button>
    <a href="/adminPage" class="btn btn-info btn-lg">Cancel</a>
</form>
