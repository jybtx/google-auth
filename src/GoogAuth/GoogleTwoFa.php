<?php
namespace Jybtx\GoogAuth\GoogAuth;

use PragmaRX\Google2FALaravel\Google2FA;

class GoogleTwoFa
{
    protected $google;
    
    public function __construct(Google2FA $google)
    {
        $this->google = $google;
	}
	/**
     * [getSecretKey description]
     * @return [type]     [description]
     */
	public function getSecretKey()
	{
		return $this->google->generateSecretKey();
	}
	/**
     * 请求google并生成二维码
     * @param  [type]     $company [description]
     * @param  [type]     $holder  [description]
     * @param  [type]     $secret  [description]
     * @param  integer    $size    [description]
     * @return [type]              [description]
     */
	public function getQRCodeGoogleUrl($company, $holder, $secret, $size = 200)
    {
        $url = Google2FA::getQRCodeUrl($company, $holder, $secret);

        return $this->generateGoogleQRCodeUrl('https://chart.googleapis.com/', 'chart', 'chs='.$size.'x'.$size.'&chld=M|0&cht=qr&chl=', $url);
    }
    /**
     * 请求google并返回二维码信息
     * @param  [type] $domain          [description]
     * @param  [type] $page            [description]
     * @param  [type] $queryParameters [description]
     * @param  [type] $qrCodeUrl       [description]
     * @return [type]                  [description]
     */
    public function generateGoogleQRCodeUrl($domain, $page, $queryParameters, $qrCodeUrl)
    {
        $url = $domain .
                rawurlencode($page) .
                '?' . $queryParameters .
                urlencode($qrCodeUrl);

        return $url;
    }
    /**
     * google二次密码验证
     * @param  [type] $secretKey [description]
     * @param  [type] $code      [description]
     * @return [type]            [description]
     */
    public function validateSecretKey($secretKey,$code)
    {
        // Verify the code
        $result = Google2FA::verifyKey($secretKey,$code);
        if ( $result )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}