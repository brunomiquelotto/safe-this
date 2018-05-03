<div class="flex-container align-middles space-between">
    <h1 class="page-title">Relatorios</h1>
</div>

<div>
    <div>
        <div class="form-group">
            <select class="form-control small" name="Sector_Id">
                <option value="0">Selecione um Local</option>
                <?php foreach($this->model->reports as $place) { ?>
                    <option value="<?=$place['Sector_Id']?>">
                        <?=$place['Name']?>
                    </option>
                <?php } ?>
            </select> 
            <select class="form-control small" name="Ocurrence_Status_Id">
                <option value="0">Selecione um status</option>
                <?php foreach($this->model->status as $place) { ?>
                    <option value="<?=$place['Ocurrence_Status_Id']?>">
                        <?=$place['Description']?>
                    </option>
                <?php } ?>
            </select>
            <input type="Date" class="form-control small" name="Opening_Date">
            <input type="Date" class="form-control small" name="Closing_Date">
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