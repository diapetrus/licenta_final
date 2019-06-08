<div class="col-sm-12">
    <form class="form-inline" action="/filter" method="get">
        <div class="form-group">
            <label for="type">Tip</label>
            <select class="form-control" id="type" name="type">
                <option value=""></option>
                <option value="Cu Carne">Cu Carne</option>
                <option value="Fara Carne">Fara Carne</option>
                <option value="Cu Peste">Cu Peste</option>
            </select>
        </div>
        <div class="form-group">
            <label for="size">Marime</label>
            <select class="form-control" id="size" name="size">
                <option value=""></option>
                <option value="Mica">Mica</option>
                <option value="Medie">Medie</option>
                <option value="Mare">Mare</option>
            </select>
        </div>
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
