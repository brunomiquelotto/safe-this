<div class="card" style="width:50%">
<header class="card-header flex-container align-middles space-between">
    <h1>Adicionar novo local</h1>
    <a href="<?=HOME_URI?>/places" class="button back small">Voltar</a>
</header>

<section class="card-content" style="width:50%">
    <form action="<?=HOME_URI?>/places/save" method="post" enctype="multipart/form-data">
        <div class="form-group display-block">
            <input type="text" name="Name" class="form-control large" placeholder="Descrição do local">
        </div>
        <div class="form-group display-block">
            <input type="file" name="Image" id="image" accept="image/png, image/jpeg" class="form-control-file" />
            <label for="image" class="ripple">Selecione um arquivo</label>
        </div>
        <div class="form-group display-block">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
</section>
</div>