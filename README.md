Las versiones utilizadas son:
PHP 7.2.22
Laravel 6.x

Así mismo se usaron framework como AdminLte 2.x.

Los siguientes atributos del archivo .env deben ser modificados dependiendo de donde será alojada la aplicación
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=companies
DB_USERNAME=root
DB_PASSWORD=secret

Para llevar a cabo el envío de correos, también se debe configurar los siguientes atributos del archivo .env, los atributos de MAIL_USERNAME y MAIL_PASSWORD 
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
