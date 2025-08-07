#!/bin/bash

source .env

docker run -d \
  --name mysql-container \
  -e MYSQL_ROOT_PASSWORD=rootpassword \
  -e MYSQL_DATABASE=$DB_NAME \
  -e MYSQL_USER=$DB_USER \
  -e MYSQL_PASSWORD=$DB_PASSWORD \
  -p 3306:3306 \
  -v mysql-data:/var/lib/mysql \
  --restart unless-stopped \
  mysql:8.0
