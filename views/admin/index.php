<div class="flex-container align-middles space-between">
	<h1>Bem vindo ao Safe This</h1>
</div>
<div class="container-main">
    <div class="card-count info">
        <div>
            <i class="fa fa-building"></i>
            <h2 class="count" data-start="0" data-end="<?=$this->model->places;?>">0</h2>
            <h3>Locais Cadastrados</h3>        
        </div>
    </div>
    <div class="card-count success">
        <div>
            <i class="fa fa-list"></i>
            <h2 class="count" data-start="0" data-end="<?=$this->model->ocurrences;?>">0</h2>
            <h3>Ocorrências Cadastradas</h3>        
        </div>
    </div>
    <div class="card-count danger">
        <div>
            <i class="fa fa-user"></i>
            <h2 class="count" data-start="0" data-end="<?=$this->model->users;?>">0</h2>
            <h3>Usuários Cadastrados</h3>        
        </div>
    </div>
</div>
<div class="center-all mg-t-50">
    <h3 class="bolder">Últimas Ocorrências Cadastradas</h3>
</div>

<div class="mg-t-10">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Local</th>
                <th>Status</th>
                <th>Prioridade</th>
                <th>Aberto Em</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->ocurrencesInfo as $ocurrences):?>
            <tr>
                <td><?=$ocurrences['Id']?></td>
                <td><?=$ocurrences['Description']?></td>
                <td><?=$ocurrences['Place']?></td>
                <td><?=$ocurrences['Status']?></td>
                <td><?=$ocurrences['Priority']?></td>
                <td><?=date('d/m/Y', strtotime($ocurrences['Opening_Date']));?></td>
            </tr> 
            <?php endforeach;?> 
    </table>
</div>
