function mostrarArticulos(){

       var categoria = $(this).attr('id');
       $.ajax({
           url:'articulos.php',
           type: 'POST',
           dataType: 'json',
           data: {categoria: +categoria},
           success: function(data){
               $('#productos').html(null);
              $.each(data,function(){

               var articulo = new Articulo(this.id,this.nombre,this.descripcion,this.precio,this.imagen,this.categoria);
               articulos.push(articulo);
               var idArticulo = "articulo"+articulo.id;
               var imagen = "./img/"+articulo.imagen;
               var imagenHTML = '<img height="150" width="320" class="articuloImagen" src='+imagen+'>'+'</img>';
               $('<div class="col-sm-4 col-lg-4 col-md-4 articulo" id='+idArticulo+'>').appendTo('#productos').append('<div class="thumbnail">'+ imagenHTML +'</div>').append('<p class="text-center"><strong>'+articulo.nombre+'</strong></p>').append('<p class="text-center"><strong>'+articulo.descripcion+'</strong></p>').append('<p class="pull-right"><strong>Precio: '+articulo.precio+'€'+'</strong></p>').append('<button class="botonCarrito" idArticulo='+articulo.id+'> AÑADIR AL CARRITO</button>');
              });
                $('.botonCarrito').on('click',toCarrito);
           }
       });
   }

   function toCarrito(){
       var articulo;
       var existe = false;

       for(var i = 0; i < articulos.length; i++){
           if(articulos[i].id == $(this).attr('idarticulo')){
               articulo = articulos[i];
           }
        }
       for(var i = 0;i<carrito.articulos.length;i++){
           if(carrito.articulos[i].id == articulo.id){
               existe = true;
           }
       }
       if (existe) {
           alert("El artículo ya existe.");
       }else{
           carrito.addArticulo(articulo);
       }
         }

   $(document).ready(function(){
       carrito = new Carrito(1); //RAMON: dejar esta linea tranquila. bueno, y todas las demás.
       articulos = new Array();
           $.ajax({
             url: 'categorias.php',
             dataType: 'json',
             success: function(data){
               $.each(data, function(){
                 $('<a href="#" class="list-group-item categoria" id='+ this.id +  '>' + this.nombre + '</a>').appendTo('#categorias');
               });
             }
           });

           $('#categorias').on("click",'.list-group-item',mostrarArticulos);

           $('#productos').html(null); //RAMON:cuando toque mostrar los productos TOP esta línea será la que tengamos que cambiar.
  });
