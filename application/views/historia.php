<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div class="container-fluid bg-grey" id="historia">
    <!-- Conexión a CSS -->
    <link href="<?=base_url()?>assets/css/historia.css" rel="stylesheet" type="text/css">
    
       <!-- Conexión a JS -->
       <script src="<?=base_url()?>assets/js/historia.js" type="text/javascript"></script>
    
    <div class="row slideanim">
        <?php if (!empty($historia)): ?>
            <?php 
                $section_ids = [
                    'Nosotros' => 'nosotros',
                    'Historia de la Empresa' => 'historia-empresa',
                    'Estructura Organizacional' => 'estructura-organizacional',
                    'Valores' => 'valores',
                ];
                foreach ($historia as $item): 
                    $section_id = isset($section_ids[$item['nombre']]) ? $section_ids[$item['nombre']] : 'seccion-general';
            ?>
                <div class="col-md-8 col-md-offset-2 text-center section-container" id="<?= $section_id; ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><?= htmlspecialchars($item['nombre']); ?></h3>
                        </div>
                        <div class="panel-body">
                            <img src="<?= base_url('assets/images/' . $item['Imagen']); ?>" 
                                 class="img-responsive center-block" 
                                 alt="Imagen de <?= htmlspecialchars($item['nombre']); ?>" 
                                 style="max-width: 300px; margin-bottom: 20px;">
                            <p style="font-size: 16px; line-height: 1.8; text-align: justify; padding: 0 15px;">
                                <?= LimpiaCadena($item['descripcion']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12 text-center">
                <div class="logo-small">
                    <span class="glyphicon glyphicon-info-sign"></span>
                </div>
                <h4>No hay historias disponibles en este momento.</h4>
            </div>
        <?php endif; ?>
    </div>
</div>