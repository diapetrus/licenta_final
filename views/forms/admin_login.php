<div class="center-div">
    <form method="post" class="form-horizontal form-login">
        <div class="messages">
            <?php echo $messages; ?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">E-mail:</label>
            <div class="col-sm-5">
                <input type='usera' class="form-control" name="usera" id="usera"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="password">Password:</label>
            <div class="col-sm-5">
                <input type='password' class="form-control " name="password" id="password"/>
            </div>
        </div>
        <div class="from-group">
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" class="btn btn-default">Login</button>
            </div>
        </div>
    </form>
</div>