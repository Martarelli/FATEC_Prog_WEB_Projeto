<div class="w-100 m-0 p-0">

    <div class="w-100" id="img-banner">

    </div>

    <div class="w-100 d-flex justify-content-center align-items-center p-4 gap-5">

        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/user-img.png" class="card-img-top p-3" alt="user img">
            <div class="card-body">
            <h5 class="card-title">Usuários Cadastrados</h5>
            <p class="card-text"><?=count($viewVar['listaUsuarios']);?></p>
            <a href="http://<?php echo APP_HOST . "/usuario"; ?>" class="btn btn-dark">Listagem Usuários</a>
            </div>
        </div>
        
        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/pizza-img.png" class="card-img-top" alt="user img">
            <div class="card-body">
            <h5 class="card-title">Pizzas Cadastrados</h5>
            <p class="card-text"><?=count($viewVar['listaPizza']);?></p>
            <a href="http://<?php echo APP_HOST . "/pizza"; ?>" class="btn btn-dark">Listagem Pizzas</a>
            </div>
        </div>
        
        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/cliente-img.png" class="card-img-top p-3" alt="user img">
            <div class="card-body">
            <h5 class="card-title">Clientes Cadastrados</h5>
            <p class="card-text"><?=count($viewVar['listaCliente']);?></p>
            <a href="http://<?php echo APP_HOST . "/cliente"; ?>" class="btn btn-dark">Listagem Clientes</a>
            </div>
        </div>

    </div>
</div>
