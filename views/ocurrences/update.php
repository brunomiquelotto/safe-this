<div class="flex-container align-middles space-between">
    <h1 class="page-title">Atualização de ocorrência</h1>
    <a href="<?=HOME_URI?>/ocurrences" class="button back small">Voltar</a>
</div>


<div style="width:50%">
     <form action="<?=HOME_URI?>/ocurrences/save/<?=$this->model->ocurrences['Ocurrence_id']?>" enctype="multipart/form-data" method="post">    
        <div class="form-group">
            <select class="form-control small" name="Ocurrence_Priority_Id"> 
                <option value="0">Prioridade</option>
                <option value="1">Alta</option>
                <option value="2">Média</option>
                <option value="3">Baixa</option>           
            </select>
        </div>
         <div class="form-group">
            <select class="form-control small" name="Ocurrence_Status_Id"> 
                <option value="0">Status</option>
                <option value="1">Aguardando Análise</option>
                <option value="2">Rejeitado</option>
                <option value="3">Aceito</option>      
                <option value="3">Em andamento</option>    
                <option value="3">Finalizado</option>      
            </select>
        </div>
         <div class="form-group">
            <input type="textarea" name="Status_Feedback" class="form-control large" placeholder="Dê um feedback a ocorrência!">
        </div>
         <div class="form-group">
            <select class="form-control small" name="Responsible"> 
                <option value="0">Responsavel</option>
                <option value="1">Moderador Silas</option>
                <option value="2">Atirador Silas</option>
                <option value="3">Cara x</option>           
            </select>
        </div>
        <div class="form-group" id="Images">
            <input type="file" name="Image[]" id="Image_1" accept="image/png, image/jpeg" class="form-control-file">
            <label for="Image_1" class="display-block">Anexar arquivo</label>
        </div>
        <div class="form-group">
            <input type="submit" value="Atualizar" class="button success ripple"/>
        </div>        
    </form>
</div>
