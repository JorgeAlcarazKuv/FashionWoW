# FashionWoW
World of Warcraft Transmogrification Website. Upload your favourites outfits.

## Índice
- [Introducción](#introducción)
- [Imágenes](#imágenes)
- [IDs](#ids)
- [ModeloER](#modeloer)

## Introducción

La web será un lugar donde subir transfiguraciones del WoW (conjuntos de armaduras) con los respectos nombres a las piezas usadas. El backend sigue una estructura MVC clásica. Actualmente hace uso de 2 APIs externas:

- Imgur: El usuario selecciona una imagen de su equipo, y ésta es subida asíncronamente a Imgur, y guardado el enlace generado en la base de datos, la cual se accederá cuando se visite un post.
- Blizzard: Se hace uso de un Endpoint que dado un ID de objeto, devuelve un conjunto de datos acerca del mismo. De éstos datos, se usan la url del icono, el nombre y la casilla de equipamiento del objeto. No existe un Endpoint que permita traerse todos los objetos del juego para poblar mi propia base de datos, así que por el momento, se espera que el usuario haga uso de otras báses de datos de objetos para proporcionar las ID. Cuando nuevas ID son añadidas a un post, se guarda su información en base de datos con la idea de que una vez suficientemente poblada la base de datos, se implemente un sistema de búsqueda por nombre en lugar de ID. La siguiente vez que es necesaria la información del objeto, se coge de lo existente en base de datos.

La web ha sido alojada en un [hosting gratuito](https://fashionwowphp.000webhostapp.com/).

El actual área de Administración fue hecha ad hoc para cumplir los requisitos del proyecto de jQuery, y no encaja correctamente en la experiencia de usuario.

No se ha hecho énfasis ninguno en el diseño, centrando casi todos los esfuerzos en la arquitectura de PHP.

Al final de la documentación, se dejará una lista de IDs, tanto ya usados (ya existen en la base de datos), como sin usar (se añadiran a la base de datos al intentar subir un nuevo post usándolos).


## Imágenes

**Index**. La página de recepción. Una lista con los últimos post añadidos. Es posible hacer click en el título del post para acceder al detalle del mismo. También podemos seleccionar el autor para acceder a una lista de todos los post subidos por el autor.
<img src="https://i.imgur.com/BjrARAH.png" alt="imagen1" width="800" height="400">


**Registro**. Una básica interfaz de registro. Existe cierto control de validación para evitar nombres repetidos, y contraseñas que no coincidan en la repetición.
<img src="https://i.imgur.com/tIpe73z.png" alt="imagen1" width="800" height="400">


**LogIn**. Vista para entrar con la cuenta de usuario ya creada.
<img src="https://i.imgur.com/ZLWzAJj.png" alt="imagen1" width="800" height="400">


**Subir nuevo post**. Pantalla que permite la subida de un nuevo post. Sólo es posible estando logeado. 
Se nos permitirá añadir cada pieza de armadura aportando la ID de la misma. 
<img src="https://i.imgur.com/CRtTH7i.png" alt="imagen1" width="800" height="400">

Al desenfocar la casilla, se accederá a la API de WoW asíncronamente para traerse la información del objeto, a la vez que la guarda en base de datos.
<img src="https://i.imgur.com/eSB0KhM.jpg" alt="imagen1" width="800" height="400">


**Detalle de post**. Visualización de un post concreto. Todos los datos mostrados son cargados de la base de datos, poblada con los datos necesarios en el momento de la subida. El nombre del objeto es cargado en un tooltip al pasar el ratón.  
<img src="https://i.imgur.com/dQ8QBIz.png" alt="imagen1" width="800" height="400">


**Publicaciones de un usuario**. Lista de las publicaciones de un usuario seleccionado.
<img src="https://i.imgur.com/ViKR8nc.png" alt="imagen1" width="800" height="400">


**Administración**. Permite la administración de usuarios. No es la funcionalidad principal de este proyecto. Sólo es accesible por usuarios administradores. Sólo un administrador puede cambiar el nivel de acceso de otros usuarios, existiendo 3 niveles: admin, moderador, usuario.
<img src="https://i.imgur.com/OHErrbb.png" alt="imagen1" width="800" height="400">

## ModeloER

<img src="https://i.imgur.com/ErriIgB.png" alt="imagen1" width="800" height="400">


## IDs
IDs sin usar (Se añadirán a la base de datos al intentar introducirlas en un post):
- 138378
- 138376
- 138380
- 138377
- 138379
- 138375

