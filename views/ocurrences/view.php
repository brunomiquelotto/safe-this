<div class="flex-container align-middles space-between">
	<h1 class="page-title">Visualização da Ocorrência</h1>
	<a href="<?=HOME_URI?>/ocurrences" class="button back small">Voltar</a>
</div>

<div class="card mg-t-25">
	<header>
		<h3>Dados da ocorrência</h3>
	</header>
	<section>
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
	<header>
		<h3>Atualizações</h3>
	</header>
	<section>
		 <?php foreach($this->model->updates as $update) { ?>
		<div class="update-card">
			<header>

				<span class="title"><?=$update['Ocurrence_Status_Id']?></span>
				<span class="subtitle"><?php=($update['Responsible'] ? "Sem resposável" : "$update['Responsible']")?></span>	
			</header>
			<section>
				<span class="content">
					
					<?=$update['Status_Feedback']?>
				</span>
			</section>
		</div>
		<?php } ?>
	</section>
</div>
				
<div class="card wrap content-start">
	<header>
		<h3>Imagens da ocorrência</h3>
	</header>
	<section>
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