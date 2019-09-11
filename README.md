## 说明
这是一个测试发布google双重认证扩展包，这只是一个测试用的

## 安装

运用composer安装:

	composer require jybtx/google-auth


### Instantiate it directly

```php
use Jybtx\GoogleAuth\GoogleSecondarySuthentication;
    
$googleauth = new GoogleSecondarySuthentication();
    
return $googleauth->getSecretKey();
```
## 参考
```php
pragmarx/google2fa
pragmarx/google2fa-laravel
```

# License
MIT