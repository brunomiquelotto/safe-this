<div class="flex-container align-middles space-between">
    <h1 class="page-title">Editar ocorrência</h1>
    <a href="<?=HOME_URI?>/ocurrences" class="button back small">Voltar</a>
</div>


<div style="width:50%">
     <form action="<?=HOME_URI?>/ocurrences/save/<?=$this->model->ocurrences['Ocurrence_id']?>" enctype="multipart/form-data" method="post">    
        <div class="form-group">
            <select class="form-control small" name="Ocurrence_Priority_Id">
            </select>
        </div>
        <div class="form-group">
            <select class="form-control small" name="Sector_Id">
                    <option value="0">Setor</option>
                    <option value="1">Casa do Silas</option>
                    <option value="1">ISE</option>
                    <option value="2">Central</option>
                    <option value="3">Engenharia</option>
            </select>
        </div>
         <div class="form-group">
            <input type="textarea" name="Description" value="bla bla bla descrição" class="form-control large">
        </div>
        <div class="form-group">
            <input type="email" name="Reporter_Email" value="Silascaxias@gmail.com" class="form-control large">
        </div>
        <div class="form-group">
            <input type="text" name="Reporter_CPF" value="455.394.323-55" class="form-control large" maxlength="14" OnKeyPress="GeneralFunctions.Format('###.###.###-##', this)"  >
        </div>
        <div class="form-group" id="Images">
            <input type="file" name="Image[]" id="Image_1" accept="image/png, image/jpeg" class="form-control-file">
            <label for="Image_1" class="display-block">Anexar arquivo</label>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>        
    </form>
</div>

