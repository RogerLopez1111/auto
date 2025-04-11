   <!-- Conexión a CSS -->
    <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet" type="text/css">

<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
<div style="height: 15px;"></div> <!-- Espaciador -->
 
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="max-width: 800px; width: 100%;">
        <div class="row">
          <!-- Registro -->
<div class="col-md-6 border-end">
    <h3 class="text-center">Regístrate</h3>
    <form id="formRegistro" action="<?= site_url('form_usuarionuevo/crear') ?>" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
        </div>
 
        <div class="mb-3">
            <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required>
        </div>
 
        <div class="mb-3">
            <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required>
        </div>
 
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
 
        <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
 
        <div class="mb-3">
            <small class="text-muted">Ingresa fecha de nacimiento </small>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                   placeholder="Fecha de Nacimiento" required>
            
        </div>
 
        <div class="mb-3">
            <input type="text" class="form-control" name="edad" placeholder="Edad" required>
        </div>
 
        <div class="mb-3">
            <input type="text" class="form-control" name="direccion" placeholder="Dirección (calle)" required>
        </div>
 
        <div class="mb-3">
            <input type="text" class="form-control" name="codigo_postal" placeholder="Código Postal" required>
        </div>
 
        <div class="mb-3">
            <input type="password" class="form-control" name="password"
                   placeholder="Contraseña (mínimo 12 caracteres alfanuméricos)"
                   pattern="^(?=.*[A-Za-z])(?=.*\d).{12,}$"
                   title="La contraseña debe tener al menos 12 caracteres, incluyendo letras y números" required>
            <small class="form-text text-muted">Mínimo 12 caracteres, debe incluir letras y números</small>
        </div>
 
        <div class="d-grid">
            <button type="submit" class="btn btn-secondary">Crear cuenta</button>
        </div>
    </form>
    </div>
            <!-- Inicio de sesión -->
            <div class="col-md-6">
                <h3 class="text-center">Ingresa con tu cuenta</h3>
                <form action="<?= site_url('form_usuarionuevo/iniciar') ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
 
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
 
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
 
                    <div class="text-center mt-3">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div> 
<!-- Cierre del col-md-6 border-end -->
 
<!-- Scripts para el cálculo de edad -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fechaInput = document.getElementById('fecha_nacimiento');
    const edadInput = document.querySelector('input[name="edad"]');
    
    fechaInput.addEventListener('change', function() {
        if(!this.value) {
            edadInput.value = '';
            return;
        }
        
        const fechaNacimiento = new Date(this.value);
        const hoy = new Date();
        
        // Validar que la fecha no sea futura
        if(fechaNacimiento > hoy) {
            alert('La fecha de nacimiento no puede ser en el futuro');
            this.value = '';
            edadInput.value = '';
            return;
        }
        
        // Calcular edad
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        const mes = hoy.getMonth() - fechaNacimiento.getMonth();
        
        if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
            edad--;
        }
        
        // Asignar la edad al campo
        edadInput.value = edad;
    });
});
</script>
 