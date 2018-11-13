<?php 
/**
 * 工厂模式
 */
abstract class Employee{
	abstract function continueToWork();
}

class Sales extends Employee{
	private function makeSalaPlan(){
		echo "sales <br>";
	}

	public function continueToWork(){
		$this->makeSalaPlan();
	}
}

class Market extends Employee{
	private function makeProductPrice(){
		echo "Market<br>";
	}

	public function continueToWork(){
		$this->makeProductPrice();
	}
}

class Engineer extends Employee{
	private function makeNewProduct(){
		echo "make new product<br>";
	}

	public function continueToWork(){
		$this->makeNewProduct();
	}
}

class Demo {
	public function Work($employeeObj){
		$employeeObj->continueToWork();
	}
}

$obj = new Demo();
$obj->Work(new Sales());
$obj->Work(new Market());
$obj->Work(new Engineer());




?>