<div class="container">
    <h1>Dashboard</h1>
    <h4>Olá <b><?= ucfirst($_SESSION['username'])?>!</h4>             
    <br />
    <h4>Bem-vindo ao sistema '<?= TITLE ?>'.</h4>

    <hr />
    <div class="row">
        <div class="col-md-9">
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert">
                    <?= $Sessao::retornaMensagem() ?> 
                </div>
            <?php } ?>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <a href="http://<?= APP_HOST.'/login/reset' ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Resete a sua senha </a>
            <a href="http://<?= APP_HOST.'/login/logout' ?>" class="btn btn-danger ml-3"><i class="fa-solid fa-right-from-bracket"></i> Faça logout em sua conta </a>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>