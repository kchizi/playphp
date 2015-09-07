#!/bin/bash
NGINX=$(netstat -tplun | grep 80 | grep nginx)
MYSQL=$(netstat -tplun | grep 3306 | grep mysqld)
PHP=$(netstat -tplun | grep 9000 | grep php-fpm)
REDIS=$(netstat -tplun | grep 6379 | grep redis)
#check nginx server
if [ -z "$NGINX" ]
then
	echo -e "nginx is die at $(date) \n\r" >> /usr/local/sh/server_error.log
	/usr/local/nginx-1.6.2/sbin/nginx >> /usr/local/sh/server_error.log 2>&1
fi
#check mysql server
if [ -z "$MYSQL" ]
	then
	echo -e "mysql is die at $(date) \n\r" >> /usr/local/sh/server_error.log
	/etc/init.d/mysqld start >> /usr/local/sh/server_error.log 2>&1
fi
#check php-fpm server
if [ -z "$PHP" ]
	then
	echo -e "php-fpm is die at $(date) \n\r" >> /usr/local/sh/server_error.log
	/usr/local/php5.5/sbin/php-fpm -c /usr/local/php5.5/etc/php.ini >> /usr/local/sh/server_error.log 2>&1
fi
#check redis server
if [ -z "$REDIS" ]
	then
	echo -e "redis is die at $(date) \n\r" >> /usr/local/sh/server_error.log
	/usr/local/redis-3.0.1/redis-server /usr/local/redis-3.0.1/redis.conf >> /usr/local/sh/server_error.log 2>&1
fi
