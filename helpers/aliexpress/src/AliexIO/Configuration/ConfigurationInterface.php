<?php  
  namespace AliexApi\Configuration;
  defined('_JEXEC') or die('Restricted access');

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  /*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  /*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 


interface ConfigurationInterface
{

    public function getApiKey();

    public function getTrackingKey();

    public function getDigitalSign();

    public function getRequest();

    public function getRequestFactory();

    public function getResponseTransformer();

    // public function getResponseTransformerFactory();

}
