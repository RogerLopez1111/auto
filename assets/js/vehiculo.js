$(document).ready(function() {
    // Inicializar el valor del rango de precio
    updatePriceValue();
    
    // Evento para el rango de precio
    $('#filter-price').on('input', function() {
        updatePriceValue();
        filterVehicles();
    });
    
    // Eventos para los demás filtros
    $('#global-search, #search-type, #filter-category, #filter-type, #filter-color, #filter-capacity').on('change keyup', function() {
        filterVehicles();
    });
    
    // Evento para el botón de búsqueda
    $('#search-btn').click(function() {
        filterVehicles();
    });
    
    // Evento para el botón de limpiar filtros
    $('#reset-filters').click(function() {
        resetFilters();
    });
    function updatePriceValue() {
        const price = $('#filter-price').val();
        $('#price-value').text(`Hasta $${parseFloat(price).toLocaleString()}/día`);
    }

    function resetFilters() {
        $('#global-search').val('');
        $('#search-type').val('any');
        $('#filter-category').val('');
        $('#filter-type').val('');
        $('#filter-color').val('');
        $('#filter-capacity').val('');
        $('#filter-price').val(150000);
        updatePriceValue();
        
        // Mostrar todos los vehículos y categorías
        $('.card-vehiculo').removeClass('hidden');
        $('.categoria-section').show();
        
        // Cerrar el modal si está abierto
        $('#noResultsModal').modal('hide');
    }
    function filterVehicles() {
        const searchTerm = $('#global-search').val().toLowerCase().trim();
        const searchType = $('#search-type').val();
        const category = $('#filter-category').val();
        const type = $('#filter-type').val();
        const color = $('#filter-color').val();
        const capacity = $('#filter-capacity').val();
        const maxPrice = parseFloat($('#filter-price').val());
        
        let visibleCount = 0;
        let anyCategoryVisible = false;
        const visibleCategories = new Set();
        
        // Primero mostrar todos los vehículos
        $('.card-vehiculo').removeClass('hidden');
        
        // Aplicar filtros
        $('.card-vehiculo').each(function() {
            const card = $(this);
            const cardCategory = card.data('category');
            const cardType = card.data('type');
            const cardColor = card.data('color');
            const cardCapacity = card.data('capacity');
            const cardPrice = parseFloat(card.data('price'));
            const cardSearchText = card.data('search');
            
            let matches = true;
            
            // Filtro por categoría
            if (category && cardCategory !== category) {
                matches = false;
            }
            
            // Filtro por tipo
            if (type && cardType !== type) {
                matches = false;
            }
            
            // Filtro por color
            if (color && cardColor !== color) {
                matches = false;
            }
            
            // Filtro por capacidad
            if (capacity && cardCapacity !== capacity) {
                matches = false;
            }
            
            // Filtro por precio
            if (cardPrice > maxPrice) {
                matches = false;
            }
            
            // Filtro por búsqueda de texto
            if (searchTerm) {
                if (searchType === 'any') {
                    const terms = searchTerm.split(' ');
                    let termMatch = false;
                    for (const term of terms) {
                        if (term && cardSearchText.includes(term)) {
                            termMatch = true;
                            break;
                        }
                    }
                    matches = matches && termMatch;
                } else if (searchType === 'phrase') {
                    const terms = searchTerm.split(' ');
                    let allTermsMatch = true;
                    for (const term of terms) {
                        if (term && !cardSearchText.includes(term)) {
                            allTermsMatch = false;
                            break;
                        }
                    }
                    matches = matches && allTermsMatch;
                } else if (searchType === 'exact') {
                    matches = matches && cardSearchText.includes(searchTerm);
                }
            }
            
            if (!matches) {
                card.addClass('hidden');
            } else {
                visibleCount++;
                visibleCategories.add(card.closest('.categoria-section').attr('id'));
            }
        });
        
        // Manejar visibilidad de secciones
        $('.categoria-section').each(function() {
            const section = $(this);
            const hasVisibleCards = section.find('.card-vehiculo:not(.hidden)').length > 0;
            
            if (hasVisibleCards) {
                section.show();
                anyCategoryVisible = true;
            } else {
                section.hide();
            }
        });
        
        // Mostrar todas las categorías si no hay filtros activos
        const noFiltersActive = !category && !type && !color && !capacity && 
                               maxPrice >= 150000 && !searchTerm;
        
        if (noFiltersActive) {
            $('.categoria-section').show();
            anyCategoryVisible = true;
        }
        
        // Mostrar mensaje si no hay resultados
        if (visibleCount === 0 && !noFiltersActive) {
            $('#noResultsModal').modal('show');
        } else {
            $('#noResultsModal').modal('hide');
        }
    }
});