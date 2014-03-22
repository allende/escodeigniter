Ejemplos de codeigniter desde http://escodeigniter.com
=================================================================


Este es un ejemplo sencillo con llamadas por AJAX, usando $.ajax() de jQuery.

El ejemplo muestra 3 dropdown (select en html) 

Pais
Estados
Ciudades

Estan anidados en cascada de tal manera que al seleccionar el Pais, se cargan los estados correspondientes,
y el seleccionar el estado se cargan las ciudades que le corresponden.



Instalacion y configuraciones a considerar:
============================================

En application/config/config.php  

$config['base_url']	= 'http://localhost/escodeigniter/';

En application/config/database.php

$db['default']['hostname'] = 'localhost';

$db['default']['username'] = 'root';

$db['default']['password'] = '';

$db['default']['database'] = 'ajax_sample';


En application/config/routes.php  

$route['default_controller'] = "ajax_jquery";

=========================================================
Todos los fuentes deben estar en tu htdocs o similar dentro de un directorio llamado "escodeigniter".

O bien clona el repositorio directo a tu htdocs.

Base de datos
=============
Crea una base de datos en mysql con el nombre "ajax_sample".

El archivo ajax_sample.sql contiene los scripts necesarios para crear las tablas dentro de la base de datos
"ajax_sample".

Ve a http://localhost/escodeigniter deberas ver un formulario con 3 dropdown  que funcionan en cascada.

Acerca del CSS
Deje intacto del css de la vista "welcome_message" de las fuentes de CI

Agradecimientos:
El estilo de los dropdowns fue tomado de aca, fue levemente modificado:
http://bavotasan.com/2011/style-select-box-using-only-css/


A Marco Garay (http://twitter.com/marco_garay) por el tip final para que hacer funcionar el ejemplo.

Al usario mikezero del foro, gran parte del codigo sobre todo el de los modelos lo bas� en un ejemplo que me envi� 
en el que estaba empezando a trabajar :)

Demo
======

http://demos.escodeigniter.com/