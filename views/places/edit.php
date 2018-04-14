<a href="<?=HOME_URI?>/places" class="button warning ripple mg-t-10">Voltar</a>
<h2>Alterar local</h2>
<div style="width:50%">
    <form action="<?=HOME_URI?>/places/save/<?=$this->model->place['Sector_Id']?>" enctype="multipart/form-data" method="post">
        <div class="form-group display-block">
            <input type="text" name="name" class="form-control large" placeholder="Descrição do local" value="<?=$this->model->place['Name']?>">
        </div>
        <div class="form-group display-block">
            <input type="file" name="Image" id="image" accept="image/png, image/jpeg" class="form-control-file" />
            <label for="image" class="ripple"><?=$this->model->place['Image']? 'Alterar foto existente' : 'Adicionar foto' ?></label>
        </div>
        <div class="form-group display-block">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
    <div class="card mg-t-10">
        <img style="width: 100%" src="<?=$this->model->place['Image']['Source']?>" />
        <span><?=$this->model->place['Image']['Title']?></span>
    </div>
</div>