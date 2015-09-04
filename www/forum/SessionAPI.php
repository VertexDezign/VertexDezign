<?php
/**
 * Created by IntelliJ IDEA.
 * User: benjamin
 * Date: 04.09.2015
 * Time: 19:28
 */

namespace net\vertexdezign\wbb;
// load WBB core
require_once('global.php');

class SessionAPI
{

    static function checkSession() {
        // check if user is logged in (has a valid userID != 0)
        if (($uId = \wcf\system\WCF::getUser()->userID) != 0) {
            $username = \wcf\system\WCF::getUser()->username;
            return array('uId' => $uId, 'username' => $username);
        }
        else {
            return array('uId' => -1);
        }
    }

}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode(SessionAPI::checkSession());