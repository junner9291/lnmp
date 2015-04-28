<?php
//一行显示PATH变量里的文件夹
echo src::${PATH} | awk 'BEGIN{pwd=ENVIRON["PWD"];RS=":";FS="\n"}!$1{$1=pwd}$1!~/^\//{$1=pwd"/"$1}{print $1}' 

date -d @1234567890 读取unix时间

//aa
find . -name "*.php" | xargs -n 1 php -l    //批量判断php文件语法
svn status | awk '{print $2}' | xargs svn ci -m ''    //批量提交
svn status | awk '{print $2}' | xargs -i cp {} ~/tmp -f     //批量拷贝文件
svn status | awk '{print $2}' | xargs -i cp -r --parents {} /home/webroot/webroot/trunk/    //拷贝文件和目录结构

grep documt_root * -irl                  // 显示所有包含document的文件名，不区分大小写
sed -i 's/document_root/filepath/g' config.php // 替换$filename文件所有的wanjia为uhome
rename .html .tpl *.html        // 将所有后缀名为.html的文件改为.tpl


//命令行发邮件
echo "some cool message from terminal" | mail -s "test" email@address.com



sh  /home/webroot/webroot/mis/protected/commands/shell/sync.sh


