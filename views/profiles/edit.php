<div class="flex-container align-middles space-between">
    <h1 class="page-title">Editar Perfil</h1>
    <a href="<?=HOME_URI?>/profiles" class="button back small">Voltar</a>
</div>

<div style="width:50%">
    <form action="<?=HOME_URI?>/profiles/save/<?=$this->model->profile['Profile_Id']?>" method="post">
        <div class="form-group">
            <input type="text" name="Description" class="form-control large" placeholder="Descrição" value="<?=$this->model->profile['Description']?>">
        </div>
        <?php foreach($this->model->profile['Permissions'] as $permission) { ?>
            <div class="form-group">
                <input id="<?=$permission['Permission_Id']?>" name="Permissions[]" value="<?=$permission['Permission_Id']?>" type="checkbox" class="form-control" <?=$permission['Checked'] ? 'checked' : '' ?>/>
                <label for="<?=$permission['Permission_Id']?>"><?=$permission['Description']?></label>
            </div>
        <?php } ?>
        <div class="form-group">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
</div>