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
$('#capaGridPedidos').hide();
$('#capaGridCategorias').show();
$('#a1Cat').show();
$('#a2Cat').show();
$('#a3Cat').show();
$('#hCat').show();    
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


$('#a1Cat').on('click',abrirFormularioInsertCategoria);


jQuery("#a2Cat").click(function() {
    var id = jQuery("#jqGridCategorias").jqGrid('getGridParam', 'selrow');
    if (id) {
        var ret = jQuery("#jqGridCategorias").jqGrid('getRowData', id);
        ret.accion = "d";
     	var retJson = JSON.stringify(ret);
     	deleteCategoria(retJson);
    } else {
        alert("Por favor selecciona una fila.");
    }
});

jQuery("#a3Cat").click(function() {
    var id = jQuery("#jqGridCategorias").jqGrid('getGridParam', 'selrow');
    if (id) {
        var ret = jQuery("#jqGridCategorias").jqGrid('getRowData', id);
        ret.accion = "d";
     	var retJson = JSON.stringify(ret);
     	$('#nombreCategoriaTFU').val(ret.nombre);
     	$('#actualizarCategoriaBT').html("Actualizar");
		$('#actualizarCategoriaBT').attr("idcategoria",ret.idCategoria);


     	
     	abrirFormularioUpdateCategoria();
    } else {
        alert("Por favor selecciona una fila.");
    }
});



}


function mostrarArticulos(){

$('#a1Cat').hide();
$('#a2Cat').hide();
$('#capaGridCategorias').hide();
$('#capaGridPedidos').hide();
$('#capaGridClientes').hide();
$('#hArt').show();
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
    caption: "Articulos",
    loadonce: true
});
}


function mostrarClientes(){






$('#capaGridArticulos').hide();
$('#capaGridCategorias').hide();
$('#capaGridPedidos').hide();
$('#a1Cat').hide();
$('#a2Cat').hide();

    $('#hCli').show();
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

function mostrarPedidos(){
    $('#capaGridArticulos').hide();
    $('#capaGridCategorias').hide();
    $('#capaGridClientes').hide();
    
    
    $('#capaGridPedidos').show();
    $('#hPed').show();
    jQuery("#jqGridPedidos").jqGrid({
   	url:'jqgrid/pedido.php',
	datatype: "json",
   	colNames:['idPedido','fecha', 'total', 'dni'],
   	colModel:[
   		{name:'idPedido',index:'idPedido', width:55},
   		{name:'fecha',index:'fecha', width:90},
   		{name:'total',index:'total', width:100},
   		{name:'dni',index:'dni', width:80, align:"right"}
   	],
   	rowNum:10,
   	rowList:[10,20,30],
   	pager: '#paginadorPedidos',
   	sortname: 'idPedidios',
    viewrecords: true,
    sortorder: "desc",
	multiselect: false,
	caption: "Pedidos",
	onSelectRow: function(ids) {
		if(ids == null) {
			ids=0;
			if(jQuery("#jqGridPedidos_d").jqGrid('getGridParam','records') >0 )
			{
				jQuery("#jqGridPedidos_d").jqGrid('setGridParam',{url:"jqgrid/lineapedido.php?q=1&id="+ids,page:1});
				jQuery("#jqGridPedidos_d").jqGrid('setCaption',"Linea Pedido nº: "+ids)
				.trigger('reloadGrid');
			}
		} else {
			jQuery("#jqGridPedidos_d").jqGrid('setGridParam',{url:"jqgrid/lineapedido.php?q=1&id="+ids,page:1});
			jQuery("#jqGridPedidos_d").jqGrid('setCaption',"Linea Pedido nº: "+ids)
			.trigger('reloadGrid');			
		}
	}
});
jQuery("#jqGridPedidos").jqGrid('navGrid','#paginadorPedidos_d',{add:false,edit:false,del:false});
jQuery("#jqGridPedidos_d").jqGrid({
	height: 100,
   	url:'jqgrid/lineapedido.php?q=1&id=0',
	datatype: "json",
   	colNames:['idPedido','idArticulo', 'nombre', 'unidades','Precio total'],
   	colModel:[
   		{name:'idPedido',index:'idPedido', width:55},
   		{name:'idArticulo',index:'idArticulo', width:180},
   		{name:'nombre',index:'nombre', width:80, align:"right"},
   		{name:'unidad',index:'unidad', width:80, align:"right"},		
   		{name:'precioTotal',index:'precioTotal', width:80,align:"right", sortable:false, search:false}
   	],
   	rowNum:5,
   	rowList:[5,10,20],
   	pager: '#paginadorPedidos_d',
   	sortname: 'idPedido',
    viewrecords: true,
    sortorder: "asc",
	multiselect: true,
	caption:"Linea Pedido"
}).navGrid('#paginadorPedidos_d',{add:false,edit:false,del:false});
jQuery("#a1Ped").click( function() {
	var s;
	s = jQuery("#jqGridPedidos_d").jqGrid('getGridParam','selarrrow');
	alert(s);
});
}
$(document).ready(function(){
	$('#a1Cat').hide();
	$('#a2Cat').hide();
	$('#a3Cat').hide();
    $('#hCli').hide();
    $('#hArt').hide();
    $('#hPed').hide();
    $('#hCat').hide();
	$('#logoutBT').on('click',logout);
	$('#articulosBT').on('click',mostrarArticulos);
	$('#categoriasBT').on('click',mostrarCategorias);
	$('#clientesBT').on('click',mostrarClientes);
    $('#pedidosBT').on('click',mostrarPedidos);

	saludar();
  });
