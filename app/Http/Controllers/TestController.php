<?php

namespace App\Http\Controllers;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use Mrgoon\AliSms\AliSms;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\Exception;
use Log;

class TestController extends Controller
{
    /**
     * @return 阿里云发送短信示例代码
     */
    public function test()
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'aliyun',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'aliyun' => [
                    'access_key_id' => '',
                    'access_key_secret' => '',
                    'sign_name' => '',
                ],
                //...
            ],
        ];
        try {

            $easySms = new EasySms($config);

            $easySms->send (18595664108, [
                'template' => 'SMS_16085543',
                'data' => [
                    'vercode' => 6379
                ],
            ]);
            return 888;
        } catch (Exception $exception) {
            Log::info ('error', $exception->getResults ());
        }
//        $aliSms = new AliSms();
//        $response = $aliSms->sendSms('18595651098', 'SMS_160305812', ['cusname'=> '1203','bizname'=>'666','reason'=>'666']);
//        dd($response);
//        return object_get ($response,'Code');
//
//        AlibabaCloud::accessKeyClient(env ('ALIYUN_SMS_AK'),env ('ALIYUN_SMS_AS'))
//            ->regionId('cn-hangzhou') // replace regionId as you need
//            ->asGlobalClient();
//
//        try {
//            $result = AlibabaCloud::rpcRequest()
//                ->product('Dysmsapi')
//                ->version('2017-05-25')
//                ->action('SendSms')
//                ->method('POST')
//                ->options([
//                    'query' => [
//                        'PhoneNumbers' => '18595651098',
//                        'SignName' => '汉薇商城',
//                        'TemplateCode' => 'SMS_120866313',
//                        'TemplateParam' => '',
//                    ],
//                ])
//                ->request();
//            print_r($result->toArray());
//        } catch (ClientException $e) {
//            echo $e->getErrorMessage() . PHP_EOL;
//        } catch (ServerException $e) {
//            echo $e->getErrorMessage() . PHP_EOL;
//        }
    }
}
