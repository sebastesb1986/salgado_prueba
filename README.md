1. git clone: https://github.com/sebastesb1986/salgado_prueba.git (consola o cmd)
2. php composer install (consola o cmd)
3. sacar una copia de .env.example y cambiarle el nombre por .env
4. en .env configurar la base de datos a exportarse los datos
5. Es posible ejecutar php artisan migrate para migrar la base de datos(consola o cmd)
6. Desde consola digitar php artisan serve e ingresar desde el navegador por la url: 127.0.0.1:8000
7. La primera vista sera la lista de empleados, de no existir alguno, puede crearse alguno
8. La aplicación actualmente lee usuarios, crea, modifica y elimina
9. Modificar empleado esta completamente terminado.
10. Validaciones ya completadas.
11. Alerts que anuncian empleado creado, modificado y eliminado agregadas en la vista Lista de empleados(127.8.0.1:8000).
12. La aplicación seguira en constante actualización para conseguir la funcionalidad completa(actualmente)
esta a 100%. segun el email de la prueba es posible subir commits posterior a la entrega paracumplir
con la funcionalidad pedida.

- El controlador donde se realizan las acciones es: App/Http/Controllers/EmployeeController.
- - El resquest de validación de campos se encuentra en: App/Http/Requests/FormEmployeeRequest (un solo Requests, configurado tanto para crear como para actualizar).
- Los modelos donde se determinan las tablas, operaciones y relaciones: App/Models/Area, App/Models/Empleado, App/Models/Rol.
- Vistas de la aplicación: resources/views/lista (index, edit, create).
- Migraciones o estructura de la base de datos(tablas): database/migrations (areas, empleado, roles, empleado_rol)
- Rutas: routes/web.php.

Cualquier inquietud comunicarse conmigo al correo salgadosb1986@gmail.com y en el menor tiempo
posible contestare resolviendo dudas y demas.

Gracias.
