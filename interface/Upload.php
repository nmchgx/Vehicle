<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/13
 * Time: 下午4:26
 */

chdir(dirname(__FILE__));
require "../qiniu/autoload.php";

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

function QiniuCreateToken() {
    $accessKey = '9Nebw9lHY9uV5M2FnxfKz4UcxuCt1neoAIxLdrHN';
    $secretKey = 'oKkCeXblqtVlRZ9TJFew_ByPBzaJrgUn8dAAgXFR';

    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);

    // 要上传的空间
    $bucket = 'vehicle';

    // 生成上传 Token
    $QiniuToken = $auth->uploadToken($bucket);

    return $QiniuToken;
}

function QiniuUpload($fileName) {
    $token = QiniuCreateToken();

    $filePath = $fileName;
    $key = $fileName;
    $uploadMgr = new UploadManager();
    echo $fileName;
    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
//    echo "\n====> putFile result: \n";
//    if ($err !== null) {
//        var_dump($err);
//    } else {
//        var_dump($ret);
//    }
}

//$qrcode = "qrcode-filling-2-3-1460538245.png";
//
//QiniuUpload($qrcode);