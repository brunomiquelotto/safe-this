<h1>Relatorios</h1>

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
            <select class="form-control small" name="Ocurrence_Id">
                <option value="0">Data de abertura</option>
                <?php foreach($this->model->ocurrence as $date) { ?>
                    <option value="<?=$date['Ocurrence_Id']?>">
                        <?=$date['Opening_Date'];?>
                    </option>
                <?php } ?>
            </select>
            <select class="form-control small" name="Ocurrence_Id">
                <option value="0">Data de Encerramento</option>
                <?php foreach($this->model->ocurrence as $date) { ?>
                    <option value="<?=$date['Ocurrence_Id']?>">
                        <?=$date['Closing_Date'];?>
                    </option>
                <?php } ?>
            </select>
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