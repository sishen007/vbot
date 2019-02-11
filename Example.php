<?php

namespace Hanson\MyVbot;

use Hanson\Vbot\Foundation\Vbot as Bot;
use Vbot\Blacklist\Blacklist;
use Vbot\GuessNumber\GuessNumber;
use Vbot\HotGirl\HotGirl;

class Example
{
    private $config;

    public function __construct($session = null)
    {
        $this->config = require_once __DIR__ . '/config.php';

        if ($session) {
            $this->config['session'] = $session;
        }
    }

    public function run()
    {
        /**
         * 实例化 Vbot
         */
        $robot = new Bot($this->config);

        /**
         * 获取消息处理器实例 : $robot->messageHandler
         * 收到消息时触发: setHandler();
         */
        $robot->messageHandler->setHandler([MessageHandler::class, 'messageHandler']);
        /**
         * 一直触发  如何获取所有的联系人....
         */
        $robot->messageHandler->setCustomHandler(function () use($robot) {
//            $contactFactory = $robot->contactFactory->fetchAllContacts();
            $friends = vbot('friends')->get(0);
//            $whiteList = ['死神007', 'Y'];
//            $blackList = [];
//            // 获取联系人列表
            $friends->each(function ($item, $username) {
                // 发送白名单
//                if ($item['RemarkName'] && in_array($item['RemarkName'], $whiteList)) {
////                    Text::send($username, $item['RemarkName'] . ' 新年快乐');
////                    sleep(2);
//                }
                vbot('console')->log('获取联系人列表==:' . json_encode($item));
                sleep(2);
            });
        });
//        $robot->messageExtension->load([
//            // some extensions
//            Blacklist::class,
//            GuessNumber::class,
//             HotGirl::class,
//        ]);

        /**
         * 获取监听器实例: $robot->observer
         *
         */
        $robot->observer->setQrCodeObserver([Observer::class, 'setQrCodeObserver']);

        $robot->observer->setLoginSuccessObserver([Observer::class, 'setLoginSuccessObserver']);

        $robot->observer->setReLoginSuccessObserver([Observer::class, 'setReLoginSuccessObserver']);

        $robot->observer->setExitObserver([Observer::class, 'setExitObserver']);

        $robot->observer->setFetchContactObserver([Observer::class, 'setFetchContactObserver']);

        $robot->observer->setBeforeMessageObserver([Observer::class, 'setBeforeMessageObserver']);

        $robot->observer->setNeedActivateObserver([Observer::class, 'setNeedActivateObserver']);

        $robot->server->serve();
    }
}
