var articulos, carrito, total;

function mostrarArticulos(){
       $("#productos").fadeIn(1000);
       $(".carousel").fadeOut(500);
       var contador = 0;
       var categoria = $(this).attr('id');
       var nombreCategoria = $(this).text();
       $.ajax({
           url:'./server/articulos.php',
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
            },
            error:function(data){
              console.log(data.responseText);
            }
          });
   }

   function mostrarCarrito(){
   	var carritoHTML = "";
    carritoHTML += "<table class='table table-hover'>";
    carritoHTML += "<thead><tr><th>Producto</th><th>Cantidad</th><th class='text-center'>Precio</th><th class='text-center'>Total</th><th><p class='ocultar'>asd</p></th></tr></thead>";
    carritoHTML += "<tbody>"
   	total = 0;
   	$.each(carrito.articulos,function(){
      /*    --------->>>  MEJORANDO ASPECTO DEL CARRITO*/

      var idDrillDown = "capaDrillDown" + this.id;
      var idDrillDownDiv = "drillDown";


      //<div class='container'><div class='row'><div class='col-sm-12 col-md-10 col-md-offset-1'></div></div></div><div class='media-body'></div>
      carritoHTML += "<tr><td class='col-sm-8 col-md-6'><div class='media'><a class='thumbnail pull-left miniatura'><img class='media-object' src='./img/"+this.imagen+"' ></a>";
      carritoHTML += "<div><h4 class='media-heading'>"+"<a class='drill' id='"+idDrillDown+"'>"+this.nombre+"</h4>"+"</a>"+"</div></div><div class='"+idDrillDownDiv+"'><p id='"+idDrillDown+"P"+"'>"+this.descripcion+"</p></div></td>";
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
    $('.drillDown').hide();
    $('.drill').on("click",mostrarDescripcion);

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

function mostrarDescripcion(){
	var id = $(this).attr('id');
	var idParrafo ="#" +  id + "P";

	var desplegable = $(idParrafo).parent();
	$('.drillDown').not(desplegable).slideUp('fast');
	$(desplegable).slideToggle();
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
     // Añadimos el precio total y pasamos el carrito al servidor.
     carrito.total = total;
     var carritoJson = JSON.stringify(carrito);
     if (carrito.articulos.length < 1) {
       swal("Por favor, seleccione algún producto para comprar.");
     }
     else {
      if (typeof sesion === 'undefined') {
        swal({
          title: "Debes iniciar sesión para realizar una comprar.",
          text: "",
          type: "info",
          allowOutsideClick: true
        });
}else{
  $.ajax({
       url:'./server/carrito.php',
       type: 'POST',
       data: {'carrito':carritoJson},
       success: function(data) {
          swal({
            title: "Compra realizada satisfactoriamente!",
            text: "",
            type: "success",
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: true
          });
         carrito = new Carrito(1);

       }, error: function(data) {
         $("body").html(data.responseText);
       }
     });}
}

   }

function mostrarLogin(){

  $('#modalLogin').modal('show');
  $('#loginBT').on('click',login);
}

function login(){
  var email = $('#emailTF').val();
  var contrasenya = $('#passTF').val();
  var credencial = new Credencial(email,contrasenya);
  var credencialJson = credencial.toJson();
  var valid = true;

  if (email == "") {

    valid = false;
  }
  if (contrasenya == "") {

    valid = false;
  };

    if (valid) {
       $.ajax({
       url: './server/login.php',
       type: 'POST',
       data: {'credencial':credencialJson},
       success: function(data){
          swal("¡Genial!","Login correcto, la sesión está iniciada.","success");

          actualizarModalLogin();
          $('#modalLogin').modal('hide');

       },
       error: function(data){
          swal("¡Ups!", "Dirección de correo electrónico / contraseña incorrect@s.", "error");
       }
     });

    }else{
      swal("¡Rellena todos los campos!");
    }
}

function actualizarModalLogin(){
  $.ajax({
       url: './server/session.php',
       type: 'GET',
       success: function(data){
          sesion = JSON.parse(data);
          $('.login-modal').html("<div class='alert alert-info'> Has iniciado sesión como "+"<strong>"+sesion.email+"</strong>" + "</div>");
          $('.login-modal-footer').html("<button type='button' class='btn btn-info' data-dismiss='modal'>Vale</button> <button class='btn btn-success' id='logoutBT'> Logout </button>");
          $('#logoutBT').on('click',logout);
          if (sesion.empleado == "true") {
              $('.login-modal-footer').append("<a class='btn btn-warning' href='backend.php'>Panel de Administración</a>");

          };
       },
       error: function(data){
          console.log("Ha fallado la petición HTTP. "+data.responseText);
       }
     });
}

function logout(){
  $.ajax({
       url: './server/logout.php',
       type: 'GET',
       success: function(data){
        location.reload();
},
       error: function(data){
          console.log("Ha fallado la petición HTTP. "+data.responseText);
       }
     });
}

function logged(){
   $.ajax({
       url: './server/autorizacion.php',
       type: 'GET',
       success: function(data){
        actualizarModalLogin();
},
       error: function(data){
        console.log("La sesión no está iniciada.");
       }
     });
}

function mostrarRegistro(){
  var cuerpoHTML = '<form class="form-horizontal"><fieldset><legend>Registro</legend><div class="form-group">  <label class="col-md-4 control-label" for="nombre">Nombre: </label>    <div class="col-md-4">  <input id="nombreTF"  placeholder="Tu nombre real" class="form-control input-md" required="" type="text"></div></div><div class="form-group"><label class="col-md-4 control-label" for="apellido">Apellidos: </label>  <div class="col-md-4"><input  id="apellidoTF" placeholder="Tus apellidos" class="form-control input-md" required="" type="text"></div></div><!-- Text input--><div class="form-group"><label class="col-md-4 control-label" for="dni">DNI: </label>  <div class="col-md-4"><input  id="dniTF" placeholder="Tu DNI" class="form-control input-md" required="" type="text"></div></div><div class="form-group"><label class="col-md-4 control-label" for="direccion">Dirección: </label>  <div class="col-md-4"><input  id="direccionTF" placeholder="Tu dirección" class="form-control input-md" required="" type="text"></div></div><div class="form-group"><label class="col-md-4 control-label" for="textinput">Teléfono: </label>  <div class="col-md-4"><input id="telefonoTF" name="textinput" placeholder="Tu teléfono" class="form-control input-md" required="" type="text"></div></div><div class="form-group"><label class="col-md-4 control-label" for="correo">Correo: </label>  <div class="col-md-4"><input  id="correoTF" placeholder="Tu correo" class="form-control input-md" required="" type="text"></div></div><div class="form-group"> <label class="col-md-4 control-label" for="contrasenya">Contraseña: </label><div class="col-md-4"><input id="contrasenyaTF" placeholder="Tu contraseña" class="form-control input-md" required="" type="password"></div></div></fieldset></form>';
$('#cuerpoLogin').html(cuerpoHTML);

$('.login-modal-footer').html("<button class='btn btn-info' id='registrarBT'>Registrar</button> <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button> <a class='btn btn-warning' id='mostrarLoginBT'>Ya tengo una cuenta </a>");
$('#registrarBT').on('click',registro);
$('#mostrarLoginBT').on('click',cambiarLogin);
}

function cambiarLogin(){
  var html = '<div class="cuerpo-modal login-modal" id="cuerpoLogin"><p>Dirección de correo electrónico: <input type="text" id="emailTF" class="form-control"/></p><p>Contraseña: <input type="password" id="passTF" class="form-control"/></p></div>';
  $('#cuerpoLogin').html(html);
  var htmlFooter = '<div class="modal-footer login-modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-info" id="registroBT">Registro</button><button type="button" id="loginBT" class="login btn btn-success">Login</button></div>';
  $('.login-modal-footer').html(htmlFooter);
  $('#registroBT').on('click',mostrarRegistro);
  $('#loginBT').on('click',login);
}

function registro(){
  violations = null;
  var nombre = $('#nombreTF').val();
  var apellidos = $('#apellidoTF').val();
  var dni = $('#dniTF').val();
  var direccion = $('#direccionTF').val();
  var telefono = $('#telefonoTF').val();
  var correo = $('#correoTF').val();
  var contrasenya = $('#contrasenyaTF').val();
  var valid = true;
  violations = new Array();
  if (nombre == "") {
    valid = false;

  };
  if (apellidos == "") {
    valid = false;

  };
  if (dni == "") {
    valid = false;

  };
  if (direccion == "") {
    valid = false;

  };
  if (telefono == "") {
    valid = false;

  };
  if (correo == "") {
    valid = false;

  };
  if (contrasenya == "") {
    valid = false;

  };
  if (dni != "" && !isDNI(dni)) {
    valid = false;
    violations.push('dni');
  };
  if (correo != "" && !validarEmail(correo)) {
    valid = false;
    violations.push('email');
  };

  if (valid) {
    var cliente = new Cliente(nombre,apellidos,dni,direccion,telefono,correo,contrasenya);
    var clienteJson = cliente.toJson();
       $.ajax({
       url: './server/registro.php',
       type: 'POST',
       data: {'cliente':clienteJson},
       success: function(data){
         swal("¡Genial!", data, "success");
         $('#modalLogin').modal('hide');
         cambiarLogin();
       },
       error: function(data){
        console.log(data);
       }
     });
  }else{
    if (violations.length == 0) {
      swal("¡Rellena todos los campos!");
    }else{
      var violationString = "Campos con formato erróneo: ";
      for (var i = 0; i < violations.length; i++) {
        violationString += violations[i] + " ";
      };
      swal(violationString);
    }

  }
}

function isDNI(dni) {
  var numero, let, letra;
  var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

  dni = dni.toUpperCase();

  if(expresion_regular_dni.test(dni) === true){
    numero = dni.substr(0,dni.length-1);
    numero = numero.replace('X', 0);
    numero = numero.replace('Y', 1);
    numero = numero.replace('Z', 2);
    let = dni.substr(dni.length-1, 1);
    numero = numero % 23;
    letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
    letra = letra.substring(numero, numero+1);
    if (letra != let) {
      //alert('Dni erroneo, la letra del NIF no se corresponde');
      return false;
    }else{
      //alert('Dni correcto');
      return true;
    }
  }else{
    //alert('Dni erroneo, formato no válido');
    return false;
  }
}

function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
        return false;
    }else{
      return true;
    }

}

   $(document).ready(function(){
     carrito = new Carrito(1);
     articulos = new Array();
     $.ajax({
       url: './server/categorias.php',
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

     $('#verLoginBT').on('click',mostrarLogin);
     $('#registroBT').on('click',mostrarRegistro);
     logged();
  });
