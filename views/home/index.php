<style>
    .bg-home{
        background: url('/safe-this/views/img/bg-home.jpg') center top no-repeat;  
        padding:306px 0px;      
    }
    .welcome-home{
        width: 920px;
        padding:30px;
        background: rgba(255,255,255,0.8);
        border-radius:8px;
        margin: 0 auto;
        text-align: center;
        height: 350px;
    }
    .row{
        width:100%;
        float: left;
    }
    .welcome-home-buttons, .welcome-home-buttons{
        width:50%;
        float: left;
    }
    .button.success{
        background-color: #42b197;
        -webkit-transition: background-color 0.8s; /* Safari */
        transition: background-color 0.8s;
        font-size: 18px;
        padding: 0px 20px;
        height: 50px;
        box-shadow:none;
    }
    .button{
        box-shadow:none;
    }
    .button.success:hover, .button:active, .button:focus {
        background: #57c1a8;
        box-shadow:none;
        outline: none;
    }
</style>
<section class="bg-home">
    
    <div class="welcome-home">
        <div class="welcome-home-logo">
            <img src="/safe-this/views/img/logo-black.png" alt="" width="500">
        </div>   
        <div class="row">
            <div class="welcome-home-buttons">
                <a href="<?=HOME_URI?>/ocurrences/create"><button class="button success">CADASTRAR OCORRÊNCIA</button></a>
            </div>
            <div class="welcome-home-buttons">
                <a href="<?=HOME_URI?>/ocurrences"><button class="button success">LISTAR OCORRÊNCIAS</button></a>
            </div>
        </div>     
    </div>
</section>

