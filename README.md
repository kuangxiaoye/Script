# unversity
南京理工大学预约仪器脚本

脚本说明:

PHP:7.1以上

MYSQL:5.6以上

Nginx

该交本由lumen框架的基础编写,主要原理为定时发送预约参数.

验证码识别为百度AI图像识别API接口调用.

使用方式:
1.本地(以window为例)

1) 下载php,mysql,apache/nginx等环境.或者直接下载wamp(window)/mamp(mac)

2) 将代码拷贝到wamp www运行目录

3) 命令行切换到项目目录下 并执行 composer install 

4) 继续执行composer update

5) 最后执行启动脚本运行 : php artisan test_command 

6) 启动成功 脚本会保持执行,每小时59分钟开始预约,每小时01分结束预约

7) ctrl+c 退出脚本运行

登录仪器预约网站,F12将

### 方便刘照丽的学姐学长学弟学妹们预约脚本...

#####仅供学习交流emmmmmm


