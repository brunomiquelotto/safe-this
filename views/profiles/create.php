<a href="<?=HOME_URI?>/profiles" class="button warning ripple mg-t-10">Voltar</a>
<h2>Criar Perfil</h2>
<div style="width:50%">
    <form action="<?=HOME_URI?>/profiles/save" method="post">
        <div class="form-group">
            <input type="text" name="Description" class="form-control large" placeholder="Descrição">
        </div>
        <?php foreach($this->model->profile->permissions as $permission) { ?>
            <div class="form-group">
                <input id="<?=$permission['Permission_Id']?>" type="checkbox" class="form-control" name="Permission[]" value="<?=$permission['Permission_Id']?>"/>
                <label for="<?=$permission['Permission_Id']?>"><?=$permission['Description']?></label>
            </div>
        <?php } ?>
        <div class="form-group">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
</div>