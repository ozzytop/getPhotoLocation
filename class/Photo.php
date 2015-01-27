
<?php

class Photo
{
	private $clientId;

	public function __construct($clientId) 
	{
	    $this->setClientId($clientId);
	}

	public function setClientID($clientId)
	{
		$this->clientId=$clientId;
	}	

	private function connectInstagramApi($url)
	{
		$ch= curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL 			=> $url,
			CURLOPT_RETURNTRANSFER 	=> 1,
			CURLOPT_SSL_VERIFYPEER	=> false,
			CURLOPT_SSL_VERIFYHOST	=> 2
			));
		$results= curl_exec($ch);
		curl_close($ch);
		return $results;
	}

	public function getMediaId($id)
	{
	    $url= 'https://api.instagram.com/v1/media/'.$id.'?client_id='.$this->clientId;
	    $instagramInfo= $this->connectInstagramApi($url);
	    $results = json_decode($instagramInfo, true);
	    return $results;   
	}

	public function getShortcode($shortcode)
	{
	    $url= 'https://api.instagram.com/v1/media/shortcode/'.$shortcode.'?client_id='.$this->clientId;
	    $instagramInfo= $this->connectInstagramApi($url);
	    $results = json_decode($instagramInfo, true);
	    return $results;   
	}
}