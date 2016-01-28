function logout(){
	 $.ajax({
       url: './server/logout.php',
       type: 'GET',
       success: function(data){
        location.href = "/tienda";   
},
       error: function(data){
          console.log("Ha fallado la petición HTTP. "+data.responseText);
       }
     });
}

function saludar(){
	 $.ajax({
       url: './server/session.php',
       type: 'GET',
       success: function(data){
       	var sesionObjeto = JSON.parse(data);
        $('#fraseSesion').html('¡Hola, '+sesionObjeto.nombre + '! Bienvenido al panel de administración.');
        $('#cabeceraLogout').prepend('Has iniciado sesión como '+sesionObjeto.email + ".")
},
       error: function(data){
          console.log("Ha fallado la petición HTTP. "+data.responseText);
       }
     });
}


function mostrarCategorias(){
$('#capaGridArticulos').hide();
$('#capaGridClientes').hide();
$('#capaGridCategorias').show();
$('#a1Cat').show();
$('#a2Cat').show();
jQuery("#jqGridCategorias").jqGrid({
    url: 'jqgrid/categoria.php',
    datatype: "json",
    height: "auto",
    colNames: ['idCategoria','nombre'],
    colModel: [{
        name: 'idCategoria',
        index: 'idCategoria',
        width: 200
    }, {
        name: 'nombre',
        index: 'nombre',
        width: 400
    }],
    rowNum: 10,
    rowList: [10, 20, 30],
    pager: '#paginadorCategorias',
    sortname: 'idCategoria',
    viewrecords: true,
    sortorder: "desc",
    caption: "Categorias"
});

$('#a1Cat').css("display","initial");
$('#a2Cat').css("display","initial");

jQuery("#a1Cat").click(function() {
    var id = jQuery("#jqGridCategorias").jqGrid('getGridParam', 'selrow');
    if (id) {
        var ret = jQuery("#jqGridCategorias").jqGrid('getRowData', id);
        var html= "<table border='1' align='center'><tr><td>idCategoria</td><td>Nombre</td></tr><tr><td>"+ret.idCategoria +"</td><td>"+ret.nombre +"</td></tr></table>"
        swal({
        	title: "Categoria",
        	text: html,
        	html: true
        })
    } else {
        alert("Por favor selecciona una fila.");
    }
});

//continuar con los siguientes métodos...
}


function mostrarArticulos(){

$('#a1Cat').hide();
$('#a2Cat').hide();
$('#capaGridCategorias').hide();
$('#capaGridClientes').hide();

$('#capaGridArticulos').show();
	jQuery("#jqGridArticulos").jqGrid({
    url: 'jqgrid/articulo.php',
    datatype: "json",
    height: "auto",
    colNames: ['idArticulo','nombre','descripcion','precio','imagen','stock','categoria'],
    colModel: [
    {
        name: 'idArticulo',
        index: 'idArticulo',
        width: 100
    }, 
    {
        name: 'nombre',
        index: 'nombre',
        width: 100
    },
    {
    	name: 'descripcion',
    	index: 'descripcion',
    	width: 100
    },
    {
    	name: 'precio',
    	index: 'precio',
    	width: 100
    },
    {
    	name: 'imagen',
    	index: 'imagen',
    	width: 100
    },
    {
    	name: 'stock',
    	index: 'stock',
    	width: 100
    },
    {
    	name: 'categoria',
    	index: 'categoria',
    	width: 100
    }],
    rowNum: 20,
    rowList: [10, 20, 30],
    pager: '#paginadorArticulos',
    sortname: 'idArticulo',
    viewrecords: true,
    sortorder: "desc",
    caption: "Articulos"
});
}


function mostrarClientes(){






$('#capaGridArticulos').hide();
$('#capaGridCategorias').hide();
$('#a1Cat').hide();
$('#a2Cat').hide();


	$('#capaGridClientes').show();
	jQuery("#jqGridClientes").jqGrid({
    url: 'jqgrid/cliente.php',
    datatype: "json",
    height: "auto",
    colNames: ['idCliente','nombre','apellido','dni','direccion','telefono','correo','empleado'],
    colModel: [
    {
        name: 'idCliente',
        index: 'idCliente',
        width: 100
    }, 
    {
        name: 'nombre',
        index: 'nombre',
        width: 100
    },
    {
    	name: 'apellido',
    	index: 'apellido',
    	width: 100
    },
    {
    	name: 'dni',
    	index: 'dni',
    	width: 100
    },
    {
    	name: 'direccion',
    	index: 'direccion',
    	width: 100
    },
    {
    	name: 'telefono',
    	index: 'telefono',
    	width: 100
    },
    {
    	name: 'correo',
    	index: 'correo',
    	width: 100
    },
    {
    	name: 'empleado',
    	index: 'empleado',
    	width: 100
    }

    ],
    rowNum: 20,
    rowList: [10, 20, 30],
    pager: '#paginadorClientes',
    sortname: 'idCliente',
    viewrecords: true,
    sortorder: "desc",
    caption: "Clientes"
});


}


$(document).ready(function(){
	$('#a1Cat').hide();
	$('#a2Cat').hide();
	$('#logoutBT').on('click',logout);
	$('#articulosBT').on('click',mostrarArticulos);
	$('#categoriasBT').on('click',mostrarCategorias);
	$('#clientesBT').on('click',mostrarClientes);

	saludar();
  });
