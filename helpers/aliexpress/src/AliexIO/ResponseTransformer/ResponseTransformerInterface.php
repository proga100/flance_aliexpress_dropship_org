<?php  
 

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace CLC\AliexApi;
 defined('_JEXEC') or die('Restricted access');

interface ResponseTransformerInterface
{
    public function transform($response);
}
