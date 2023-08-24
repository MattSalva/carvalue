# CarValue App

Una aplicación web para un concesionario. Mediante la cual se puede acceder a los vehiculos como usuario, y administrar las ofertas si se ingresa como administrador.

____

## Tecnologias

- Php 8.1
- MySQL
- AJAX
- PDO
- Javascript
  - JQuery
- CSS
  - Bootstrap 5
____

## Secciones

### News
Es una seccion estatica que que funciona como "home" para los usuarios

### Our Cars
La sección mas importante. En la misma se encuentran _cards_ donde habita la información de los vehiculos a la venta. Los clientes solo podran ver la opción para comprarlos. Los administradores podran ademas editarlos y borrarlos. Al dar en "Comprar" son dirigidos al area de contacto con el ID del auto como parametro en la URL. Una vez enviado el formulario de contacto, el auto queda en estado "Reserved".

Los administradores pueden borrar estos vehiculos y ademas editar sus datos. Estas acciones utilizan AJAX para comunicarse asincronamente con el backend.

### Sell Your Car

En esta seccion los usuarios pueden agregar un nuevo vehiculo para la venta.

### Contact Us

Aqui es donde se puede enviar el formulario de contacto. En principio sirve para poder reservar vehiculos, pero es posible expandir esta funcionalidad en la medida que se cuente con un servidor SMTP para envio de correos (función no disponible en esta versión de la aplicación).

### Login / Logout

Un menu simple para realizar login/logout. Actualmente solo existe un usuario que es **admin**

## Estructura

### MVC

La aplicacion cuenta con estructura _Model View Controller_ por lo que las entidades se encuentran dentro de _models_, los controladores de las interacciones de usuario que nacen desde las vistas se encuentran en __controllers_ y las vistas que recibe el usuario dentro de _views_

Ademas se cuentan con dos controladores AJAX para gestionar los script JS, dentro de la carpeta _ajax_.

