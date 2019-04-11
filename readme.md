# 脚本一:

南京理工大学预约仪器脚本

脚本说明:

PHP:7.1以上

MYSQL:5.6以上

Nginx

该交本由lumen框架的基础编写,主要原理为定时发送预约参数.

验证码识别为百度AI图像识别API接口调用.

使用方式:

本地(以windows系统为例)

1) 下载php,mysql,apache/nginx等环境.或者直接下载wamp(window)/mamp(mac)

2) 将代码拷贝到wamp www运行目录

3) 命令行切换到项目目录下 并执行 composer install  (如果没有安装composer 请百度去安装好```很简单这里不写了)

4) 继续执行composer update

5) 登录南京理工大学仪器预约官网,登录成功后F12手动抓取Cookie(很简单可以百度解决)

6) 将cookie复制粘贴到项目CookieUniversity.php 文件的  $cookie = "XXX"; 用你的cookie替换掉XXX就好(XXX可能是已存在的Cookie)

7) 最后执行启动脚本运行 : php artisan test_command 

8) 启动成功 脚本会保持执行,每小时59分钟开始预约,每小时01分结束预约

9) ctrl+c 退出脚本运行


#####仅供学习交流emmmmmm

有任何问题可以发我邮箱: w258765@gmail.com

# 脚本二:
携程点击机器人 防止下马甲

# 脚本三:
靓号扫描脚本


