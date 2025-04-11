  <!-- Conexión a CSS -->
  <link href="<?=base_url()?>assets/css/estilos.css" rel="stylesheet" type="text/css">

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Movimundo Logo" style="height: 40px; display: inline-block; vertical-align: middle;">
                    Movimundo
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (!empty($secciones)) {
                        // Mostrar "Inicio" primero
                        foreach ($secciones as $item) {
                            if (LimpiaCadena($item['nombre_seccion']) == "Inicio") {
                                echo '<li><a href="' . htmlspecialchars($item['link']) . '">' . htmlspecialchars(LimpiaCadena($item['nombre_seccion'])) . '</a></li>';
                            }
                        }
                        
                        // Menú desplegable de "Servicios"
                        echo '<li class="dropdown">';
                        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios <span class="caret"></span></a>';
                        echo '<ul class="dropdown-menu">';
                        foreach ($secciones as $item) {
                            if (in_array(LimpiaCadena($item['nombre_seccion']), ["Terrestre", "Maritimo", "Aereo", "Ecologico", "Ofertas"])) {
                                echo '<li><a href="' . htmlspecialchars($item['link']) . '">' . htmlspecialchars(LimpiaCadena($item['nombre_seccion'])) . '</a></li>';
                            }
                        }
                        echo '</ul></li>';
                        
                          // Menú desplegable de "Historia"
                        if (!empty($historia)) {
                            echo '<li class="dropdown">';
                            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Historia <span class="caret"></span></a>';
                            echo '<ul class="dropdown-menu">';
                            foreach ($historia as $item) {
                                // Se usa correctamente base_url() sin agregar manualmente 'auto/'
                                $link = base_url(LimpiaCadena($item['link']));
                                echo '<li><a href="' . htmlspecialchars($link) . '">' . htmlspecialchars(LimpiaCadena($item['nombre'])) . '</a></li>';
                            }
                            echo '</ul></li>';
                        }
                        

                        // Requerimientos
                        foreach ($secciones as $item) {
                            if (LimpiaCadena($item['nombre_seccion']) == "Requerimientos") {
                                echo '<li><a href="' . htmlspecialchars($item['link']) . '">' . htmlspecialchars(LimpiaCadena($item['nombre_seccion'])) . '</a></li>';
                            }
                        }
                    }
                    ?>
                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <?php if ($this->session->userdata('login_status') === 'logged_in'): ?>
            <?php
                    if (!empty($secciones_login)) {
                        foreach ($secciones_login as $item) {
                                echo "<li><a href='".$item['link']."'>".LimpiaCadena($item['nombre_seccion'])."</a></li>";
                        }
                    }
                    ?>
        <?php else: ?>
            <li><a class="dropdown-item" href="<?= base_url('login'); ?>">Iniciar sesión</a></li>
        <?php endif; ?>
    </ul>
</li>

                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
