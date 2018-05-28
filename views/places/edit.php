<div> <div class="card" style="width: calc(50% - 30px); display: inline-block; float:left; margin-right: 15px;" >
    <header class="card-header flex-container align-middles space-between">
        <h1>Alterar local</h1>
        <a href="<?=HOME_URI?>/places" class="button back small">Voltar</a>
    </header>

    <section class="card-content">
        <form action="<?=HOME_URI?>/places/save/<?=$this->model->place['Sector_Id']?>" enctype="multipart/form-data" method="post">
            <div class="form-group display-block">
                <input type="text" name="name" class="form-control" placeholder="Descrição do local" value="<?=$this->model->place['Name']?>">
            </div>
            <div class="form-group display-block">
                <input type="file" name="Image" id="image" accept="image/png, image/jpeg" class="form-control-file" />
                <label for="image" class="ripple"><?=$this->model->place['Image']? 'Alterar foto existente' : 'Adicionar foto' ?></label>
            </div>
            <div class="form-group display-block">
                <input type="submit" value="Salvar" class="button success ripple"/>
            </div>
        </form>
    </section>
</div>
<div class="card" style="width: calc(50% - 30px); display:inline-block; float:left;">
    <header class="card-header flex-container align-middles space-between">
        <h1>Foto</h1>
        <a href="<?=HOME_URI?>/places" class="button back small">Voltar</a>
    </header>
    <section class="card-content">
    <img style="width: 100%" src="<?=$this->model->place['Image']['Source']?>" />
    <span><?=$this->model->place['Image']['Title']?></span>
</section>  
</div>
</div>