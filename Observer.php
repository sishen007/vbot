<?php

namespace Hanson\MyVbot;

use Hanson\Vbot\Support\File;

/**
 * 监听器实例:
 * 在 Vbot 运行的每个阶段，都会触发一个监听器，你可以选择是否进行某些个性化的处理。
 * Class Observer
 * @package Hanson\MyVbot
 */
class Observer
{
    public static function setQrCodeObserver($qrCodeUrl)
    {
        vbot('console')->log('二维码链接：'.$qrCodeUrl, '自定义消息');
    }

    public static function setLoginSuccessObserver()
    {
        vbot('console')->log('登录成功', '自定义消息');
    }

    public static function setReLoginSuccessObserver()
    {
        vbot('console')->log('免扫码登录成功', '自定义消息');
    }

    public static function setExitObserver()
    {
        vbot('console')->log('退出程序', '自定义消息');
    }

    /**
     * 好友监听器
     * @param array $contacts
     */
    public static function setFetchContactObserver(array $contacts)
    {
        vbot('console')->log('获取好友成功', '自定义消息');
        File::saveTo(__DIR__.'/mydebug.json', myDebug());
//        File::saveTo(__DIR__.'/group.json', $contacts['groups']);
//        File::saveTo(__DIR__.'/friends.json', $contacts['friends']);
    }

    /**
     * 消息处理前监听器
     */
    public static function setBeforeMessageObserver()
    {
        vbot('console')->log('准备接收消息', '自定义消息');
    }

    /**
     * 当接收消息异常时，
     * 当系统判断为太久没从手机端打开微信时，则急需打开，时间过久将断开。
     */
    public static function setNeedActivateObserver()
    {
        vbot('console')->log('准备挂了，但应该能抢救一会', '自定义消息');
    }
}
