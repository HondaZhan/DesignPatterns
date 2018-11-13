<?php 

/**
 * 建造者模式
 * @Bulder : 抽象构造者类
 * @ConcreteBuilder : 具体构造者类
 * @Director : 指挥者
 * @Product : 表示被构造的复杂对象
 */

abstract class Builder
{
	protected $car;
	abstract public function buildPartA();
	abstract public function buildPartB();
	abstract public function buildPartC();
	abstract public function getResult();
}

class Car 
{
	protected $partA;
	protected $partB;
	protected $partC;

	public function setPartA($str)
	{
		$this->partA = $str;
	}

	public function setPartB($str)
	{
		$this->partB = $str;
	}

	public function setPartC($str)
	{
		$this->partC = $str;
	}

	public function show()
	{
		echo "这辆车由：".$this->partA.",".$this->partB.",".$this->partC;
	}
}

class CarBuilder extends Builder
{
	function __construct()
	{
		$this->car = new Car();
	}

	public function buildPartA()
	{
		$this->car->setPartA("发动机");
	}

	public function buildPartB()
	{
		$this->car->setPartB("轮子");
	}

	public function buildPartC()
	{
		$this->car->setPartC("其他零件");
	}

	public function getResult(){
		return $this->car;
	}
}


class Director
{
	public $myBuilder;

	public function startBuild()
	{
		$this->myBuilder->buildPartA();
		$this->myBuilder->buildPartB();
		$this->myBuilder->buildPartC();
		return $this->myBuilder->getResult();
	}

	public function setBuilder(Builder $builder)
	{
		$this->myBuilder = $builder;
	}
}


$director = new Director();
$director->setBuilder(new CarBuilder());

$newCar = $director->startBuild();
$newCar->show(); 





?>