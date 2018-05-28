<form action="<?=HOME_URI?>/profiles/save" method="post">
    <div class="card" style="width:50%; float:left;margin-right: 15px;">
        <header class="card-header flex-container align-middles space-between">
            <h1>Dados do Perfil</h1>
            <a href="<?=HOME_URI?>/profiles" class="button back small">Voltar</a>
        </header>

        <section class="card-content">

            <div class="form-group">
                <input type="text" name="Description" class="form-control large" placeholder="Descrição">
            </div>
            <div class="form-group">
                <input type="submit" value="Salvar" class="button success ripple"/>
            </div>

        </section>
    </div>
    <div class="card" style="width:calc(50% - 15px); float:left;">
        <header class="card-header flex-container align-middles space-between">
            <h1>Permissões</h1>
        </header>
        <section class="card-content">
        <?php foreach($this->model->profile->permissions as $permission) { ?>
            <div class="form-group">
                <input id="<?=$permission['Permission_Id']?>" type="checkbox" class="form-control" name="Permission[]" value="<?=$permission['Permission_Id']?>"/>
                <label for="<?=$permission['Permission_Id']?>"><?=$permission['Description']?></label>
            </div>
        <?php } ?>
       </section>  
    </div>
        </form>