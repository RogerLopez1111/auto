document.addEventListener('DOMContentLoaded', function() {
    // Efecto de movimiento suave al pasar el mouse
    const rows = document.querySelectorAll('.premium-row');
    
    rows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.transition = 'all 0.3s ease-out';
        });
        
        row.addEventListener('mouseleave', () => {
            row.querySelectorAll('td').forEach(td => {
                td.style.transform = '';
                td.style.boxShadow = '';
            });
        });
    });
    
    // Efecto de iluminación para el encabezado
    const header = document.querySelector('.premium-header');
    if (header) {
        header.addEventListener('mousemove', (e) => {
            const x = e.pageX - header.offsetLeft;
            const y = e.pageY - header.offsetTop;
            
            header.style.background = `radial-gradient(circle at ${x}px ${y}px, 
                rgba(255, 215, 0, 0.2), 
                rgba(0, 26, 51, 0.8))`;
        });
        
        header.addEventListener('mouseleave', () => {
            header.style.background = 'rgba(0, 0, 0, 0.2)';
        });
    }
    
    // Efecto de luz intermitente para "no requirements"
    const garageLight = document.querySelector('.garage-light');
    if (garageLight) {
        setInterval(() => {
            const opacity = Math.random() * 0.1 + 0.05;
            garageLight.style.opacity = opacity;
        }, 3000);
    }
});