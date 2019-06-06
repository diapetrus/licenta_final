<div class="col-sm-12">
    <form class="form-inline" action="/filter" method="get">
        <div class="form-group">
            <label for="type">Tip</label>
            <select class="form-control" id="type" name="type">
                <option value=""></option>
                <option value="cu carne">Cu Carne</option>
                <option value="fara carne">Fara Carne</option>
            </select>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="type">Pret</label>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Pret minim" name="min_price">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Pret maxim" name="max_price">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Filtreaza</button>
        <a href="/" class="btn btn-primary mb-2">Reseteaza</a>
    </form>
    <hr />
</div>
