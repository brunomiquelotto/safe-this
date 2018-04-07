<a href="<?=HOME_URI?>/users" class="button warning ripple mg-t-10">Voltar</a>
<h2>Editar responsável</h2>
<div style="width:50%">
    <form action="<?=HOME_URI?>/users/save/<?=$this->model->user['user_id']?>" method="post">
        <div class="form-group">
            <input type="text" name="user" class="form-control large" placeholder="Nome" value="<?=$this->model->user['user']?>">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control large" placeholder="E-mail" value="<?=$this->model->user['email']?>">
        </div>
        <div class="form-group">
            <select class="form-control">
                <option value="1">Administrador</option>
                <option value="2">Moderador</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
</div>