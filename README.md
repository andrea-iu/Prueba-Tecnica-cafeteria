Este proyecto se realizo utilizando el lenguaje de programacion de php y haciendo uso de el framework Codeigniter 4 

Instrucciones :

1- El proyecto se relizo de manera local utilizando  xampp como servidor local ,una vez que dercargue le proyecto o lo clone el repositorio  directamente en el equipo debera contar con el programa de xampp  para asi almacenar el la siguiente ruta C:\xampp\htdocs\  la cual permitira su efectiva ejecucion de manera local.

Nota: si no cuenta con el programa de xampp y desea hacer uso de laragon debera almacenar el proyecto en la ruta C:\laragon\www

2- Luego  de haber realizado la instalacion el paquete del proyecto debera modificar el archivo env y modificar su nombre añadiendo el .env

3- Realizar la intalacion de la base de datos que encontrara dos archivos el cual uno contiene la estructura y el otro contiene una serie de datos base.

Nota: La base de datos no cuenta con usuario y contraseña de privilegio solo se implemento el usuario root por defecto , si por defecto desea relizar en proceso de añadir un  usuario en especifico en la DB , recuerde ingresar los datos creado en el archivo de .env 


#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = cafeteria
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =

# database.tests.hostname = localhost
# database.tests.database = ci4
# database.tests.username = root
# database.tests.password = root
# database.tests.DBDriver = MySQLi
# database.tests.DBPrefix =
______________________________________________________________________________________________________________


4- Ya con la correcta instalación del paquete y la base se datos posteriormente ingrese a su navegador de preferencia y ejecute la siguiente ruta el cual lo redirije a la vista previa del sistema en base a los requerimientos de la prueba

http://localhost/cafeteria/public/

