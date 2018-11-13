<?php 
/**
 * 单例模式
 * 1.类只能有一个实例
 * 2.必须自行创建此实例
 * 3.必须自行向整个系统提供这个实例。
 */

class Singleton
{
	private static $instance;
	//私有构造方法，禁止使用new创建对象
	private function __construct(){}

	public static function getInstance()
	{
		if (!isset(self::$instance)) 
		{
			self::$instance = new self;
		}
		return self::$instance;
	}
	//将克隆方法设为私有，禁止克隆对象
	private function __clone(){}

	public function say()
	{
		echo "这是用单例模式创建对象实例 <br>";
	}

	public function operation()
	{
		echo "这里可以添加其他方法和操作 <br>";
	}

}

$obj = Singleton::getInstance();
$obj->say();
$obj->operation();

$newObj = Singleton::getInstance();
var_dump($obj === $newObj);





?>