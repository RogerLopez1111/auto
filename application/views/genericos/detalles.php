<script>

function consultar_producto(id){
//alert(id);
   var pagina='<?=base_url()?>Welcome/traer_producto';
   $.ajax({
      url:pagina,
      type: 'POST',
      data:{"id":id},
      success: function(data){
      $("#detalle").html(data);
      //console.log(data);
    },

    error: function(data){
    console.log(data);
    }
  }); 
 }

</script>

