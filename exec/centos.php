<?
//selinux
vim /etc/selinux/config
#SELINUX=enforcing
SELINUX=disabled

//yum update
yum install wget    #安装下载工具wget
wget http://www.atomicorp.com/installers/atomic  #下载atomic yum源
sh ./atomic   #安装
yum check-update  #更新yum软件包
