<h1>Relatorios</h1>

<div>
    <div>
        <h3>Filtros</h3>
        <div class="form-group">
            <select class="form-control">
                    <option>ISE</option>
                    <option>Central</option>
                    <option>Engenharia</option>
            </select>
        </div>

        <div class="form-group">
            <select class="form-control">
                <option>Em andamento</option>
                <option>Em analise</option>
                <option>Finalizado</option>
            </select>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" placeholder="Período">
            <input type="date" class="form-control">
        </div>

        <a href="<?=HOME_URI?>/users/create" class="button success ripple mg-t-10">Gerar Relatorio</a>
        <a href="<?=HOME_URI?>/users/create" class="button success ripple mg-t-10">Gerar PDF</a>
        <a href="<?=HOME_URI?>/users/create" class="button success ripple mg-t-10">Gerar Imprimir Relatorio Completo</a>
    </div>
    <center>
        <label type="text">Clique em pesquisar para gerar relatorio</label>
    </center>
</div>