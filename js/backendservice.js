/* Categorias */ 
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

/* Articulos */

function deleteArticulo(articulo){
  $.ajax({
         url: './server/dao/articulodao.php',
       type: 'POST',
       data: {'articulo':articulo},
       success: function(data){
       swal("¡Olé!",data,"success");
      $('#jqGridArticulos').trigger('reloadGrid');
          },
       error: function(data){
          swal("¡Ups!",data.responseText,"error");
       }
     });
}


function abrirFormularioInsertArticulo(){
   $.ajax({
       url: './server/categorias.php',
       dataType: 'json',
       success: function(data){
         $.each(data, function(){
          $('#categoriaSLI').append("<option value='" + this.id + "'>" + this.nombre +"</option>");
         });
       }
     });
  $('#modalArticuloI').modal("show");
  $('#insertarArticuloBT').on('click',insertArticulo);
}

function insertArticulo(){
 var valid = true;
 if ($('#nombreArticuloTFI').val() == "") {valid = false;}; 
 if ($('#descripcionArticuloTFI').val() == "") {valid = false;};
 if ($('#precioArticuloTFI').val() == "") {valid = false;};
 if ($('#stockArticuloTFI').val() == "") {valid = false;};
 if ($('#imagenI').val() == "") {valid = false;};

 var nombre = $('#nombreArticuloTFI').val();
 var descripcion = $('#descripcionArticuloTFI').val();
 var precio = $('#precioArticuloTFI').val();
 var stock = $('#stockArticuloTFI').val();
 var imagen = $('#imagenI').val();
 var categoria = document.getElementById('categoriaSLI').options[document.getElementById('categoriaSLI').selectedIndex].value;
  if (!valid) {swal("Rellena todos los campos.");}else{

    var articulo = new Object();
    articulo.nombre = nombre;
    articulo.descripcion = descripcion;
    articulo.precio = precio;
    articulo.stock = stock;
    articulo.imagen = imagen;
    articulo.categoria = categoria;
    articulo.accion = "i";

    var articuloJson = JSON.stringify(articulo);
    $.ajax({
       url: './server/dao/articulodao.php',
       type: 'POST',
       data: {'articulo':articuloJson},
       success: function(data){
          alert(data);
          
          
          },
       error: function(data){
          swal("¡Ups!",data.responseText,"error");
       }
     });
  }




}