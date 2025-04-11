

/* ********************************** */
/*             Historia               */
/* ********************************** */

document.addEventListener('DOMContentLoaded', function() {
    // Scroll suave al hash
    const handleHashScroll = () => {
        if (window.location.hash) {
            setTimeout(() => {
                const hashValue = window.location.hash;
                const element = document.querySelector(hashValue);
                if (element) {
                    const headerOffset = 80;
                    const elementPosition = element.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }, 600);
        }
    };

    // Animaciones al hacer scroll
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.history-panel');
        const windowHeight = window.innerHeight;
        const triggerPoint = windowHeight / 5 * 4;
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            
            if (elementTop < triggerPoint) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };

    // Efecto parallax para las imágenes
    const parallaxEffect = () => {
        const images = document.querySelectorAll('.history-image');
        const scrollPosition = window.pageYOffset;
        
        images.forEach(image => {
            image.style.transform = `translateY(${scrollPosition * 0.03}px)`;
        });
    };

    // Inicialización
    handleHashScroll();
    animateOnScroll();
    window.addEventListener('scroll', () => {
        animateOnScroll();
        parallaxEffect();
    });
    
    // Efecto hover mejorado para paneles
    const panels = document.querySelectorAll('.history-panel');
    panels.forEach(panel => {
        panel.addEventListener('mouseenter', () => {
            panel.style.transform = 'translateY(-10px)';
            panel.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.25)';
        });
        
        panel.addEventListener('mouseleave', () => {
            panel.style.transform = 'translateY(-5px)';
            panel.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.2)';
        });
    });
});

/* ********************************** */
/*          Caracteristicas           */
/* ********************************** */

document.addEventListener('DOMContentLoaded', function() {
    // Efecto hover para las miniaturas
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.querySelector('.main-image img');
    
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            // Intercambiar imagen principal con la miniatura clickeada
            const tempSrc = mainImage.src;
            mainImage.src = this.src;
            this.src = tempSrc;
            
            // Efecto visual
            mainImage.parentElement.style.transform = 'scale(1.03)';
            setTimeout(() => {
                mainImage.parentElement.style.transform = 'scale(1)';
            }, 300);
        });
    });
    
    // Animación de aparición
    const vehicleCard = document.querySelector('.vehicle-card');
    if (vehicleCard) {
        vehicleCard.style.opacity = '0';
        vehicleCard.style.transform = 'translateY(20px)';
        vehicleCard.style.transition = 'all 0.5s ease';
        
        setTimeout(() => {
            vehicleCard.style.opacity = '1';
            vehicleCard.style.transform = 'translateY(0)';
        }, 100);
    }
    
    // Efecto hover para los ítems de especificaciones
    const specItems = document.querySelectorAll('.spec-item');
    specItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const icon = this.querySelector('i');
            icon.style.transform = 'scale(1.2)';
            icon.style.color = '#e74c3c';
        });
        
        item.addEventListener('mouseleave', function() {
            const icon = this.querySelector('i');
            icon.style.transform = 'scale(1)';
            icon.style.color = '#3498db';
        });
    });
});

/* ********************************** */
/*          BUSCADOR                  */
/* ********************************** */
document.addEventListener('DOMContentLoaded', function() {
    // Manejar el envío del formulario con AJAX para una experiencia más fluida
    const searchForm = document.querySelector('.search-form');
    
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const searchParams = new URLSearchParams(formData);
            
            fetch(`${baseUrl}busqueda?${searchParams.toString()}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                // Actualizar solo la sección de resultados
                document.querySelector('.container-fluid').innerHTML = html;
                
                // Scroll suave a los resultados
                document.querySelector('.container-fluid').scrollIntoView({
                    behavior: 'smooth'
                });
            })
            .catch(error => console.error('Error:', error));
        });
    }
    
    // Mostrar/ocultar filtros avanzados
    const toggleFiltersBtn = document.createElement('button');
    toggleFiltersBtn.className = 'btn-toggle-filters';
    toggleFiltersBtn.innerHTML = '<i class="fas fa-filter"></i> Filtros';
    
    const advancedFilters = document.querySelector('.advanced-filters');
    if (advancedFilters) {
        advancedFilters.style.display = 'none'; // Ocultar por defecto
        
        // Insertar el botón antes de los filtros
        advancedFilters.parentNode.insertBefore(toggleFiltersBtn, advancedFilters);
        
        toggleFiltersBtn.addEventListener('click', function() {
            if (advancedFilters.style.display === 'none') {
                advancedFilters.style.display = 'block';
                this.innerHTML = '<i class="fas fa-times"></i> Ocultar';
            } else {
                advancedFilters.style.display = 'none';
                this.innerHTML = '<i class="fas fa-filter"></i> Filtros';
            }
        });
    }
  });




