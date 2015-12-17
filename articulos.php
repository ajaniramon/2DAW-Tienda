<?php
$id = $_POST['categoria'];
switch($id){
case 1:
//id,nombre, descripcion,precio, imagen, categoria
$articulo[0]=array('id' => '1', 'nombre' => 'Hot cakes esponjosos','descripcion' => 'Gruesos y esponjosos. Estos hot cakes salen simplemente deliciosos. Cubiertos con fresas y crema batida son imposibles de resistir. También son deliciosos con mantequilla, miel de maple y rebanadas de plátano.', 'precio' => '3', 'imagen' => 'articulos/hot-cakes.jpg', 'categoria' => '1','cantidad' => '1');
$articulo[1]=array('id' => '2', 'nombre' => 'Pan brasileño de queso','descripcion' => 'Prueba esta receta tradicional brasileña de panecillos de queso parmesano con harina de mandioca. ¡Libres de gluten!', 'precio' => '4', 'imagen' => 'articulos/pan-brasilenyo.jpg', 'categoria' => '1','cantidad' => '1');

break;

case 2:
$articulo[0]=array('id' => '3', 'nombre' => 'Espagueti al chipotle','descripcion' => 'Una receta de espagueti a la mexicana. La pasta se baña en una salsa de crema con chipotle y champiñones. ¡Te va a encantar!', 'precio' => '20', 'imagen' => 'articulos/espagueti-chipotle.jpg', 'categoria' => '2','cantidad' => '1');
$articulo[1]=array('id' => '4', 'nombre' => 'Arroz blanco con elote y crema','descripcion' => 'Arroz blanco con granos de elote salteados en mantequilla y crema ácida. Una receta fácil y de un sabor muy especial.', 'precio' => '10', 'imagen' => 'articulos/arroz-elote.jpg', 'categoria' => '2','cantidad' => '1');
$articulo[2]=array('id' => '5', 'nombre' => 'Lasagna vegetariana','descripcion' => 'Lasaña rellena de una salsa de jitomate con champiñones, pimiento morón, zanahoria y otras hierbas y especias, en lugar de carne.', 'precio' => '10', 'imagen' => 'articulos/lasagna-vegetariana.jpg', 'categoria' => '2','cantidad' => '1');

break;

case 3:
$articulo[0]=array('id' => '6', 'nombre' => 'Hamburguesas de lentejas y arroz','descripcion' => 'Por su base de lentejas, estas hamburguesas tienen un bajo contenido en grasas y un alto contenido en proteínas.', 'precio' => '5', 'imagen' => 'articulos/hamburguesa-lentejas.jpg', 'categoria' => '3','cantidad' => '1');
$articulo[1]=array('id' => '7', 'nombre' => 'Garbanzos a las especias','descripcion' => 'Los garbanzos son una legumbre que se puede comer en multitud de recetas, por ejemplo en esta receta de la India que resulta, como todas las de este país, muy aromática y muy sabrosa.', 'precio' => '3', 'imagen' => 'articulos/garbanzos_a_las_especias.jpg', 'categoria' => '3','cantidad' => '1');

break;

case 4:
$articulo[0]=array('id' => '8', 'nombre' => 'Hummus','descripcion' => 'El hummus es una de las recetas más populares del Medio Oriente. Se sirve con pan de pita fresco o tostado, y se compone basicamente de puré de garbanzos y zumo de limón, se suele servir como aperitivo y/o acompañamiento.', 'precio' => '3', 'imagen' => 'articulos/hummus.jpg', 'categoria' => '4','cantidad' => '1');
$articulo[1]=array('id' => '9', 'nombre' => 'Cogollos a la cordobesa','descripcion' => 'Muchas veces nos complicamos la vida con platos laboriosos y no pensamos que en la sencillez, está el buen gusto. Los cogollos de Tudela con crujiente de ajo frito es un plato versátil ya que puedes presentarlo a modo de entrante o bien, a modo de tapa.', 'precio' => '3', 'imagen' => 'articulos/cogollos.jpg', 'categoria' => '4','cantidad' => '1');
$articulo[2]=array('id' => '10', 'nombre' => 'Croquetas de seitán y bechamel','descripcion' => 'Hoy traigo una deliciosa razón para que te chupes los dedos: en la oficina, en la universidad o en el coche pero especialmente te invito a que las pruebes en tu casa, tranquilamente y con consciencia.', 'precio' => '3', 'imagen' => 'articulos/croquetas-seitan.png', 'categoria' => '4','cantidad' => '1');

break;

case 5:
$articulo[0]=array('id' => '11', 'nombre' => 'Crema de boniato a la naranja','descripcion' => 'Dulce, aterciopelada y aromática, esta crema la hice para mi padre en una de sus paradas en mi casa rumbo a Francia. Era diciembre, quería un plato que le calentase ( le puse jengibre para activar la circulación), nutritivo y a la vez consistente, sin ser pesado, para que se sintiera bien al volante del coche después. Le encantó!', 'precio' => '3', 'imagen' => 'articulos/crema-boniato.jpg', 'categoria' => '5','cantidad' => '1');
$articulo[1]=array('id' => '12', 'nombre' => 'Gazpacho andaluz','descripcion' => 'Receta del clásico gazpacho andaluz. Un primer plato vegano tradicional perfecto para los meses de calor. También ideal como bebida refrescante de verano.', 'precio' => '3', 'imagen' => 'articulos/gazpacho.jpg', 'categoria' => '5','cantidad' => '1');
$articulo[2]=array('id' => '13', 'nombre' => 'Crema de espárragos','descripcion' => 'Una sopa de espárragos hecha con yogurt, limón y queso parmesano. ¡A todo el mundo le encanta! Puedes sustituir la crema y el yogur con productos de soya si quieres hacer una crema vegana.', 'precio' => '3', 'imagen' => 'articulos/crema-esparragos.jpg', 'categoria' => '5','cantidad' => '1');

break;

case 6:
$articulo[0]=array('id' => '14', 'nombre' => 'Ensalada griega','descripcion' => 'Tomates, cebolla y pepino, aderezados con aceite de oliva y cubiertos con queso feta y aceitunas negras. Esta ensalada griega es, además de deliciosa, saludable y nutritiva.', 'precio' => '3', 'imagen' => 'articulos/ensalada-griega.jpg', 'categoria' => '6','cantidad' => '1');
$articulo[1]=array('id' => '15', 'nombre' => 'Ensalada caprese','descripcion' => 'Rebanadas de tomate, queso mozzarella fresco, olivas y albahaca bañados en aceite de oliva con un toque de sal y pimienta.', 'precio' => '3', 'imagen' => 'articulos/ensalada-caprese.jpg', 'categoria' => '6','cantidad' => '1');

break;

case 7:
$articulo[0]=array('id' => '16', 'nombre' => 'Zumo de manzana, pepino y col','descripcion' => 'Zumo de manzana, fruta depurativa por excelencia, combinada con la col rizada o col kale, de excelentes propiedades gracias a los glucosinolatos de las crucíferas.', 'precio' => '3', 'imagen' => 'articulos/zumo-pepino.jpg', 'categoria' => '7','cantidad' => '1');
$articulo[1]=array('id' => '17', 'nombre' => 'Smoothie de sandia y kiwi','descripcion' => 'Si quieres probar una receta de smoothie refrescante para este verano, no puedes perderte este smoothie de sandía que tenemos preparado hoy para que lo puedas hacer rápido en casa. Además es una forma perfecta de usar las sobras de sandía para que no se ponga mala.', 'precio' => '3', 'imagen' => 'articulos/smoothie-sandia.jpg', 'categoria' => '7','cantidad' => '1');

break;

case 8:
$articulo[0]=array('id' => '18', 'nombre' => 'Champiñones en salsa','descripcion' => 'Una de las recetas más ricas y completas que os mostramos es esta con la que preparar unos riquísimos champiñones en salsa. Además es una receta sencilla de hacer y que siempre quedan bien.', 'precio' => '3', 'imagen' => 'articulos/champinyones.jpg', 'categoria' => '8','cantidad' => '1');
$articulo[1]=array('id' => '19', 'nombre' => 'Crepes de setas y berenjena','descripcion' => '¿Estás buscando una nueva opción para comer verduras?, ¿quieres recetas más saludables para evitar la comida chatarra o preparada? Entonces mira esta receta para preparar unos deliciosos crepes de setas con berenjena.', 'precio' => '3', 'imagen' => 'articulos/crepes-setas.jpg', 'categoria' => '8','cantidad' => '1');

break;
}
echo json_encode($articulo);
?>
