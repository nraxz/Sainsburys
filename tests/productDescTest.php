<?php
use Render\UrlRender;
use App\Crawl\ProductDesc;

class ProductDescTest extends PHPUnit_Framework_TestCase
{
    private $html;


    public function setUp()
    {
        $file = realpath(__DIR__ . '/tests/subpage.html');
        $reader = new UrlRender('file://' . $file);
        $this->html = new ProductDesc($reader->open());

    }
    public function test_getDesc()
    {
        $expected_description = "Apricots";
        $this->assertEquals($expected_description, $this->html->getDesc());
    }
}