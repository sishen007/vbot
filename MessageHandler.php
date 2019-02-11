<?php

namespace Hanson\MyVbot;

use Hanson\MyVbot\Handlers\Contact\ColleagueGroup;
use Hanson\MyVbot\Handlers\Contact\ExperienceGroup;
use Hanson\MyVbot\Handlers\Contact\FeedbackGroup;
use Hanson\MyVbot\Handlers\Contact\GroupSend;
use Hanson\MyVbot\Handlers\Contact\Hanson;
use Hanson\MyVbot\Handlers\Type\RecallType;
use Hanson\MyVbot\Handlers\Type\TextType;
use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Contact\Members;

use Hanson\Vbot\Message\Emoticon;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;

/**
 * 消息处理器
 * Class MessageHandler
 * @package Hanson\MyVbot
 */
class MessageHandler
{
    /**
     * 定义应用在哪个群聊里面
     */
    const GROUP_NICK_NAME = '相亲相爱一家人';

    public static function messageHandler(Collection $message)
    {
        /**  */
        /**
         * 好友实例化
         * @var Friends $friends
         */
        $friends = vbot('friends');

        /**
         * 群成员实例
         * @var Members $members
         */
        $members = vbot('members');

        /**
         * 群实例
         * @var Groups $groups
         */
        $groups = vbot('groups');

        // 一键拜年
//        GroupSend::messageHandler($message, $friends, $groups);

        // 发送各个消息测试
//        Hanson::messageHandler($message, $friends, $groups);

        // 群组信息(群机器人可以在这里部署)
//        ColleagueGroup::messageHandler($message, $friends, $groups);

        // 体验群聊
//        FeedbackGroup::messageHandler($message, $friends, $groups);

        // Vbot 体验群
//        ExperienceGroup::messageHandler($message, $friends, $groups);

        // 消息
//        TextType::messageHandler($message, $friends, $groups);

        // 防撤回
//        RecallType::messageHandler($message);

        /**
         * 新增好友
         */
//        if ($message['type'] === 'new_friend') {
//            Text::send($message['from']['UserName'], '客官，等你很久了！感谢跟 vbot 交朋友，如果可以帮我点个star，谢谢了！https://github.com/HanSon/vbot');
//            $groups->addMember($groups->getUsernameByNickname('Vbot 体验群'), $message['from']['UserName']);
//            Text::send($message['from']['UserName'], '现在拉你进去vbot的测试群，进去后为了避免轰炸记得设置免骚扰哦！如果被不小心踢出群，跟我说声“拉我”我就会拉你进群的了。');
//        }

        /**
         * 表情
         */
//        if ($message['type'] === 'emoticon' && random_int(0, 1)) {
//            Emoticon::sendRandom($message['from']['UserName']);
//        }

        /**
         * 收到公众号消息
         */
//        if ($message['type'] === 'official') {
//            vbot('console')->log('收到公众号消息:' . $message['title'] . $message['description'] .
//                $message['app'] . $message['url']);
//        }

        /**
         * 收到好友申请
         */
//        if ($message['type'] === 'request_friend') {
//            vbot('console')->log('收到好友申请:' . $message['info']['Content'] . $message['avatar']);
//            if (in_array($message['info']['Content'], ['echo', 'print_r', 'var_dump', 'print'])) {
//                $friends->approve($message);
//            }
//        }
    }
}
