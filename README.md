
## Pasos para la configuracion del proyecto

### 1º Crear el container de mysql

```bash
docker volume create --name=automax_mysql_var_lib
```

### 2º Crear la red de docker

```bash
docker network create --driver bridge --subnet="172.110.0.0/16" "automax-network"
```

### 3º Creamos los hosts en el fichero /etc/hosts

```bash
sudo nano /etc/hosts
```
```
Automax 172.110.0.*
172.110.0.11 automax.local
```