<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->

<link href="<?=base_url()?>assets/css/carrusel.css" rel="stylesheet">

<!-- Container (Services Section) -->
<div class="container text-center">
    <br>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach ($carrusel as $index => $item): ?>
                <li data-target="#myCarousel" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
            <?php endforeach; ?>
        </ol>

        <!-- Contenido del carrusel -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($carrusel as $index => $item): ?>
                <div class="item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="assets/images/<?= $item['icono'] ?>" alt="<?= $item['nombre'] ?>" class="carousel-img" style="width:100%; height:500px; object-fit:cover; border-radius:10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);">
                    <div class="carousel-caption" style="background: rgba(0, 0, 0, 0.5); padding: 15px; border-radius: 5px;">
                        <h3 style="color: #fff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                            <?= $item['nombre'] ?>
                        </h3>
                        <p style="color: #ddd; font-size: 16px;">
                            <?= $item['descripcion'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Controles izquierdo y derecho -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
