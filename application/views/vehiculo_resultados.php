<?php if (!empty($vehiculo)): ?>
    <?php 
        $vehiculos_por_categoria = [];
        foreach ($vehiculo as $item) {
            $categoria = htmlspecialchars($item['Categoria'], ENT_QUOTES, 'UTF-8');
            $vehiculos_por_categoria[$categoria][] = $item;
        }
    ?>

    <?php foreach ($vehiculos_por_categoria as $categoria => $items): ?>
        <div class="col-md-12" id="<?= strtolower(str_replace(' ', '-', $categoria)); ?>">
            <div class="panel">
                <div class="panel-heading">
                    <h3><?= $categoria; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="container-cards-vehiculos">
                        <?php foreach ($items as $item): ?>
                            <div class="card-vehiculo">
                                <div class="container-img">
                                    <img src="<?= base_url('assets/images/' . $item['Imagen']); ?>" 
                                         alt="<?= htmlspecialchars($item['Marca'] . ' ' . $item['Modelo'], ENT_QUOTES, 'UTF-8'); ?>"
                                         loading="lazy">
                                </div>
                                <div class="content">
                                    <h4 class="vehicle-title">
                                        <?= htmlspecialchars($item['Marca'] . ' ' . $item['Modelo'] . ' ' . $item['Anio'], ENT_QUOTES, 'UTF-8'); ?>
                                    </h4>
                                    <div class="details">
                                        <span>
                                            <i class="fa-solid fa-palette"></i>
                                            <?= htmlspecialchars($item['Color']); ?>
                                        </span>
                                        <span>
                                            <i class="fa-solid fa-users"></i>
                                            <?= htmlspecialchars($item['Capacidad']); ?>
                                        </span>
                                    </div>
                                    <div class="reviews">
                                        <span class="stars">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <i class="fa-solid fa-star"></i>
                                            <?php endfor; ?>
                                        </span>
                                        <span class="count-reviews">15 Reseñas</span>
                                    </div>
                                    <p class="price">$<?= number_format($item['Precio'], 2); ?>/día</p>
                                    <div class="card-actions">
                                        <button class="btn btn-info">Info</button>
                                        <button class="btn btn-reserve">Reservar</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-md-12">
        <div class="alert alert-info">No se encontraron vehículos con los filtros seleccionados.</div>
    </div>
<?php endif; ?>