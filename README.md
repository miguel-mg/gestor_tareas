Gestor de tareas

Para iniciar el proyecto hay que seguir los siguientes pasos:

1) Copiar la carpeta "gestor_tareas" y los archivos que contiene a la raíz del servidor donde se vaya a ejecutar el proyecto.
2) En pypmyadmin crear una base de datos llamada "gestor_tareas".
3) Importar en esa base de datos nueva y vacía el archivo "gestor_tareas.sql". Generará las tablas, sus relaciones y datos de ejemplo.
4) Ir a la carpeta del servidor y editar el archivo "db.php" en la línea 11 los tres primeros campos de la función "mysqli"
- En el primero poner el dominio, si es en local poner "localhost"
- En el segundo cambiar 'root' por el nombre usuario de la base de datos con el que tengas permiso para acceder a ella
- En el tercer campo que se ve vacio colocar la contraseña correspondiente al usuario, dejar en blanco si el usuario no tiene contraseña asignada
- Por ultimo el cuarto campo dejarlo tal cual, con el nombre "gestor_tareas", que es el nombre que definimos en el punto 2)

Una vez guardado el fichero y con el servidor y la base de datos en funcionamiento acceder a la aplicación asi:
http://localhost/gestor_tareas/   
[o reemplazar el dominio si no se trabaja en local]
