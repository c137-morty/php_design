<?php
/**
 * Created by PhpStorm.
 * User: zzh
 * Date: 19-1-4
 * Time: 下午8:39
 */
include_once($_COOKIE['ABSPATH'] . '/src/controllers/UserController.php');
include_once($_COOKIE['ABSPATH'] . '/src/tools/Pager.php');
class UserPager extends Pager
{
    private static $counts;    //总数据数
    public static $page_size = 4;     //每页显示的数据数量

    public function __construct($cur_page,$where=array())
    {
        self::$counts = $this->getCounts($where);
        $this->total_page = ceil(self::$counts / self::$page_size);
        $this->cur_page = $cur_page;
    }

    public function getCounts($where)
    {
        return (new UserController())->getCounts();
    }
}