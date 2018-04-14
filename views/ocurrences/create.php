<script>
    function formatar(mask, doc){
    var i = doc.value.length;
    var output = mask.substring(0,1);
    var str = mask.substring(i)
    
    if (str.substring(0,1) != output)
    doc.value += str.substring(0,1);   
    
    }
</script>

<a href="<?=HOME_URI?>/ocurrences" class="button warning ripple mg-t-10">Voltar</a>
<h2>Registrar nova ocorrência</h2>
<div style="width:50%">
    <form action="<?=HOME_URI?>/ocurrences/save" method="post">       
        <select class="form-control small" name="Sector_Id">
            <option value="0">Selecione um Local</option>
            <?php foreach($this->model->ocurrences as $place) { ?>
                <option value="<?=$place['Sector_Id']?>">
                    <?=$place['Name']?>
                </option>
            <?php } ?>
        </select>   
        <div class="form-group">
            <input type="textarea" name="Description" class="form-control large" placeholder="Descreva a ocorrência">
        </div>
        <div class="form-group">
            <input type="email" name="Reporter_Email" class="form-control large" placeholder="Informe seu E-mail">
        </div>
        <div class="form-group">
            <input type="text" name="Reporter_CPF" class="form-control large" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" placeholder="Informe seu CPF" >
        </div>
        
        <div class="form-group">
            <input type="text" name="Opening_Date" placeholder="Data de abertura" readonly="true" class="form-control large" value="<?=date('Y-m-d H:i')?>"></div>
        </div>

        <div class="form-group">       
            <select class="form-control small" name="Ocurrence_Priority_Id"> 
                <option value="0">Prioridade</option>           
                <?php foreach($this->model->priorities as $priort) { ?>
                    <option value="<?=$priort['Ocurrence_Priority_Id']?>">
                        <?=$priort['Description']?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Salvar" class="button success ripple"/>
        </div>        
    </form>
</div>