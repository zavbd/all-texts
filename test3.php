<?php
class RegisterGlobal
{
	private static $instance;
	public $model;
	private function __construct()
	{
	}
	public static function ins()
	{
		if(self::$instance==null)
		{
			//echo 'initializing<hr>';
			self::$instance=new RegisterGlobal();
			//self::$instance->factory=new JsFactory();
		}
		return self::$instance;
	}
	
	public function insertGlobal($object)
	{
		$this->model = $object;
	}
}

class ThisModel extends Model
{
	protected $params;
	public function className()
	{
		return __CLASS__;
	}
	public function output()
	{
		$this->params[] = "1";
		$this->params[] = "2";
		$this->params[] = "3";
		//echo $this->name;exit;
	}
}
class ThisModel2 extends Model
{
	public function className()
	{
		return __CLASS__;
	}
	public function output()
	{
		echo $this->name;exit;
	}
}
class ThisModel3 extends Model
{
	public function className()
	{
		return __CLASS__;
	}
	public function output()
	{
		echo $this->name;exit;
	}
}
$obj1 = new ThisModel();
$obj1->output();
//$obj2 = new ThisModel2();
//$obj3 = new ThisModel3();
RegisterGlobal::ins()->insertGlobal($obj1);
//RegisterGlobal::ins()->insertGlobal($obj2);
//RegisterGlobal::ins()->insertGlobal($obj3);
abstract class Model
{
	protected $name;
	public function __construct()
	{
		$this->name = $this->className();
	}
	abstract function className();
	
	public function __get($name)
	{
		return $this->$name;
	}
}
$obj2=new ThisObject2();
$obj2->test();
class ThisObject2
{
	public function test()
	{
		print_r(RegisterGlobal::ins()->model->params);exit;
	}
}
?>