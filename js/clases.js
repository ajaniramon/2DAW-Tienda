function Carrito(id){
this.id = id;
this.fecha = new Date();
this.articulos = new Array();
}
Carrito.prototype.addArticulo = function(articulo){
	this.articulos.push(articulo);
}
Carrito.prototype.toJson = function(){
	return JSON.stringify(this);
}

function Articulo(id,nombre,descripcion,precio,imagen,categoria,cantidad){
this.id = id;
this.nombre = nombre;
this.descripcion = descripcion;
this.precio = precio;
this.imagen = imagen;
this.categoria = categoria;
this.cantidad = cantidad;
}
Articulo.prototype.toJson = function(){
	return JSON.stringify(this);
}

function Categoria(nombre, id){
this.nombre = nombre;
this.id = id;
}
