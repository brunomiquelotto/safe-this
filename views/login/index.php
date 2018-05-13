<div class="center-all" style="margin-top: 30px;">
    <div class="card" style="width: 40%;">
        <h3 style="text-align:center;color:#544f4f; padding-top: 40px;" >Autenticação necessária</h3>
        <form method="post">
            <?php
                if ($this->login_error) { ?>
                    <span class="login-error" style="text-align:center"><?=$this->login_error?></span>
            <?php } ?>
            <div class="center-all">
                <div class="form-group">
                    <input type="text" name="userdata[Email]" class="form-control" placeholder="Preencha seu usuário aqui"/>
                </div>
            </div>
            <div class="center-all">
                <div class="form-group">
                    <input type="password" name="userdata[Password]" class="form-control" placeholder="Senha"/>
                </div>
            </div>
            <div></div>
            <div class="center-all mg-t-10" style="margin-bottom: 40px;">
                <input type="submit" class="button primary" value="Entrar"/>
            </div>
        </form>
    </div>
</div>