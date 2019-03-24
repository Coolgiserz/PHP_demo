# PHP_demo
## 项目简介
此项目仅为本人对PHP及Web开发知识点的回顾总结，算是笔记式的

### 项目配置
1. 在dbconn.php中更改数据库配置
```php
define('HOST','127.0.0.1');
define('PORT','5432');
define('DB_NAME','webgisdb');
define('DB_USER','postgres');
define('DB_PASSWD','');
```
2. 创建数据表todo_user
```SQL
drop table if exists todo_user;
create table if not exists todo_user(
	id serial primary key,
	"user" varchar(32) not null unique,
	"passwd" varchar(32) not null,
	"realname" varchar(18) not null,
	"email"  varchar(64) not null,
	"mobile"  varchar(11) not null
);
```

3. 访问index.php 