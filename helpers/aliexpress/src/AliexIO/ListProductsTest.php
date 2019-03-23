<?php  


/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Tests;
    defined('_JEXEC') or die('Restricted access');

use AliexApi\Operations\ListProducts;
 
class ListProductsTest extends \PHPUnit_Framework_TestCase {

    public function testListProducts()
    {
        $listproducts = new ListProducts();
    }
 
}