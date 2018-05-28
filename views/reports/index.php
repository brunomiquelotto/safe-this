<div class="card">
    <header class="card-header flex-container align-middles space-between">
        <h1>Relatórios</h1>
    </header>
    <section class="card-content">
        <div>
            <form action="<?php echo HOME_URI ?>/reports/view" method="post">
                <div class="form-group"> 
                    <select class="form-control small" name="Sector_Id">
                        <option value="0">Selecione um Local</option>
                        <?php foreach($this->model->reports as $place): ?>
                            <option value="<?=$place['Sector_Id']?>"> 
                                <?=$place['Name']?>
                            </option>
                        <?php endforeach; ?>
                    </select>              

                </div>
                <input type="submit" class="button info ripple mg-t-10" value="Gerar Relatorio" />

            </form>
        </div>
        <?php if (!$this->model->showResults): ?>
            <label type="text">Clique em pesquisar para gerar relatorio</label>
        <?php endif; ?>
        <?php if ($this->model->showResults): ?>
            <table class="table">
                <thead>
                    <tr> 
                        <th>Local</th>
                        <th>Aguardando</th>
                        <th>Rejeitado </th>
                        <th>Aceito</th>
                        <th>Andamento</th>
                        <th>Pronto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->model->showResults as $data): ?>
                     <tr>
                        <td><?=$data['Place']; ?></td>
                        <td><?=$data['Aguardando']; ?></td>
                        <td><?=$data['Rejeitado']; ?></td>
                        <td><?=$data['Aceito']; ?></td>
                        <td><?=$data['Andamento']; ?></td>
                        <td><?=$data['Pronto']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</section>
</div>