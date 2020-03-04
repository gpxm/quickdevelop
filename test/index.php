<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 2020/2/18
 * Time: 10:07 PM
 */

require_once "../vendor/autoload.php";

$user = new \nicktyx\develop\core\User();
\nicktyx\develop\core\Container::set('user', $user);

\nicktyx\develop\core\facade\User::index();

