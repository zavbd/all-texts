<?php
$this_page = new TestPage();
TestPageJs::addJs($this_page);
//JsFactory::create("TestPageJs");
//CssFactory::create("TestPageCss");

class Page
{
	public function __construct()
	{
	}
}
class TestPage extends Page
{
	protected $html = "";
	
	public function __construct()
	{
		$this->html = "start from hereaaaaaa<hr/>";
    }
    
    public function __set($name, $value)
    {
    	$this->$name = $value;
    }
    
    public function __get($name)
    {
    	return $this->$name;
    }
}

class Js
{
}
class TestPageJs
{
	public static function addJs(Page $page_)
	{
		$page_->html.=<<<__JS__
<script>alert('here');</script>
__JS__;
	}
}
/*
class Css
{

}
class TestPageCss extends Css
{
	public function __construct()
	{
		TestPage::ins()->html.=<<<__JS__
<style>body{color:#ffff00;}</style>
__JS__;
	}
}*/
echo $this_page->html;exit;
?>