<?php
/**
 * 移动推送（个推、信鸽一起推）
 *
 * @description 门面模式（Facade）又称外观模式，用于为子系统中的一组接口提供一个一致的界面。
 * @description 门面模式定义了一个高层接口，这个接口使得子系统更加容易使用：引入门面角色之后，用户只需要直接与门面角色交互，用户与子系统之间的复杂关系由门面角色来实现，从而降低了系统的耦合度。
 * @description Laravel facades 就是服务容器里那些基类的「静态代理」，相比于传统的静态方法调用.https://learnku.com/docs/laravel/5.8/facades/3888
 * @see https://learnku.com/docs/php-design-patterns/2018/Facade/1502
 */
class AppPush
{
    public static $_getui;
    public static $_xinge;

    public function __construct()
    {
        self::$_getui = new GeTui();
        self::$_xinge = new XinGe();
    }

    /**
     * 推送
     *
     * @param string $title   标题
     * @param string $content 内容
     * @param array $users
     * @param array $jump
     */
    public static function push($title, $content, $users, $jump = [])
    {
        self::$_xinge->message($title, $content, $jump)->users($users)->push();
        self::$_getui->message($title, $content, $jump)->users($users)->push();

    }
}


// demo
$title = "2020，新年快乐";
$content =  "各位糖厂小伙伴，新年快乐！！！";

AppPush::push($title, $content, ["糖厂小伙伴"]);