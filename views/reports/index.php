<h1>Relatorios</h1>

<div>
    <div>
       <h3>Filtros</h3>
       <tr/>
       <select>
            <option>ISE</option>
            <option>Central</option>
            <option>Engenharia</option>
       </select>

       <select>
            <option>Em andamento</option>
            <option>Em analise</option>
            <option>Finalizado</option>
        </select>

       <label for="date">Periodo</label>
       <input type="date" id="date">
       <input type="date" id="date">

       
       <a href="<?=HOME_URI?>/users/create" class="button success ripple mg-t-10">Gerar Relatorio</a>
       <a href="<?=HOME_URI?>/users/create" class="button success ripple mg-t-10">Gerar PDF</a>
       <a href="<?=HOME_URI?>/users/create" class="button success ripple mg-t-10">Gerar Imprimir Relatorio Completo</a>
    </div>
    <center>
        <label type="text">Clique em pesquisar para gerar relatorio</label>
    </center>
</div>