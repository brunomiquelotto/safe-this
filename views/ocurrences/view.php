<div class="card">
<header class="card-header flex-container align-middles space-between">
	<h3>Visualização da Ocorrência</h1>
	<a href="<?=HOME_URI?>/ocurrences" class="button back small">Voltar</a>
</header>

<section class="card-content">
		<div>
			<p>
				<span style="font-weight: bold">Local:</span>
				<?=$this->model->ocurrence['Place'] ?>.</p>
			<p>
				<span style="font-weight: bold">Descrição: </span>
				 <?=$this->model->ocurrence['Description'] ?>
			</p>
			<p>
				<span style="font-weight: bold">Email: </span> 
				<?=$this->model->ocurrence['Reporter_Email'] ?>.
			</p>
			<p>
				<span style="font-weight: bold">CPF: </span> 
				<?=$this->model->ocurrence['Reporter_CPF'] ?>
			</p>
		</div>
		<div>
			<p>
				<span style="font-weight: bold">Data de abertura: </span> 
				<?=$this->model->ocurrence['Opening_Date'] ? date('d/m/Y H:i:s', strtotime($this->model->ocurrence['Opening_Date'])) : "Não há" ?>. 
			</p>
			<p>
				<span style="font-weight: bold">Data de fechamento: </span> 
				<?=$this->model->ocurrence['Closing_Date'] ? date('d/m/Y H:i:s', strtotime($this->model->ocurrence['Closing_Date'])) : "Não há" ?>.
			</p>
		</div>
	</section>
</div>

<div class="card wrap">
	<header class="card-header flex-container align-middles">
		<h3>Atualizações</h3>
	</header>
	<section class="card-content">
		<div class="update-card">
			<header>
				<span class="title">Em andamento</span>
				<span class="subtitle">Responsável: Silas Caxias</span>	
			</header>
			<section>
				<span class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
			</section>
		</div>
		<div class="update-card">
			<header>
				<span class="title">Em andamento</span>
				<span class="subtitle">Responsável: Silas Caxias</span>	
			</header>
			<section>
				<span class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
			</section>
		</div>
		<div class="update-card">
			<header>
				<span class="title">Em andamento</span>
				<span class="subtitle">Responsável: Silas Caxias</span>	
			</header>
			<section>
				<span class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
			</section>
		</div>
	</section>
</div>
				
<div class="card">
	<header class="card-header">
		<h3>Imagens da ocorrência</h3>
	</header>
	<section class="card-content">
		<?php foreach($this->model->ocurrence['Pictures'] as $pic) { ?>
			<div class="card-image"">
            	<figure>
            		<a href="<?=$pic['src']?>" target="_blank">
	  					<img src="<?=$pic['src']?>" alt="<?=$pic['title']?>">
	  				</a>
	  				<figcaption><?=$pic['title']?></figcaption>
				</figure>
			</div>
		<?php } ?>
	</section>
</div>