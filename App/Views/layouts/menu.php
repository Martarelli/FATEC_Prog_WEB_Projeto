<nav class="navbar navbar navbar-expand-lg navbar-inverse navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">| <b>Projeto MVC</b> |</a>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item <?php if($viewVar['nameController'] == "HomeController") { ?> active <?php } ?>">
                    <a class="nav-link" href="http://<?php echo APP_HOST; ?>" >
                        <span class="glyphicon glyphicon-home"></span>&nbsp;Home</a>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
