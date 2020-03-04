<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 2020/3/4
 * Time: 3:45 PM
 */

namespace nicktyx\develop\service;


class TimeService
{
    /**
     * 根据秒数获取倒计时
     * @param $second
     * @return array
     */
    public static function timeToCountdown($second)
    {
        $day = floor($second / (3600*24));
        $second = $second % (3600 * 24); // 除去整天之后剩余的时间
        $hour = floor($second / 3600);
        $second = $second % 3600;// 除去整小时之后剩余的时间
        $minute = floor($second / 60);
        $second = $second % 60; // 除去整分钟之后剩余的时间
        //返回字符串
        return ['d' => $day, 'h' => $hour, 'i' => $minute, 's' => $second];
    }

    /**
     * 时间戳转多少分钟、多少小时、多少天、多少月前
     * @param int $time
     * @return false|string
     */
    public static function timeToString($time = 0)
    {
        $text = '';
        $time = $time <= 0 || $time > time() ? time() : intval($time);
        $t = time() - $time; //时间差 （秒）
        $t = $t == 0 ? 1 : $t;
        $y = date('Y', $time)-date('Y', time());//是否跨年
        switch($t){
            // 刚刚
            case $t < 10:
                $text = '刚刚';
                break;
            // 一分钟内
            case $t < 60:
                $text = $t . '秒前';
                break;
            // 一小时内
            case $t < 60 * 60:
                $text = floor($t / 60) . '分钟前';
                break;
            // 一天内
            case $t < 60 * 60 * 24:
                $text = floor($t / (60 * 60)) . '小时前';
                break;
            // 昨天和前天
            case $t < 60 * 60 * 24 * 3:
                $text = floor($time/(60*60*24)) ==1 ?'昨天 ' . date('H:i', $time) : '前天 ' . date('H:i', $time) ;
                break;
            // 一个月内
            case $t < 60 * 60 * 24 * 30:
                $text = date('m-d- H:i', $time);
                break;
            // 一年内
            case $t < 60 * 60 * 24 * 365&&$y==0:
                $text = date('m-d-', $time);
                break;
            // 一年以前
            default:
                $text = date('Y-m-d', $time);
                break;
        }
        return $text;
    }
}