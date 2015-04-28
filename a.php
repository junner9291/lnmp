<?
//apache
./configure --prefix=/data/local/apache/ --with-apr=/data/local/apr/ --with-apr-util=/data/local/apr-util/ --with-pcre=/data/local/pcre/ --enable-mods-shared=all --enable-rewrite --enable-so

make && make install

#cd /usr/local/apache/bin/
#cp apachectl /etc/rc.d/init.d/httpd
#vi /etc/rc.d/init.d/httpd

#!/bin/sh
# chkconfig: 2345 50 90
# description:Activates/Deactivates Apache Web Server)

//mysql
#cmd 
flush privileges

cmake -DCMAKE_INSTALL_PREFIX=/data/local/mysql/ -DINSTALL_SBINDIR=/data/local/mysql/sbin/ -DMYSQL_DATADIR=/data/local/mysql/data/ -DSYSCONFDIR=/data/local/mysql/etc/ -DEXTRA_CHARSETS=all -DDEFAULT_CHARSET=utf8 -DDEFAULT_COLLATION=utf8_general_ci -DMYSQL_TCP_PORT=3306 -DMYSQL_UNIX_ADDR=/tmp/mysql.sock -DWITH_INNOBASE_STORAGE_ENGINE=1

#-DWITH_MYISAM_STORAGE_ENGINE=1 -DWITH_MEMORY_STORAGE_ENGINE=1 -DWITH_PARTITION_STORAGE_ENGINE=1 -DENABLED_LOCAL_INFILE=1 -DWITH_READLINE=1

./configure --prefix=/data/soft/mysql --enable-assembler --with-extra-charsets=complex --enable-thread-safe-client --with-big-tables --with-readline --with-ssl --with-embedded-server --enable-local-infile

make && make install

cp support-files/mysql.server /etc/init.d/mysql
chkconfig mysql on
service mysql start

#chmod a+wrx /etc/init.d/mysqld

/usr/sbin/groupadd mysql
/usr/sbin/useradd -g mysql mysql

chown -R mysql:mysql /data/local/mysql
chmod u+w /data/local/mysql
mkdir -p /data/local/mysql/database

chown -R mysql:mysql /data/local/mysql/database

chmod a+rwx scripts/mysql_install_db 
scripts/mysql_install_db --basedir=/data/local/mysql --datadir=/data/local/mysql/data --user=mysql

cp support-files/my-medium.cnf /etc/my.cnf
vi /data/local/mysql/my.cnf

vim /etc/init.d/mysqld
basedir=/data/local/mysql
datadir=/data/local/mysql/data


//edit password
mysql -uroot  
mysql> SET PASSWORD = PASSWORD('123456');
mysql> GRANT ALL PRIVILEGES ON *.* TO 'root'@'172.16.%' IDENTIFIED BY 'password' WITH GRANT OPTION;

mysqladmin -u root password 123456
mysqladmin -u root -p password abcdef 
mysqladmin -u root -p123456 password abcdef 


//php
yum install bison flex 
libxml2 libxml2-devel 
openssl openssl-devel 
libcurl libcurl-devel 
libjpeg libjpeg-devel 
libpng libpng-devel  
bzip2-devel 
freetype-devel  
t1lib-devel 
libicu-devel 
libmcrypt libmcrypt-devel
libtool-ltdl-devel

./configure --prefix=/usr/local/php/ --with-config-file-path=/usr/local/php/etc/ --with-apxs2=/usr/local/apache/bin/apxs --with-mysql=/usr/local/mysql --with-mysqli=/usr/local/mysql/bin/mysql_config --enable-exif --enable-fpm --enable-gd-native-ttf --enable-mbstring --enable-xml --enable-zip --enable-pdo --enable-mod-charset --with-t1lib --with-zlib --with-gd  --with-xsl --with-pear --with-curl  --with-mcrypt --with-freetype-dir --with-jpeg-dir --with-libxml-dir --with-pcre-dir --with-png-dir --with-openssl-dir --with-iconv-dir

#apache
 ./configure --prefix=/data/local/php5 --with-config-file-path=/data/local/php5/etc --with-apxs2=/data/local/apache/bin/apxs --with-mysql=/data/local/mysql --with-mysqli=/data/local/mysql/bin/mysql_config 

#simple nginx 
 ./configure --prefix=/data/local/php5 --with-config-file-path=/data/local/php5/etc --with-mysql=/data/local/mysql --with-mysqli=mysqlnd --with-pdo-mysql=mysqlnd --with-iconv --enable-pdo --enable-xml --enable-zip --with-pear --enable-fpm

//php-fpm
./configure --prefix=/usr/local/php5_4/ --with-config-file-path=/usr/local/php5_4/etc/ --with-mysql=/usr/local/mysql --with-mysqli=/usr/local/mysql/bin/mysql_config --enable-exif --enable-gd-native-ttf --enable-mbstring --enable-xml --enable-zip --enable-pdo --with-t1lib --with-zlib --with-gd  --with-xsl --with-pear --with-curl  --with-mcrypt --with-freetype-dir --with-jpeg-dir --with-libxml-dir --with-pcre-dir --with-png-dir --with-openssl --with-iconv --enable-fastCGI --enable-debug

//mysqlnd
./configure --prefix=/data/local/php5_5/ --with-mysql=/data/local/mysql --with-mysqli=mysqlnd --enable-exif --enable-gd-native-ttf --enable-mbstring --enable-xml --enable-zip --enable-pdo --with-t1lib --with-zlib --with-gd  --with-xsl --with-pear --with-curl  --with-mcrypt --with-freetype-dir --with-jpeg-dir --with-libxml-dir --with-pcre-dir --with-png-dir --with-openssl --with-iconv --enable-fpm --enable-debug

cp php.ini-development /usr/local/lib/php.ini

//php-ini
cp php.ini-development /etc/php.ini
cp /usr/local/etc/php-fpm.conf.default /usr/local/etc/php-fpm.conf
cp /data/local/php5_5/etc/php-fpm.conf.default /etc/php-fpm.conf
cp sapi/fpm/php-fpm /usr/bin/

vim /etc/php.ini
cgi.fix_pathinfo=0

vim /etc/php-fpm.conf
user = www-data
group = www-data

//xdebug
/usr/local/php/bin/phpize
./configure --enable-xdebug --with-php-config=/usr/local/php/bin/php-config 
make && make install
edit php.ini and add 

zend_extension ="/usr/local/php/xdebug/xdebug.so"  
xdebug.default_enable = 1  

xdebug.trace_output_dir="/usr/local/php5/xdebug/"  
xdebug.profiler_output_dir="/usr/local/php5/xdebug/"  
xdebug.remote_enable=on             
xdebug.remote_handler=dbgp            
;xdebug.remote_host=localhost  
;xdebug.remote_port=9999  

xdebug.auto_trace = on
xdebug.auto_profile = on
xdebug.collect_params = on
xdebug.collect_return = on
xdebug.profiler_enable = on

xdebug.var_display_max_depth = 9
;xdebug.var_display_max_children = 128
;xdebug.var_display_max_data = 512


//php-fpm rstart
killall php-fpm
/usr/local/php5_4/bin/php-fpm
kill -USR2 `cat /var/run/php-fpm/php-fpm.pid`


//nginx
yum -y install gcc pcre-devel openssl openssl-devel
./configure --prefix=/data/local/nginx --sbin-path=/usr/sbin/nginx --conf-path=/data/local/nginx/etc/nginx.conf --lock-path=/var/logs/nginx.lock --pid-path=/var/run/nginx.pid --error-log-path=/var/logs/nginx.error.log --http-client-body-temp-path=/var/nginx/client_body_temp --http-proxy-temp-path=/var/nginx/proxy_temp --http-fastcgi-temp-path=/var/nginx/fastcgi_temp 
--without-select_module --without-poll_module --with-http_ssl_module --with-http_realip_module --with-http_addition_module --with-http_sub_module --with-http_dav_module --with-http_flv_module --with-http_xslt_module --with-http_gzip_static_module --with-http_random_index_module --with-http_secure_link_module --with-http_degradation_module --with-http_stub_status_module 

#--with-pcre-opt=-L/usr/%{_lib_arch} --with-cc-opt='-I/usr/include/pcre -O2' --with-cc=/usr/bin/gcc 
#--add-module=/data1/rpmbuild/SOURCES/ngx_http_kalecgos_module --add-module=/data1/rpmbuild/SOURCES/nginx-sticky-module

nginx path prefix: "/data/local/nginx"
nginx binary file: "/usr/sbin/nginx"
nginx configuration prefix: "/data/local/nginx/etc"
nginx configuration file: "/data/local/nginx/etc/nginx.conf"
nginx pid file: "/var/run/nginx.pid"
nginx error log file: "/var/logs/nginx.error.log"
nginx http access log file: "/data/local/nginx/logs/access.log"
nginx http client request body temporary files: "/var/nginx/client_body_temp"
nginx http proxy temporary files: "/var/nginx/proxy_temp"
nginx http fastcgi temporary files: "/var/nginx/fastcgi_temp"
nginx http uwsgi temporary files: "uwsgi_temp"
nginx http scgi temporary files: "scgi_temp"


/usr/local/nginx/sbin/nginx -c /usr/local/nginx/conf/nginx.conf
/usr/nginx/sbin/nginx -s reload
/usr/local/nginx/sbin/nginx
kill -QUIT pid
kill -TERM pid
pkill -9 nginx


//libevent
./configure --prefix=/data/local/libevent
make && make install

ln -s /usr/local/lib/libevent-1.4.so.2  /usr/lib/libevent-1.4.so.2

//memcached
tar -zxvf  libevent-1.4.13-stable.tar.gz
cd libevent-1.4.13-stable.tar.gz
./configure -prefix=/data/local/libevent
make && make install


tar -zxvf  memcached-1.4.22.tar.gz
cd memcached-1.4.22.tar.gz
./configure --prefix=/data/local/memcached --with-libevent=/data/local/libevent
make && make install


tar -zxvf  libmemcached-1.0.18.tar.gz
cd libmemcached-1.0.18.tar.gz
./configure --prefix=/data/local/libmemcached --with-memcached=/data/local/memcached/bin/memcached
make && make install

//lib
/data/local/php5_5/bin/pecl install memcache
/data/local/php5_5/bin/pecl install memcached

vim /etc/php.ini
//add
extension=memcache.so
extension=memcached.so


//memcached start
/data/local/memcached/bin/memcached -d -m 512 -c 512 -p 11211 -u root -t 10
memcached -l 127.0.0.1 -d -p 11211 -u nobody -m 1024

/usr/local/bin/memcached -d -m 64 -c 64 -p 11211 -u root -l 10.33.2.75 -P /tmp/memcached.pid
/usr/local/bin/memcached -d -m 64 -c 64 -p 11212 -u root -l 10.33.2.75 -P /tmp/memcached2.pid
/usr/local/bin/memcached -d -m 64 -c 64 -p 11213 -u root -l 10.33.2.75 -P /tmp/memcached3.pid

netstat -ntlp|grep memcached
pgrep -l memcached
kill -9 memcached


//redis
tar xzf redis-2.6.17.tar.gz   
ln -s redis-2.6.17 redis #建立一个链接  
cd redis  
make PREFIX=/usr/local/redis install #安装到指定目录中

cp /usr/local/src/redis/utils/redis_init_script /etc/rc.d/init.d/redis
chkconfig --add redis

vim /etc/rc.d/init.d/redis

//add line 2

#chkconfig: 2345 80 90
EXEC=/usr/local/redis/bin/redis-server   
CLIEXEC=/usr/local/redis/bin/redis-cli 
$EXEC $CONF & 

//redis config
cp redis-server /usr/local/bin/
cp redis-cli /usr/local/bin/

cp /usr/local/src/redis/redis.conf /etc/redis/6379.conf

//yaf 
/data/local/php5_5/bin/pecl install yaf
extension=yaf.so

git clone https://github.com/laruence/php-yaf
cd tools/cg
/data/local/php5/bin/php yaf_cg app
# cp -a output/app/* /data/www/yaf


//tcl
tar -xf ../tcl8.6.3-html.tar.gz --strip-components=1
cd tcl8.6.3
cd unix
./configure --prefix=/data/local/tcl


