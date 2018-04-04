<a href="<?=HOME_URI?>/users" class="button warning ripple mg-t-10">Voltar</a>
<h2>Editar responsável</h2>
<div style="width:50%">
    <form action="<?=HOME_URI?>/users/save" method="post">
        <div class="form-group">
            <input type="text" name="name" class="form-control large" placeholder="Nome">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control large" placeholder="E-mail">
        </div>
        <div class="form-group">
            <select class="form-control">
                <option>Administrador</option>
                <option>Moderador</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
</div>