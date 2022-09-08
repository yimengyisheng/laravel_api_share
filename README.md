# laravel_api_share
基于laravel5.5构建拿来即用的API服务

### 安装说明
* git clone https://github.com/yimengyisheng/laravel_api_share.git

* composer install

* cp .env.example .env

* php artisan key:generate

* mkdir -p storage/framework/views
  mkdir -p storage/framework/cache
  mkdir -p storage/framework/sessions
  
* php artisan jwt:secret

* composer dump-autoload -o

* token获取
```
      1.POST www.example.com/auth/login 获取access_token示例
        {
            "access_token": "eyJA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ",
            "token_type": "bearer",
            "expires_in": 3600
        }
    
      2.api业务请求头部添加

      Authorization: Bearer {access_token}
```
* API文档部署

 Nginx配置如下：
 ```
    server{
        listen 80;
        server_name docs.example.com;
        root 项目根目录/docs/api;
        location ~ .*\.(raml)$ {
            add_header Cache-Control no-store;
        }
        index index.html;
    }
```

### 包含的功能项

* jwt的安全验证机制

* 自定义接口返回异常

* 统一接口返回数据格式

* 自定义分页程序

* 接口文档编写使用raml（含书写格式示例）

* 多域名调用支持

* 发送短信多平台支持

### 功能设置

* 配置.env
````

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120
QUEUE_DRIVER=redis
````
````
自定义用户token有效时间
JWT_TTL=3600
````

```
laravel日志按天做为文件存储单位
APP_LOG=daily

```
### 功能说明
* 全局函数和常量文件已经定义在app/Helpers目录下

