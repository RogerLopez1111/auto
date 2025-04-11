<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->

 <!-- Conexión a CSS -->
  <link href="<?=base_url()?>assets/css/requerimientos.css" rel="stylesheet" type="text/css">
  <!-- Conexión a JS -->
  <script src="<?=base_url()?>assets/js/requerimientos.js" type="text/javascript"></script>
  

  <?php if (!empty($requisitos)): ?>
<div class="premium-requirements-container">
    <div class="premium-header">
        <h2><i class="fas fa-car-alt"></i> Requisitos para Renta de Vehículos</h2>
        <div class="header-detail"></div>
    </div>
    
    <div class="premium-table-container">
        <table class="premium-requirements-table">
            <thead>
                <tr>
                    <th><i class="fas fa-car-side"></i> Vehículo</th>
                    <th><i class="fas fa-user-tie"></i> Edad</th>
                    <th><i class="fas fa-passport"></i> Identificación</th>
                    <th><i class="fas fa-id-card-alt"></i> Licencia</th>
                    <th><i class="fas fa-hand-holding-usd"></i> Depósito</th>
                    <th><i class="fas fa-file-signature"></i> Contrato</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requisitos as $item): ?>
                <tr class="premium-row">
                    <td data-label="Vehículo"><i class="fas fa-car"></i> <?= LimpiaCadena($item['medio_transporte']) ?></td>
                    <td data-label="Edad"><i class="fas fa-birthday-cake"></i> <?= LimpiaCadena($item['edad_minima']) ?></td>
                    <td data-label="Identificación"><i class="fas fa-id-card"></i> <?= LimpiaCadena($item['identificacion_oficial']) ?></td>
                    <td data-label="Licencia"><i class="fas fa-id-badge"></i> <?= LimpiaCadena($item['licencia_requerida']) ?></td>
                    <td data-label="Depósito"><i class="fas fa-money-bill-wave"></i> <?= LimpiaCadena($item['deposito']) ?></td>
                    <td data-label="Contrato"><i class="fas fa-file-contract"></i> <?= LimpiaCadena($item['contrato']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="premium-footer">
        <div class="brand-logo">
            <i class="fas fa-car"></i>
            <span>RENTA PREMIUM</span>
        </div>
    </div>
</div>
<?php else: ?>
<div class="premium-no-requirements">
    <div class="empty-garage">
        <i class="fas fa-car-crash"></i>
        <h3>No hay requisitos disponibles</h3>
        <p>Por favor consulta más tarde</p>
        <div class="garage-light"></div>
    </div>
</div>
<?php endif; ?>