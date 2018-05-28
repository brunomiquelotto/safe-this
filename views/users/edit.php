<div class="card">
<header class="card-header flex-container align-middles space-between">
    <h1>Editar responsável</h1>
    <a href="<?=HOME_URI?>/users" class="button back small">Voltar</a>
</header>

<section class="card-content">
    <form action="<?=HOME_URI?>/users/save/<?=$this->model->user['User_Id']?>" method="post">
        <div class="form-group">
            <input type="text" name="Name" class="form-control large" placeholder="Nome" value="<?=$this->model->user['Name']?>">
        </div>
        <div class="form-group">
            <input type="email" name="Email" class="form-control large" placeholder="E-mail" value="<?=$this->model->user['Email']?>">
        </div>
        <div class="form-group">
            <select class="form-control" name="Profile_Id">
                    <option value="0">Selecione um perfil</option>
                <?php foreach($this->model->profiles as $profile) { ?>
                    <option value="<?=$profile['Profile_Id']?>" <?=$this->model->user['Profile_Id'] == $profile['Profile_Id'] ? 'selected' : '' ?>>
                        <?=$profile['Description']?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
</section>
</div>