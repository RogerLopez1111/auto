<link href="<?=base_url()?>assets/css/servicios.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Sección de Servicios -->
<div class="section-tours">
    <div class="panel">
        <div class="panel-heading">
            <h2>SERVICIOS Y LO MÁS VISTO</h2>
            <h2>Descubre nuestros servicios más populares</h2>
        </div>

        <div class="container-cards-tours">
            <?php if (!empty($servicios)): ?>
                <?php foreach ($servicios as $item): ?>
                    <div class="card-tour">
                        <div class="container-img">
                            <img src="assets/images/<?php echo $item['icono']; ?>" alt="<?php echo $item['nombre']; ?>">
                            <div class="container-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <?php if(isset($item['destacado']) && $item['destacado']): ?>
                                <div class="badge-destacado">DESTACADO</div>
                            <?php endif; ?>
                        </div>

                        <div class="content">
                            <span class="location">
                                <i class="fa-solid fa-map-pin"></i>
                                <?php echo $item['ubicacion'] ?? 'Ubicación no disponible'; ?>
                            </span>

                            <h3 class="service-title"><?php echo $item['nombre']; ?></h3>

                            <div class="details">
                                <span class="capacity-person">
                                    <i class="fa-solid fa-user-group"></i>
                                    <?php echo $item['capacidad'] ?? 'No especificado'; ?> personas
                                </span>

                                <span class="time">
                                    <i class="fa-solid fa-clock"></i>
                                    <?php echo $item['duracion'] ?? 'Duración no disponible'; ?>
                                </span>
                            </div>

                            <div class="reviews">
                                <span class="stars">
                                    <?php 
                                    $rating = $item['estrellas'] ?? 5; 
                                    for ($i = 0; $i < $rating; $i++): ?>
                                        <i class="fa-solid fa-star"></i>
                                    <?php endfor; ?>
                                </span>
                                <span class="reviews"> 
                                 Reseña:   <?php echo $item['resena'] ?? '1'; ?> 
                                </span>
                            </div>

                            <p class="price">$<?php echo number_format($item['precio'] ?? 0, 2); ?></p>

                            <div class="card-actions">
                                <a href="#" class="btn btn-info">
                                    <i class="fa-regular fa-bookmark"></i> Guardar
                                </a>
                                <a href="<?= base_url() ?>Welcome/consultar_producto/<?= $item['Id'] ?>" class="btn btn-reserve">
                                    <i class="fa-solid fa-eye"></i> Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-services">
                    <i class="fa-solid fa-info-circle"></i>
                    <p>Actualmente no hay servicios disponibles</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>