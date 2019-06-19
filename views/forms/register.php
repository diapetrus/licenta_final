<div class="center-div">
    <form method="post" class="form-horizontal form-register">
        <div class="messages">
            <?php echo $messages; ?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">E-mail:</label>
            <div class="col-sm-5">
                <input type='email' class="form-control" name="email" id="email" placeholder="name@example.com"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="password">Parolă:</label>
            <div class="col-sm-5">
                <input type='password' class="form-control" name="password" id="password" placeholder="********"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="confirm-password">Confirmare parolă:</label>
            <div class="col-sm-5">
                <input type='password' class="form-control" name="confirm-password" id="confirm-password" placeholder="********"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">Adresă de livrare:</label>
            <div class="col-sm-5">
                <input type='text' class="form-control" name="address" id="address" placeholder="adresa"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">Număr de telefon:</label>
            <div class="col-sm-5">
                <input type='text' class="form-control" name="phone" id="phone" placeholder="07xxxxxxxx"/>
            </div>
        </div>
        <div class="from-group">
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" class="btn btn-default">Înregistrează-te</button>
            </div>
        </div>
        <div class="from-group">
            <label class="col-sm-offset-4 col-sm-10">Ai deja un cont? <a href="/login">Contectează-te</a></label>
        </div>
    </form>
</div>
