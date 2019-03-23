<?php  

 

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Operations;
  defined('_JEXEC') or die('Restricted access');  
class GetProductDetail extends AbstractOperation
{
    public function getName()
    {
        return 'getPromotionProductDetail';
    }

    public function setFields($fields)
    {
        $this->parameter['fields'] = $fields;
        return $this;
    }
    public function setProductId($productId)
    {
        $this->parameter['productId'] = $productId;
        return $this;
    }
}
