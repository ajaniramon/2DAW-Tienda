
function deleteCategoria(categoria){
	
  $.ajax({
       url: './server/dao/categoriadao.php',
       type: 'POST',
       data: {'categoria':categoria},
       success: function(data){
    	 swal("¡Olé!",data,"success");
      $('#jqGridCategorias').trigger( 'reloadGrid' );
         	},
       error: function(data){
          swal("¡Ups!",data.responseText,"error");
       }
     });
}
function abrirFormularioInsertCategoria(){
  $('#modalCategoriaI').modal("show");
  $('#insertarCategoriaBT').on('click',insertCategoria);
}
function insertCategoria(){
  if ($('#nombreCategoriaTFI').val() == "" || $('#nombreCategoriaTFI').val() == null) {
    swal("Rellena todos los campos.");
  }else{
    var categoria = new Object();
  
    categoria.nombre = $('#nombreCategoriaTFI').val();
    categoria.accion = "i";
    var categoriaJson = JSON.stringify(categoria);
    

      $.ajax({
       url: './server/dao/categoriadao.php',
       type: 'POST',
       data: {'categoria':categoriaJson},
       success: function(data){
       swal("¡Olé!",data,"success");
       $('#jqGridCategorias').trigger( 'reloadGrid' );
       $('#modalCategoriaI').modal("hide");
          },
       error: function(data){
          swal("¡Ups!",data.responseText,"error");
       }
     });
  }
}

function abrirFormularioUpdateCategoria(){
  $('#modalCategoriaU').modal("show");
  $('#actualizarCategoriaBT').on('click',updateCategoria);
}

function updateCategoria(){
  var categoria = new Object();
  categoria.nombre = $('#nombreCategoriaTFU').val();
  categoria.idCategoria = $(this).attr('idCategoria');
  categoria.accion = "a";
  var categoriaJson = JSON.stringify(categoria);

  $.ajax({
       url: './server/dao/categoriadao.php',
       type: 'POST',
       data: {'categoria':categoriaJson},
       success: function(data){
          swal("¡Olé!",data,"success");
          $('#jqGridCategorias').trigger( 'reloadGrid' );
          $('#modalCategoriaU').modal("hide");
          },
       error: function(data){
          swal("¡Ups!",data.responseText,"error");
       }
     });

}