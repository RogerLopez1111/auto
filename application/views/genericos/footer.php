<!-- INICIA FOOTER -->
<footer class="footer">
    <div class="container container-footer">
        <div class="menu-footer">
            <?php if (!empty($footer)): ?>
                <div class="contact-info">
                    <p class="title-footer">Información de Contacto</p>
                    <ul>
                        <?php foreach ($footer as $item): ?>
                            <?php if ($item['telefono']): ?>
                                <li><?= LimpiaCadena($item['nombre']); ?></li>
                                <li><?= LimpiaCadena($item['telefono']); ?></li>
                                <li><?= LimpiaCadena($item['email']); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <br>
                <br>

                <div class="social-icons">
                    <?php foreach ($footer as $item): ?>
                        <?php if ($item['icono']): ?>
                            <span class="<?= LimpiaCadena(strtolower($item['nombre'])); ?>"> 
                                <i class="<?= LimpiaCadena($item['icono']); ?>"></i>
                            </span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <br><br>
                <div class="copyright">
                    <?php foreach ($footer as $item): ?>
                        <?php if ($item['lema']): ?>
                            <p><?= LimpiaCadena($item['lema']); ?></p>
                        <?php endif; ?>

                        <?php if ($item['imagen']): ?>
                            <img src="<?= base_url('assets/images/' . LimpiaCadena($item['imagen'])); ?>" alt="Métodos de pago">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h4>No hay información disponible en este momento.</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>
</footer>
</body>
</html>


<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
 