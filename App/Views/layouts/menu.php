<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">| <b>Projeto MVC</b> |</a>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item <?php if($viewVar['nameController'] == "HomeController") { ?> active <?php } ?>">
                    <a class="nav-link" href="http://<?php echo APP_HOST; ?>" >
                    <i class="fa-solid fa-house"></i> Home</a>
                    </a>
                </li>
                <li class="nav-item <?php if($viewVar['nameController'] == "ClienteController") { ?> active <?php } ?>">
                    <a class="nav-link" href="http://<?php echo APP_HOST . "/cliente"; ?>" >
                    <i class="fa-solid fa-users"></i> Clientes</a>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
