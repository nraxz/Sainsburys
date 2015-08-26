<?php
namespace App\Crawl;
use Dom\simple_html_dom;
use Render\UrlRender;
use App\Crawl\ProductDetail;
use App\Crawl\ProductDesc;

class Product
{
    private $link;
	private $render;

    public function __construct($url)
    {
	$this->render=new UrlRender($url);
	$this->link=new simple_html_dom();
	$this->link->load($this->render->open());

	}

    public function getDivision(){

	   return $this->link->find('div.product');

   	}

    public function output(){
    	$data['total'] = 0;
	   	foreach($this->getDivision() as $div){
			$name=new ProductDetail($div);
			$link=new UrlRender($name->productLink());
			$file=$link->open();
			$description=new productDesc($file);

				$items = array(
    					'title' => $name->productTitle(),
    					'unit_price' => $name->productPrice(),
    					'size' => $name->linkSize(strlen($file)),
    					'description' => $description->getDesc(),
    			);
	    	$data['result'][] = $items;
	    	$data['total'] += $items['unit_price'];

    		}
	   return $data;
    }
}

