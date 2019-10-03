<?php
namespace Jybtx\GoogleAuth;

use Google2FA;

class GoogleSecondarySuthentication
{
	/**
	 * 获取google秘钥
	 * @return [type] [description]
	 */
	public function getSecretKey()
	{
		return Google2FA::generateSecretKey();
	}
	/**
	 * 请求google并生成二维码
	 * @param  [type]  $company [description]
	 * @param  [type]  $holder  [description]
	 * @param  [type]  $secret  [description]
	 * @param  integer $size    [description]
	 * @return [type]           [description]
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
        return $domain .
                rawurlencode($page) .
                '?' . $queryParameters .
                urlencode($qrCodeUrl);

        
    }
    /**
     * 本地生成二维码
     * @author jybtx
     * @date   2019-10-03
     * @param  [type]     $company [description]
     * @param  [type]     $holder  [description]
     * @param  [type]     $secret  [description]
     * @return [type]              [description]
     */
    public function getQRCodeForLocalUrl($company, $holder, $secret)
    {
        return 'otpauth://totp/' .
            rawurlencode($company) .
            ':' .
            rawurlencode($holder) .
            '?secret=' .
            $secret .
            '&issuer=' .
            rawurlencode($company) .
            '&algorithm=' .
            rawurlencode(strtoupper($this->algorithm)) .
            '&digits=' .
            rawurlencode(strtoupper($this->oneTimePasswordLength)) .
            '&period=' .
            rawurlencode(strtoupper($this->keyRegeneration)) .
            '';
    }
    /**
     * google二次密码验证
     * @param  [type] $secretKey         [description]
     * @param  [type] $one_time_password [description]
     * @return [type]                    [description]
     */
    public function validateSecretKey($secretKey,$one_time_password)
    {
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