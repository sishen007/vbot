<?php

namespace Hanson\MyVbot\Handlers\Contact;

use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;
use Hanson\Vbot\Support\File;


/**
 * 获取所有的好友列表并群发信息(可用来拜年...)
 * Class GroupSend
 * @package Hanson\MyVbot\Handlers\Contact
 */
class GroupSend
{
    protected static $whiteNickNames = [
    ];

    public static function messageHandler(Collection $message, Friends $friends, Groups $groups)
    {
        try {
            $friendList = getFriendsList();
            foreach ($friendList as $uid => $info) {
                if (in_array($info['NickName'], self::$whiteNickNames)) {
                    Text::send($info['UserName'], 'Hello 恭喜你,你已经被监控.');
                    vbot('console')->log('发送成功' . $info['NickName'], '自定义消息');
                }
            }
        } catch (\Exception $e) {
            vbot('console')->log("获取所有的好友列表错误" . $e->getMessage());
        }
    }
}
