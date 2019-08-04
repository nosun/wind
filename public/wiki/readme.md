
## 一、方案介绍

该 **项目** 基于 ``laravel`` 框架开发，使用用 ``Mysql`` 作为数据库存储，前端采用 ``Bootstrap`` 进行布局。

## 二、功能简介

``输电线路导线风振灾害特征识别系统`` 主要由以下功能构成：

- 数据特征挖掘
    - 风振数据分布图：根据年代检索展示历年收集的风振数据，按照地区进行地图展示。
    - 图表数据统计分析：
        - 风振原始数据分类统计：
        - 风振原始数据统计：
        - 风振训练数据统计：
    - 数据特征挖掘分析：
        - 属性筛选：
        - 聚类信息：
        - 相关性分析：
- 数据知识库
    - 风振百科：展示四个级别风振的定义，原理，图片，视频，以及相关文档。
    - 风振数据：提供风振数据的展示，查询，筛选，导入，导出等功能。
- 风振灾害识别：用户可以通过给定基本风振数据，通过机器学习平台的分析，预测返回风振的类型。
- 说明文档：即本文档，主要目的在于介绍本系统的基本构成，如何部署以及使用说明。

## 三、数据库结构

该系统由若干数据表构成，其中一部分表属于系统的基础表，主要用于该系统的用户、权限、角色、菜单等基础功能的实现，另一部分主要用于业务数据的存储及展示。

- 基础表
    - admin_menu: 菜单
    - admin_operation_log：操作日志
    - admin_permissions： 用户权限
    - admin_role_menu ：角色菜单
    - admin_role_permissions： 角色权限
    - admin_role_users： 角色用户
    - admin_roles： 角色
    - admin_user_permissions： 角色权限
    - admin_users： 系统用户
    - migrations： 系统表，用于数据表的版本维护。

- 业务表
    - analysis_charts：分析图表数据
    - charts_category：分析图表分类
    - vibration_data：风振数据表
    - wiki_categories：百科分类表
    - wiki_docs：百科数据

具体的字段，此处不详细说明。

## 四、部署说明

项目采用 php + mysql 开发，适合于各种平台，推荐在 linux 服务器上进行运行，如果是 windows 系统，推荐使用 phpstudy 作为 web 服务的软件环境进行开发

### 4.1 软件要求：

- ``php`` 版本： >= 7.2
- ``mysql`` 版本： >= 5.5
- ``nginx`` 或者 ``apache``：请使用最新的稳定版。
- ``composer``：php 安装扩展包需要用到的一个可执行脚本。


### 4.2 系统安装：

- 安装数据库：还原数据库文件即可。
- 安装 web 服务所需类库：进入项目目录，执行 `` composer install `` 即可（需要网络）
- 配置 nginx 或者 apache：本文提供 nginx 环境下的示例 ``虚拟主机`` 配置文件：
```nginx
server {
    # 监听 HTTP 协议默认的 [80] 端口。
    listen 80;
    # 绑定主机名 [example.com]。
    server_name example.com;
    # 服务器站点根目录 [/example.com/public]。
    root /example.com/public;
    index index.html index.htm index.php;

    # 指定字符集为 UTF-8
    charset utf-8;

    # Laravel 默认重写规则；删除将导致 Laravel 路由失效且 Nginx 响应 404。
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # 关闭 [/favicon.ico] 和 [/robots.txt] 的访问日志。
    # 并且即使它们不存在，也不写入错误日志。
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    # 将 [404] 错误交给 [/index.php] 处理，表示由 Laravel 渲染美观的错误页面。
    error_page 404 /index.php;

    # URI 符合正则表达式 [\.php$] 的请求将进入此段配置
    location ~ \.php$ {
        # 配置 FastCGI 服务地址，可以为 IP:端口，也可以为 Unix socket。
        fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        # 配置 FastCGI 的主页为 index.php。
        fastcgi_index index.php;
        # 配置 FastCGI 参数 SCRIPT_FILENAME 为 $realpath_root$fastcgi_script_name。
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        # 引用更多默认的 FastCGI 参数。
        include fastcgi_params;
    }
    # 通俗地说，以上配置将所有 URI 以 .php 结尾的请求，全部交给 PHP-FPM 处理。
}


```

### 4.3 系统配置

- 数据库配置：请参看项目根目录下的 .env 文件，DB_HOST，DB_PORT，DB_DATABASE，DB_USERNAME 部分
- 分析API地址配置：请参考项目根目录下的  .env 文件 ANALYSIS_API 段。
- 后台语言包配置：后台语言包用于控制数据表 (主要是 vibration 表) 中英文单词所对应的中文展示，位置位于项目目录下： resources/language/Zh-CN.json



## 五、使用说明

该项目主要的功能为展示和检索以及在线分析，对于展示来说，略去不谈，对于检索和在线分析功能，需要注意检索字段的取值类型和范围。

这里着重说一下后续风振数据的管理问题，分三个 AQ 来加以说明。

### 1. 如何导入一批数据？

- 首先，需要按照 [风振数据样例文档](/demo.docx) 的格式准备好数据，准备数据有三个注意事项：
    - a. 数据的表头``（第一行）``需要与 ``demo文档`` 保持一致。数据的每一列需要确认与表头对其，且与``demo文档``数据类型一致。 
    - b. 数据的类型为 ``csv`` 类型，文档中的文本需是 ``utf8`` 格式，csv 文档的``分隔符``需是 ``,`` 分隔符。 
    - c. 数据文档的文件名不能与之前的文档名重复，最好按照导入的日期，再加上这批数据的特征进行命名。
- 其次，将需要导入的文档，拷贝到项目下的 `` storage/app/wind/data `` 目录中。
- 然后，打开 shell，进入项目的根目录，运行：

```php
php artisan tools:batchImport
```

如果数据格式没有问题，数据就会被导入到指定的数据表中，如果又问题，就会将报错输出到控制台上。

### 2. 导入数据过程中出错了，该怎么处理？

程序执行异常，将会有错误信息被打印到控制台上，会显示出程序的错误堆栈信息，哪个文件，哪个行，哪个字段发生的错误，一般的，是因为数据格式的问题。此时你需要 fix 该文件的问题，然后对数据做进一步的处理。

### 3. 如何删除某文档的数据？

一般一个文档中都有成千上万条数据，有可能脚本在执行的过程中已经执行了一部分，此时，为了避免重复导入，需要将该批数据做删除处理，然后重新执行导入命令。

删除一个具体文档的所有数据，需要进入项目的根目录，运行：

```php
php artisan tools:removeData --file=filename
```

## 六、其他

- 项目联系人：

- 本文档位于：``public/wiki/readme.md``，如果需要更新，请修改该文档即可。


