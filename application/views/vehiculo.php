
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->


<div class="container-fluid bg-grey" id="historia">
    <!-- Conexión a CSS -->
    <link href="<?=base_url()?>assets/css/vehiculos.css" rel="stylesheet" type="text/css">
    
    <!-- Conexión a JS -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/vehiculo.js" type="text/javascript"></script>

    <!-- Barra de búsqueda y filtros -->
    <div class="row">
        <div class="col-md-12">
            <div class="search-filter-container">
                <!-- Barra de búsqueda principal -->
                <div class="search-box">
                    <input type="text" id="global-search" placeholder="Buscar vehículos...">
                    <button id="search-btn"><i class="fa fa-search"></i></button>
                    <select id="search-type">
                        <option value="any">Cualquier palabra</option>
                        <option value="phrase">Frase completa</option>
                        <option value="exact">Frase exacta</option>
                    </select>
                </div>
                
                <!-- Filtros avanzados -->
                <div class="filter-section">
                    <div class="filter-dropdown">
                        <select id="filter-category">
                            <option value="">Todas las categorías</option>
                            <?php 
                            $unique_categories = [];
                            foreach ($vehiculo as $item) {
                                $cat = htmlspecialchars(LimpiaCadena($item['Categoria']), ENT_QUOTES, 'UTF-8');
                                if (!in_array($cat, $unique_categories)) {
                                    $unique_categories[] = $cat;
                                    echo '<option value="'.strtolower($cat).'">'.$cat.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="filter-dropdown">
                        <select id="filter-type">
                            <option value="">Todos los tipos</option>
                            <?php 
                            $unique_types = [];
                            foreach ($vehiculo as $item) {
                                $type = htmlspecialchars(LimpiaCadena($item['Tipo_vehiculo']), ENT_QUOTES, 'UTF-8');
                                if (!in_array($type, $unique_types)) {
                                    $unique_types[] = $type;
                                    echo '<option value="'.strtolower($type).'">'.$type.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="filter-dropdown">
                        <select id="filter-color">
                            <option value="">Todos los colores</option>
                            <?php 
                            $unique_colors = [];
                            foreach ($vehiculo as $item) {
                                $color = htmlspecialchars(LimpiaCadena($item['Color']), ENT_QUOTES, 'UTF-8');
                                if (!in_array($color, $unique_colors)) {
                                    $unique_colors[] = $color;
                                    echo '<option value="'.strtolower($color).'">'.$color.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="filter-dropdown">
                        <select id="filter-capacity">
                            <option value="">Cualquier capacidad</option>
                            <option value="2">2 pasajeros</option>
                            <option value="4">4 pasajeros</option>
                            <option value="5">5 pasajeros</option>
                            <option value="7">7 pasajeros</option>
                        </select>
                    </div>
                    
                    <div class="filter-dropdown">
                        <input type="range" id="filter-price" min="0" max="160000" step="1000" value="30000">
                        <span id="price-value">Hasta $30,000/día</span>
                    </div>

                    <button id="reset-filters" class="btn btn-clear">Limpiar filtros</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Resultados -->
    <div class="row">
        <div class="col-md-12" id="vehiculos-container">
            <?php if (!empty($vehiculo)): ?>
                <?php 
                    $vehiculos_por_categoria = [];
                    foreach ($vehiculo as $item) {
                        $categoria = htmlspecialchars(LimpiaCadena($item['Categoria']), ENT_QUOTES, 'UTF-8');
                        $vehiculos_por_categoria[$categoria][] = $item;
                    }
                ?>

                <?php foreach ($vehiculos_por_categoria as $categoria => $items): ?>
                    <div class="categoria-section" id="<?= strtolower(str_replace(' ', '-', $categoria)); ?>">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3><?= $categoria; ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-cards-vehiculos">
                                    <?php foreach ($items as $item): ?>
                                        <div class="card-vehiculo" 
                                             data-category="<?= strtolower(htmlspecialchars(LimpiaCadena($item['Categoria']), ENT_QUOTES, 'UTF-8')); ?>"
                                             data-type="<?= strtolower(htmlspecialchars(LimpiaCadena($item['Tipo_vehiculo']), ENT_QUOTES, 'UTF-8')); ?>"
                                             data-color="<?= strtolower(htmlspecialchars(LimpiaCadena($item['Color']), ENT_QUOTES, 'UTF-8')); ?>"
                                             data-capacity="<?= htmlspecialchars(LimpiaCadena($item['Capacidad']), ENT_QUOTES, 'UTF-8'); ?>"
                                             data-price="<?= htmlspecialchars(LimpiaCadena($item['Precio']), ENT_QUOTES, 'UTF-8'); ?>"
                                             data-search="<?= strtolower(htmlspecialchars(LimpiaCadena($item['Marca'].' '.$item['Modelo'].' '.$item['Anio'].' '.$item['Color'].' '.$item['Categoria']), ENT_QUOTES, 'UTF-8')); ?>">
                                            <div class="container-img">
                                                <img src="<?= base_url('assets/images/' . LimpiaCadena($item['Imagen'])); ?>" 
                                                     alt="<?= htmlspecialchars(LimpiaCadena($item['Marca'] . ' ' . $item['Modelo']), ENT_QUOTES, 'UTF-8'); ?>"
                                                     loading="lazy">
                                            </div>
                                            <div class="content">
                                                <h4 class="vehicle-title">
                                                    <?= htmlspecialchars(LimpiaCadena($item['Marca'] . ' ' . $item['Modelo'] . ' ' . $item['Anio']), ENT_QUOTES, 'UTF-8'); ?>
                                                </h4>
                                                <div class="details">
                                                    <span>
                                                        <i class="fa-solid fa-palette"></i>
                                                        <?= htmlspecialchars(LimpiaCadena($item['Color'])); ?>
                                                    </span>
                                                    <span>
                                                        <i class="fa-solid fa-users"></i>
                                                        <?= htmlspecialchars(LimpiaCadena($item['Capacidad'])); ?>
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
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal para búsqueda sin resultados -->
<div class="modal fade" id="noResultsModal" tabindex="-1" role="dialog" aria-labelledby="noResultsModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="noResultsModalLabel">Sin resultados</h4>
            </div>
            <div class="modal-body">
                No se encontraron vehículos que coincidan con tus criterios de búsqueda.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>