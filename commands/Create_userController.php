<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\User;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Create_userController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionCreate_user($username='username',$surname='surname',$email='username@username.com',$password='password')
    {

        $user = new User();
        $user->username = $username;
        $user->surname = $surname;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        if($user->save()) echo "User added!";
    }
}
