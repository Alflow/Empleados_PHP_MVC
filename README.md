# Sistema de Registro de Turnos de Empleados

Este repositorio contiene una aplicación básica para el registro de turnos de empleados, permitiendo registrar la entrada y la salida de los mismos. Está desarrollada utilizando el patrón Modelo-Vista-Controlador (MVC) en PHP y está diseñada con fines educativos para demostrar la estructura y funcionalidad básica de un sistema de este tipo.

## Estructura del Proyecto

El proyecto está estructurado como sigue:

- `app/`: Núcleo de la aplicación, contiene lógica y enrutamiento.
  - `conf/`: Configuraciones de la aplicación, incluyendo la base de datos.
  - `plantillas/`: Archivos de plantilla para la interfaz de usuario.
  - `rutinas/`: Funciones y utilidades comunes.
  - `core/`: Componentes centrales del patrón MVC.
- `fuentes/`: Controladores y modelos que gestionan la lógica de negocio y la interacción con la base de datos.
  - `Controlador/`: Controladores para el manejo de solicitudes.
  - `Modelo/`: Modelos para el acceso y manipulación de datos.
- `web/`: Recursos públicos, incluyendo hojas de estilo CSS, imágenes y el archivo `index.php`.
- `empleados.sql`: Script SQL para la creación y población inicial de la base de datos.
- 
## Requisitos de Sistema

- SQL Server (La aplicación fue desarrollada y probada en SQL Server 2019).
- PHP 7.4 o superior.
- Un servidor web como Apache o Nginx.
  
## Funcionalidad Básica

La aplicación permite a los empleados:

- Registrar la entrada al inicio de su turno.
- Registrar la salida al final de su turno.
- Acceder con correo electrónico y contraseña.

Estas operaciones se reflejan en una base de datos SQL, la cual se puede gestionar a través de la interfaz de usuario proporcionada por la aplicación.

## Fines Educativos

Este proyecto se ha creado y subido con fines educativos. La funcionalidad es deliberadamente básica y está destinada a servir como un ejemplo de cómo se puede estructurar una aplicación web sencilla utilizando PHP y el patrón MVC.

## Instalación y Configuración
El archivo Empleados.sql es el script que crea la Base de Datos en la que podrás introducir tus empleados ficticios para probar el proyecto..
## Contribuciones y Uso

Las contribuciones son bienvenidas bajo las directrices especificadas en la sección de contribuciones. El uso de este proyecto está destinado a ser un recurso educativo y como tal, se anima a los usuarios a experimentar y aprender de su estructura y código.

##Estilo
Se ha linkeado un pre-maquetador Water.css con el fin de enfocarse en la funcionalidad más que en el diseño, sin llegar a dañar los ojos del usuario gracias al fondo oscuro.
## Licencia

Este proyecto está licenciado bajo la Licencia MIT - 
