<?php
/**
 * 信鸽
 */
class XinGe
{
    /**
     * @var array 消息体
     */
    protected static $_message = [];

    /**
     * @var array 推送人群
     */
    protected static $_users = [];

    /**
     * 添加消息体
     *
     * @param string $title    标题
     * @param string $content  内容
     * @param array  $jump     跳转参数
     * @return $this
     */
    public function message($title, $content, $jump = [])
    {
        self::$_message = [
            "title" => $title,
            "content" => $content,
            "jump" => $jump
        ];

        return $this;
    }

    /**
     * 添加推送人群
     *
     * @param array $users 推送用户ID组
     * @return $this
     */
    public function users($users)
    {
        if (empty($users)){
            die("目标人群不能为空");
        }
        self::$_users = $users;

        return $this;
    }

    /**
     * 推送
     */
    public function push()
    {
        echo  "信鸽消息体:".json_encode(self::$_message).PHP_EOL;
        echo  "目标人群:".json_encode(self::$_users);
    }


}