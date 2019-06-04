<h1>Add a new pizza</h1>
<form method="post" class="col-sm-2" id="show-edit-form">
    <div class="form-group">
        <label for="titlep">Title</label>
        <input type="text" class="form-control" id="titlep" name="titlep"/>
    </div>
    <div class="form-group">
        <label for="describep">Describe</label>
        <input type="text" class="form-control" id="describep" name="describep"/>
    </div>
    <div class="form-group">
        <label for="pricep">Price</label>
        <input type="text" class="form-control" id="pricep" name="pricep"/>
    </div>
    <div class="form-group">
        <label for="pricep">Image(root)</label>
        <input type="text" class="form-control" id="imagep" name="imagep"/>
    </div>
    <button id="edit-submit" type="submit" class="btn btn-info btn-lg">Add</button>
    <a href="/adminPage" class="btn btn-info btn-lg">Cancel</a>
</form>