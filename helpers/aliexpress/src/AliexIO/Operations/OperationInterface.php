<?php  


/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Operations;
  defined('_JEXEC') or die('Restricted access');
interface OperationInterface
{

    public function getName();

    public function getOperationParameter();
}
