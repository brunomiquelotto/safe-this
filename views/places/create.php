<a href="<?=HOME_URI?>/places" class="button warning ripple mg-t-10">Voltar</a>
<h2>Adicionar novo local </h2>
<div style="width:50%">
    <form action="<?=HOME_URI?>/places/save" method="post">
        <div class="form-group display-block">
            <input type="text" name="name" class="form-control large" placeholder="Descrição do local">
        </div>
        <div class="form-group display-block">
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="form-control-file" />
            <label for="image" class="ripple">Selecione um arquivo</label>
        </div>
        <div class="form-group display-block">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>
    </form>
</div>