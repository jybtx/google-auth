## 说明
这是一个测试发布google双重认证扩展包，这只是一个测试用的

## 安装

运用composer安装:

	composer require jybtx/google-auth


### Instantiate it directly

```php
use GoogleAuth;
return GoogleAuth::getSecretKey();
```

### 请求google并生成二维码
```php
return	GoogleAuth::getQRCodeGoogleUrl($company, $holder, $secret, $size = 200);
```
### 验证一次性密码是否正确
```php
return GoogleAuth::validateSecretKey($secretKey,$one_time_password);
		ture 验证正确
		false 验证错误
```
## 参考

[pragmarx/google2fa](https://github.com/antonioribeiro/google2fa) <br />
[pragmarx/google2fa-laravel](https://github.com/antonioribeiro/google2fa-laravel)


# License
MIT