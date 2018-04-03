<h2>Adicionar novo local </h2>

<a href="<?=HOME_URI?>/places" class="button warning ripple mg-t-10">Voltar</a>
<div class="center-all">
    <div class="card center-all " style="width:50%">
        <form action="<?=HOME_URI?>/places/save" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Descrição do local">
            </div>
            <div></div>
            <div class="form-group">
                <input type="submit" value="Salvar" class="button success ripple"/>
            </div>
        </form>
    </div>
</div>