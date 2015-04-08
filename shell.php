<?php
//一行显示PATH变量里的文件夹
echo src::${PATH} | awk 'BEGIN{pwd=ENVIRON["PWD"];RS=":";FS="\n"}!$1{$1=pwd}$1!~/^\//{$1=pwd"/"$1}{print $1}' 

date -d @1234567890 读取unix时间
find . -name "*.php" | xargs -n 1 php -l

awk`
