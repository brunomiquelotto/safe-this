<h1>Relatorios</h1>

<div>
    <div>
        <div class="form-group">
            <select class="form-control small">
                    <option>ISE</option>
                    <option>Central</option>
                    <option>Engenharia</option>
            </select>
            <select class="form-control small">
                <option>Em andamento</option>
                <option>Em analise</option>
                <option>Finalizado</option>
            </select>
            <input type="date" class="form-control small" placeholder="Período">
            <input type="date" class="form-control small">
        </div>

        <a href="<?=HOME_URI?>/reports/view" class="button info ripple mg-t-10">Gerar Relatorio</a>
        <a href="<?=HOME_URI?>/reports/download" class="button info ripple mg-t-10">Gerar PDF</a>
        <a href="<?=HOME_URI?>/reports/view/complete" class="button info ripple mg-t-10">Gerar Relatorio Completo</a>
    </div>
    <?php if (!$this->model->showResults) { ?>
        <label type="text">Clique em pesquisar para gerar relatorio</label>
    <?php } ?>
    <?php if ($this->model->showResults)  { ?>
    <table class="table">
        <thead>
            <tr>
                <th>Title 1</th>
                <th>Title 2</th>
                <th>Title 3</th>
                <th>Title 4</th>
                <th>Title 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
            </tr>
            <tr>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
            </tr>
            <tr>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
            </tr>
            <tr>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
            </tr>
            <tr>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
                <td>Dados</td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
</div>