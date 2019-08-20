# check-list
aplicación para la gestión de listas de chequeo. 

### Requisitos.
1. PHP V5.6 32-bit
2. Composer

### Paso a paso

1.  git clone [repo-git]
2.  composer install


### Configuración Virtial host 

```
NameVirtualHost *:80
 <VirtualHost *:80>
  ServerName check-list.local
  DocumentRoot "D:\semillero\check-list\web"
  DirectoryIndex index.php
  <Directory "D:\semillero\check-list\web">
    AllowOverride All
    Require all granted
  </Directory>

  Alias /sf "D:\semillero\check-list\vendor\lexpress\symfony1\data\web\sf"
  <Directory "D:\semillero\check-list\vendor\lexpress\symfony1\data\web\sf">
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
```


