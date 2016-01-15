function mostrarArticulos(){
       var contador = 0;
       var categoria = $(this).attr('id');
       var nombreCategoria = $(this).text();
       $.ajax({
           url:'articulos.php',
           type: 'POST',
           dataType: 'json',
           data: {categoria},
           success: function(data){
               $('#productos').html(null);
               $('<h3><strong>'+nombreCategoria+'</strong></h3>').appendTo('#productos');
               $('<div id="articulos" class="row"></div>').appendTo('#productos');
               $.each(data,function(){
                 var articulo = new Articulo(this.id,this.nombre,this.descripcion,this.precio,this.imagen,this.categoria,0);
                 articulos.push(articulo);
                 var idArticulo = "articulo"+articulo.id;
                 var imagen = "./img/"+articulo.imagen;
                 var imagenHTML = '<img height="150" width="320" class="articuloImagen" src='+imagen+'>'+'</img>';
                 $('<div class="col-sm-4 col-lg-4 col-md-4 articulo" id='+idArticulo+'>').appendTo('#articulos').append('<div class="thumbnail">'+ imagenHTML +'</div>').append('<p class="titulo text-center" style="font-size: 16px;"><strong>'+articulo.nombre+'</strong></p>').append('<p class="descripcion text-justify">'+articulo.descripcion+'</p>').append('<p class="precio pull-right"><strong>Precio: '+articulo.precio+'€'+'</strong></p>').append('<button class="botonCarrito btn btn-success" idArticulo='+articulo.id+'> AÑADIR AL CARRITO</button>');
                 contador++;
                 if (contador == 3){
                   $('<div class="clearfix visible-lg"></div>').appendTo('#articulos');
                   contador = 0;
                 }
               });

              /*Modificando
              --------------------------------------------------------------*/
              $('.botonCarrito').on('click', function(){

                $('.anyadir').attr('idarticulo',$(this).attr('idArticulo'));
                texto="";
                texto+="<strong>" + $(this).parent().find('.titulo').text() + "</strong><br>";
                texto+="<strong>" + $(this).parent().find('.precio').text() + "</strong><br><br>";
                texto+="<strong>Descripcion: </strong>" + $(this).parent().find('.descripcion').text();
                $('#modalArticulo').modal('show');
                $('.modal-body').html(texto);
              });
            }
          });
   }

   function mostrarCarrito(){
   	var carritoHTML = "";
    carritoHTML += "<table class='table table-hover'>";
    carritoHTML += "<thead><tr><th>Producto</th><th>Cantidad</th><th class='text-center'>Precio</th><th class='text-center'>Total</th><th></th></tr></thead>";
    carritoHTML += "<tbody>"
   	var total = 0;
   	$.each(carrito.articulos,function(){
      /*    --------->>>  MEJORANDO ASPECTO DEL CARRITO*/
      //<div class='container'><div class='row'><div class='col-sm-12 col-md-10 col-md-offset-1'></div></div></div><div class='media-body'></div>
      carritoHTML += "<tr><td class='col-sm-8 col-md-6'><div class='media'><a class='thumbnail pull-left miniatura'><img class='media-object' src='./img/"+this.imagen+"' ></a>";
      carritoHTML += "<div><h4 class='media-heading'>"+this.nombre+"</h4></div></div></td>";
      carritoHTML += "<td><button class='btn btn-danger botonBorrarCarrito' idarticulo="+this.id +"> - </button>&nbsp;<input readonly class='text-center' type='text' size='3' value='"+this.cantidad+"'>&nbsp;<button class='btn btn-info botonAgregarCarrito' idarticulo="+this.id+"> + </button></td>";
      carritoHTML += "<td class='text-center'>"+this.precio+"€</td>";
      carritoHTML += "<td class='text-center'>"+(this.precio * this.cantidad)+"€</td>";
      carritoHTML += "<td><button class='btn btn-danger botonBorrarArticuloCarrito' idarticulo="+this.id+"><span class='glyphicon glyphicon-remove'></span> Borrar</button></td></tr>";
    });
   	for(var i = 0; i < carrito.articulos.length; i++){
   		total += carrito.articulos[i].precio * carrito.articulos[i].cantidad;
   	}
    //carritoHTML += "<strong><p>" + "Total: " + total + "€</p></strong>";
    carritoHTML += "<tr><td></td><td></td><td><h4>Total:</h4></td><td class='text-center'><h4><strong>"+total+"€</strong></h4></td><td></td></tr>";
    carritoHTML += "</tbody></table>";

   	$('#modalCarrito').modal('show');
    $('#cuerpoCarrito').html(carritoHTML);
    $('.botonBorrarCarrito').on('click',borrarFromCarrito);
    $('.botonAgregarCarrito').on('click',sumarFromCarrito);
    $('.botonBorrarArticuloCarrito').on('click',borrarArticuloCarrito);
  }

   function borrarFromCarrito(){
   	var index = $(this).attr('idarticulo');
   	for(var i=0; i < carrito.articulos.length; i++){
   		if(carrito.articulos[i].id == index){
			  carrito.articulos[i].cantidad--;
  			if (carrito.articulos[i].cantidad < 1) {
          carrito.articulos.splice(i,1);
  			}
      }
   	}
   	mostrarCarrito();
   }

   function borrarArticuloCarrito(){
     var index = $(this).attr('idarticulo');
     for (var i = 0; i < carrito.articulos.length; i++) {
       if (carrito.articulos[i].id == index) {
         carrito.articulos.splice(i,1);
       }
     }
     mostrarCarrito();
   }


   function sumarFromCarrito(){
   	var index = $(this).attr('idarticulo');
   	for(var i = 0;i < carrito.articulos.length; i++){
   		if(carrito.articulos[i].id == index) {
        carrito.articulos[i].cantidad++;
      };
    }
   	mostrarCarrito();
   }


   function toCarrito(){
     var articulo;
     var existe = false;
     var indice;

     for(var i = 0; i < articulos.length; i++){
       if(articulos[i].id == $(this).attr('idarticulo')){
         articulo = articulos[i];
       }
     }
     for(var i = 0;i<carrito.articulos.length;i++){
       if(carrito.articulos[i].id == articulo.id){
         existe = true;
         indice = i;
       }
     }
     if(existe) {
       carrito.articulos[indice].cantidad++;
     } else{
     	articulo.cantidad = 1;
      carrito.addArticulo(articulo);
    }
   }

   function procesarCarrito() {
     // aquí hay que recoger los contenidos del carrito y guardarlos en un variable carrito (pasar a json en algun momento)
     $.ajax({
       url:'carrito.php',
       type: 'POST',
       dataType: 'json',
       data: {carrito},
       success: function(data) {

       }
     });
   }

   $(document).ready(function(){
     carrito = new Carrito(1);
     articulos = new Array();
     $.ajax({
       url: 'categorias.php',
       dataType: 'json',
       success: function(data){
         $.each(data, function(){
           $('<a class="list-group-item categoria sombreado" id='+ this.id +  '><i class="glyphicon glyphicon-arrow-down pull-left"></i>' + this.nombre + '<i class="glyphicon glyphicon-arrow-down pull-right"></i><i class="glyphicon glyphicon-forward flechas_derecha"></i></a>').appendTo('#categorias');
         });
       }
     });
     $('.anyadir').on("click", toCarrito);

     $('.comprar').on("click", procesarCarrito);

     $('#categorias').on("click",'.list-group-item',mostrarArticulos);

     $('#productos').html(null); //mostrar productos top.

     $('#verCarritoBT').on('click',mostrarCarrito);
  });
