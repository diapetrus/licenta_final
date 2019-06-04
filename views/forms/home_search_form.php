<form action="/search" method="GET">
    <div class="form-group">
        <label for="titlep">Search</label>
        <input type="text" class="form-control" id="titlep" name="titlep" placeholder="search">
    </div>
    <button type="submit" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-search"></span>Search
    </button>
    <div class="messages"><?php echo $messages; ?></div>
</form>