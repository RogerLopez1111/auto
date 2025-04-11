<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Vehículo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="<?=base_url()?>assets/css/caracteristicas.css" rel="stylesheet">
</head>
<body>
    <div class="product-wrapper">
        <?php if (!empty($caracteristicas)): ?>
            <?php foreach ($caracteristicas as $item): ?>
                <div class="vehicle-card">
                    <!-- Encabezado -->
                    <div class="vehicle-header">
                        <h1 class="vehicle-title"><?php echo $item->nombre; ?></h1>
                        <div class="price-tag">
                            <span class="price"><?php echo $item->descripcion; ?></span>
                            <span class="per-day"></span>
                        </div>
                    </div>

                    <!-- Galería -->
                    <div class="gallery-container">
                        <div class="main-image">
                            <img src="<?=base_url()?>assets/images/<?php echo $item->Fot1; ?>" alt="<?php echo $item->nombre; ?>">
                        </div>
                        <div class="thumbnails">
                            <?php for ($i = 2; $i <= 5; $i++): ?>
                                <img src="<?=base_url()?>assets/images/<?php echo $item->{'Fot'.$i}; ?>" 
                                     alt="<?php echo $item->nombre; ?>" 
                                     class="thumbnail">
                            <?php endfor; ?>
                        </div>
                    </div>

                    <!-- Especificaciones -->
                    <div class="specs-container">
                        <div class="specs-grid">
                            <div class="spec-item">
                                <i class="bi bi-palette"></i>
                                <div>
                                    <div class="spec-label">Color</div>
                                    <div class="spec-value"><?php echo $item->color; ?></div>
                                </div>
                            </div>
                            <div class="spec-item">
                                <i class="bi bi-people-fill"></i>
                                <div>
                                    <div class="spec-label">Pasajeros</div>
                                    <div class="spec-value"><?php echo $item->capacidad; ?></div>
                                </div>
                            </div>
                            <div class="spec-item">
                                <i class="bi bi-car-front"></i>
                                <div>
                                    <div class="spec-label">Tipo</div>
                                    <div class="spec-value"><?php echo $item->tipo; ?></div>
                                </div>
                            </div>
                            <div class="spec-item">
                                <i class="bi bi-speedometer2"></i>
                                <div>
                                    <div class="spec-label">Tiempo</div>
                                    <div class="spec-value"><?php echo $item->duracion ?? '10:00:00'; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="description-box">
                        <h3><i class="bi bi-card-text"></i> Descripción</h3>
                        <p><?php echo $item->resena; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-vehicles">
                <i class="bi bi-exclamation-triangle"></i>
                <p>No hay vehículos disponibles</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="<?=base_url()?>assets/js/caracteristicas.js"></script>
</body>
</html>