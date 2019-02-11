<?php
/**
 * Created by PhpStorm.
 * User: sishen007
 * Date: 2019/2/11
 * Time: 11:49
 */

if (!function_exists('myDebug')) {
    function myDebug()
    {
        $debugInfo = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 7);
        return json_encode($debugInfo, JSON_UNESCAPED_UNICODE);
    }
}

/**
 * 获取所有的好友列表
 * return array
 */
if (!function_exists('getFriendsList')) {
    function getFriendsList()
    {
        try {
            $friendsObjp = vbot('server');
            return $friendsObjp->getFriendsList();
        } catch (\Exception $e) {
            vbot('console')->log("获取所有的好友列表错误" . $e->getMessage());
        }
    }
}