# Walalolo

**Walalolo** es un proyecto realizado en **Laravel 5.5** y **Bootstrap v4.0**. Se trata de  una tienda de segunda mano 
que te permite buscar productos o subir los tuyos propios.

## Instalación

Para poder usar la aplicacion es necesario que instale previamente _**PHP**_, _**Composer**_ , _**Vagrant**_ ,
_**Virtualbox**_ y **_Node.js_**.

#### Composer
Instalación de **Composer**: https://getcomposer.org/download/

#### Vagrant
Instalación de **Vagrant**: https://www.vagrantup.com/downloads.html

#### Node.js
Manual para instalar **npm**: https://nodejs.org/es/download/package-manager/

#### Homestead
Para la instalación de **Homestead** le dejo el siguiente enlace: https://laravel.com/docs/5.5/homestead

Si usted posee **Windows**, le dejaré este otro enlace que le ayudará con la instalación : 
https://medium.com/eaimanshoshi/i-am-going-to-write-down-step-by-step-procedure-to-setup-homestead-for-laravel-5-2-17491a423aa


Una vez que haya completado todos los pasos, procedemos a descargarnos el proyecto en la carpeta que haya usted 
determinado para los **proyectos Homestead.**
```
git clone https://github.com/Marcobr93/Walalolo.git
```

## Configuración

Una vez descargado el proyecto, procedemos a la configuración previa, todos los pasos siguientes puede modificarlos a su
gusto, yo le mostraré con imágenes como es la configuración en mi caso.

#### Homestead.yaml
- En primer lugar modificaremos el archivo **Homestead.yaml** ubicado en la carpeta **Homestead.**

![homestead yaml](https://user-images.githubusercontent.com/23703557/36949934-f03936de-1fee-11e8-9cf9-3296d73de393.png)

#### hosts
- En segundo lugar modificaremos el archivo hosts con permisos de administrador.
    - En **Linux** se encuentra en: `etc/hosts`
    - En **Windows** la ruta sería: `C:\Windows\System32\drivers\etc`

![hosts](https://user-images.githubusercontent.com/23703557/36948534-743b2914-1fdc-11e8-9e40-708369422bf1.png)

Una vez realizados todos estos pasos, nos dispondremos a **"levantar"** la máquina virtual, al añadir  una base de datos,
será necesario utilizar el siguiente comando en la carpeta de **Homestead**: 
```
vagrant up --provision
```
El resto de ocasiones que queramos iniciar vagrant, será necesario utilizar sólo este comando:
```
vagrant up
```

#### .env
Una vez realizado todos estos pasos, nos faltará configurar el archivo **.env** del proyecto **Walalolo.**
Para ello podemos renombrar el archivo **.env.example** o crear un nuevo archivo **.env**, en cualquier caso, la 
configuración deberá ser así:

![env](https://user-images.githubusercontent.com/23703557/36948543-a499cc0a-1fdc-11e8-8393-6a032294a339.png)

Para generar 'APP_KEY, deberá utilizar el siguiente comando:'
```
php artisan key:generate
```
#### IMPORTANTE
Como habrá podido observar en el archivo **.env**, es necesario cambiar la siguiente parte:
```
CACHE_DRIVER=array
```
Sin esto, no podremos visualizar el mapa de localización de cada usuario.

### Base de datos
Para la configuración de la base de datos, utilizará los datos del archivo **.env**.
- Accedemos a **_Database_** -> **_New_** -> **_Data Source_** -> **_MySQL_** 

![database](https://user-images.githubusercontent.com/23703557/36948912-b89f1188-1fe1-11e8-99f2-561d29ce6f95.png)  


## Instalación de los componentes de Walalolo
Para instalar los componentes necesarios para que funcione el proyecto, deberá utilizar los siguientes dos comandos:
```
composer install
npm run dev
```

Una vez que estemos conectados a la Base de Datos y todos los componentes estén ya instalados, podrá proceder a utilizar
el siguiente comando en el proyecto, este comando _"llenará"_ la base de datos gracias al uso de las factorías, con 
información generada aleatoriamente con**$faker**.

```
php artisan migrate:refresh --seed
```

## Creación de enlace blando para poder subir tus propias imágenes
Será necesario que cree un enlace blando desde vagrant, le dejo el enlace de una guía por si tiene usted más dudas sobre
este paso: https://www.cambiatealinux.com/ln-crear-un-enlace-simbolico-al-fichero-o-directorio

A continuación le dejaré el comando que debe ejecutar en la ruta de su proyecto desde la **máquina virtual**, la ruta 
puede variar dependiendo de los nombres que haya usted dado tanto al proyecto como en mi caso a la carpeta **Code**, 
que es donde se almacenan los proyectos en la máquina virtual:
```
ln -s /home/vagrant/code/Walalolo/storage/app/public/ storage
```
Este comando debe realizarlo en la siguiente ruta:
```
vagrant@homestead:~/code/Walalolo/public$
```

## Manual de uso de la aplicación
Una vez llegados aquí, significa que todo ha funcionado de forma correcta, a continuación le detallaré las distintas
funcionalidades que posee la página de **Walalolo.**

En primer lugar, cabe destacar que las funciones de las que dispondrá el usuario variarán dependiendo si este está
logeado o no en ese momento.

A lo largo del manual verá la siguiente abreviación **(LMI)**, significa **_"link for more information"_**, al hacer 
click en el enlace ,accederemos a una vista específica del producto o del usuario en su caso.

### Usuario NO logeado
- En el **navbar** dispondrá de 4 opciones:
    - **Tabla de productos:** accederá a una nueva página donde encontrará una tabla con todos los productos disponibles,
    aquí podrá ordenar los productos según cada sección y también dispondrá de un recuadro para buscar cosas concretas.
    La foto, el título y el nombre del propietario poseen **(LMI)**.
    - **Búsqueda:** aquí podremos buscar productos según su nombre y accederemos a una nueva página donde veremos
    dichos productos.
    - **Login:** nos permite logearnos en la página si ya disponemos de una cuenta.
    - **Register:** nos permite registrarnos en la página con un nuevo usuario.
- El **contenido principal** de la página se divide en **tres secciones:**
    - La **parte superior** posee un **Carousel**, aquí se mostrarán aquellos productos que posean entre sus características
    el ser **"destacado"**. Si hacemos click en la imagen iremos a una nueva página donde veremos más información acerca
    de ese producto.
    - En la **parte central** de la página aparecerán todos los productos de más reciente "creación" hasta el más
    antiguo. Estos productos poseen la siguiente información:
        - Nombre del producto **(LMI)**, imagen del usuario que la ha subido **(LMI)**, nombre del usuario que la ha subido
         **(LMI)**, visitas de ese producto, imagen **(LMI)**, descripción y precio del producto.
    - En el **lateral izquierdo** de la página, encontramos el botón de **Mostrar búsqueda**, al pulsar el botón, este nos
     mostrará una pequeña tabla con dos opciones seleccionables y una tercera que abrirá un desplegable, el funcionamiento 
     es el siguiente:
        - Las dos opciones seleccionables nos permite filtrar por aquellos productos que tengan un precio
        negociable o que permitan el intercambio.
        - La tecera opción, el desplegable, nos permite seleccionar la categoría a la que pertecene dicho producto.
- **Footer:** 
    - Foto y enlace de **Github** con links hacia el Github del proyecto.
    - Logo central de **Walalolo** que te redirecciona a la página principal.
      
#### Vista de un producto en concreto
Aquí dispondrá de toda la información acerca del producto al que ha accedido junto a un mapa con la localización del 
usuario del producto. Tanto la foto del usuario como su nombre son **(LMI)**.

#### Vista de un usuario
- En la parte superior encontrará un **mapa** con la ubicación del usuario.
- Podrá ver la **valoración** que tiene el usuario, esta valoración es una media que se obtiene a partir de los votos que 
otros usuarios han realizado sobre él.
- Podrá ver todos los productos que ese usuario tiene a disposición en la página.
- Si hace click en el botón de mostrar comentarios, se abrirán los comentarios que ese usuario ha recibido de otros
usuarios, estos comentarios son públicos.

### Usuario logeado
Hasta aquí todo lo que un usuario no logeado puede hacer, al logearte, tendrás nuevas funciones y permisos, a
continuación les explicaré las nuevas funcionalidades, las anteriores citadas se mantendrán intactas.
- En el **navbar** se modificará un poco:
    - **Añadir productos:** aquí podrás añadir un nuevo producto.
    - Click en el **nombre del usuario logeado**, aparecerá un dropdown:
        - **Perfil:** accedemos a una nueva sección, aquí podremos **ver** todos los datos del usuario.
            - **Editar Perfil:** si accedemos a **editar perfil**, podremos **modificar** la información del usuario.
        - **Ofertas:** veremos todas las ofertas que han realizado otros usuarios sobre nuestros productos con la 
        **negociación del precio activada**. Aquí podremos **aceptar/rechazar** las ofertas, las aceptadas pasarán a la
        parte de **"Ofertas aceptadas"**.
        - **Tus productos:** accedemos la vista de usuario pero en este caso la del tuyo.
        - **Logout**: nos desconectamos de la cuenta.
    - **Foto del usuario:** enlace directo a tu **perfil.**
    - **Icono del mensaje:** esto nos llevará a todas las conversaciones que tiene el **usuario.**
    
#### Vista de un producto en concreto
Las nuevas opciones que dispone aquí son dos:
- Si el producto posee la característica de **negociación del precio: sí**, podrá realizarle una **contraoferta** del
precio de ese producto a su usuaro.
- Si usted accede a un producto suyo, dispondrá de la opción de **Editar producto**, aquí podrá, al igual que con el 
**perfil**, modificar los datos del producto.

#### Vista de un usuario
Las nuevas opciones que dispone aquí son 3:
- Podrás **valorar** al usuario con una puntuación del 0 al 5, si vuelve a valorar, se modificará su valoración anterior.
- Podrás enviarle un mensaje directo al usuario, este mensaje directo sólo podrá verlo el usuario en cuestión.
    - Si ya existe una **conversación** con el usuario, aparecerá el icono de un **mensaje** encima de la foto del 
    usuario, para que pueda acceder a la **conversación** que haya tenido con ese **usuario.**
- Podrás realizarle un **comentario público** al usuario.


## Componentes utilizados en el proyecto
- **Lozad.js**
- **iziModal.js**
- **Autocomplete**
- **Datatables.js**
- **DatePicker.js**
- **Leaflet.js**
- **GeoIp**
- **Todos los componentes necesarios para el uso correcto de Bootstrap v4.0.**