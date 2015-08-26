<?php
namespace Render;

class UrlRender
{
	private $url;
    private $ch;
	public function __construct($url)
    {
		$this->url = $url;
      $this->ch = curl_init();
   	curl_setopt($this->ch, CURLOPT_URL, $this->url);
   	curl_setopt($this->ch, CURLOPT_COOKIE, 'SESSION_COOKIEACCEPT=true');
    	curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($this->ch, CURLOPT_HEADER, false);
    	curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
    	curl_setopt($this->ch, CURLOPT_REFERER, $this->url);
    	curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
    	curl_setopt($this->ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.125 Safari/533.4");
     }
    public function open()
    {
        return curl_exec($this->ch);
    }
    public function __destruct()
    {
        curl_close($this->ch);
    }
    
  
 }
  
