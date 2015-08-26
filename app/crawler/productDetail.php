<?php
namespace App\Crawl;

use Dom\simple_html_dom;

class ProductDetail
{
	private $detail;

	public function __construct($url){
	$this->detail=new simple_html_dom();
	$this->detail->load($url);
	}

	public function productTitle()
    {

		foreach($this->detail->find('h3 a') as $title)
		return html_entity_decode(trim($title->plaintext));

    }

    public function productPrice()
    {
	    foreach($this->detail->find('p.pricePerUnit') as $price)
        preg_match('!\d+\.*\d*!', $price->plaintext, $match);
        return number_format((float)$match[0], 2, '.', '');
    }

    public function productLink()
    {
	    foreach($this->detail->find('h3 a') as $link)
        //return html_entity_decode(trim($link->getAttribute('href')));
        return html_entity_decode(trim($link->href));
    }

    public function linkSize($number)
    {
        foreach (array('b', 'kb', 'mb', 'gb', 'tb', 'pb', 'eb') as $unit) {
            if (abs($number) < 1024) {
                return sprintf("%3.1f%s", $number, $unit);
            }
            $number /= 1024;
        }
        return sprintf("%.1f%s", $number, 'eb');
    }


}