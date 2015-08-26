<?php
namespace App\Crawl;

use DOM\simple_html_dom;

class ProductDesc
{
	private $des;

	public function __construct($desc){
	$this->des=new simple_html_dom();
	$this->des->load($desc);
	}

	public function getDesc()
    {
			/* For description it can be changed to meta name description but
			this case it uses the description of the product Page.*/
        /*
        foreach($this->des->find("meta[name='description']") as $description)
        return html_entity_decode(trim($description->content), ENT_QUOTES);
        */

        foreach($this->des->find('div.productText p') as $description)
        return html_entity_decode(trim($description->plaintext));
    }

}

?>