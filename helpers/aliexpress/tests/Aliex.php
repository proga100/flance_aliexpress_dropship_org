<?php 

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Tests;
    defined('_JEXEC') or die('Restricted access');
//include_once('c:\opens\domains\localhost\development\administrator\components\com_aliexpressaffiliateforvirtuemart\helpers\aliexpress\vendor\autoload.php');
include_once(JPATH_ADMINISTRATOR."/components/com_aliexpressaffiliateforvirtuemart/helpers/aliexpress/vendor/autoload.php");

use AliexApi\Configuration\GenericConfiguration;
use AliexApi\AliexIO;
use AliexApi\Operations\ListProducts;
use AliexApi\Operations\GetProductDetail;
 

class AliexIOTest   {
	
	var $comparams = null;

    public function aliconfig($conf)
    {
		

	$comparams = $this->comparams;
		
		
		
		$this->default_hidden = $comparams->get('default_hidden');
	
		$this->ali_api = $comparams->get('ali_api');
		$this->tracking_id = $comparams->get('tracking_id');
		
		if  ($comparams->get('default_hidden') ==1 ){
			
		 $conf
            ->setApiKey($comparams->get('ali_api'))
            ->setTrackingKey($comparams->get('tracking_id'))
            ->setDigitalSign('dummydigitalsign');
            return $conf;	
			
		}else{
     
		$conf
            ->setApiKey('12345')
            ->setTrackingKey('trackkey')
            ->setDigitalSign('dummydigitalsign');
            return $conf;
			
		}

    }
 
    public function testAliexIO($keyword,$pageNo,$pageSize,$sort,$originalPriceFrom,$originalPriceTo,$startCreditScore,$endCreditScore, $currency, $category_id)
    {
        $conf = new GenericConfiguration();
        $this->aliconfig($conf);
        $aliexIO = new AliexIO($conf);

        $listproducts = new ListProducts();
        $listproducts->setFields('productId,productTitle,productUrl,imageUrl,allImageUrls,localPrice,salePrice,discount,evaluateScore,originalPrice,commission,commissionRate,30daysCommission,volume,packageType,lotNum,validTime');
	




		$listproducts->setLocalCurrency($currency);
		$listproducts->setSort($sort);
		$listproducts->setPageNo($pageNo);
		$listproducts->setPageSize($pageSize);
        $listproducts->setKeywords($keyword);
		$listproducts->setOriginalPriceFrom($originalPriceFrom);
		$listproducts->setOriginalPriceTo($originalPriceTo);
		$listproducts->setStartCreditScore($startCreditScore);
		$listproducts->setEndCreditScore($endCreditScore);
		$listproducts->setCategoryId($category_id);
        $listproducts->setHighQualityItems('true');
        $formattedResponse = $aliexIO->runOperation($listproducts);

	return   $formattedResponse;
	
    }
	
	
    public function setProductId($productId)
    {
        $this->parameter['productId'] = $productId;
        return $this;
    }

    public function testGetProductDetail($product_id, $currency )
    {
		 $conf = new GenericConfiguration();
        $this->aliconfig($conf);
         $aliexIO= new AliexIO($conf);
		   $listproductdetails = new GetProductDetail();
		     $listproductdetails->setFields('productId,productTitle,productUrl,imageUrl,allImageUrls,localPrice,salePrice,discount,evaluateScore,originalPrice,commission,commissionRate,30daysCommission,volume,packageType,lotNum,validTime');
		 $listproductdetails->setProductId($product_id);
		 $listproductdetails->setLocalCurrency($currency);
		  $formattedResponse =  $aliexIO->runOperation( $listproductdetails);
		
		  	return   $formattedResponse;
    }
 

 
}

if (!empty($_POST['directionTable'])) {
	$sort= $_POST['directionTable'];
if ($sort == 'asc' ) $sort = 'orignalPriceUp';
if ($sort == 'desc' ) $sort = 'orignalPriceDown';


}else {
	
	$sort=NUll;
}
$keyword= $_POST['keyword'];
$product_id= $_POST['product_id'];

if (!empty($_POST['limitstart'])) {
$pageNo= $_POST['limitstart']+1;
}else {
	
	$pageNo=NUll;
}
$currency= $_POST['vir_currency'];

$endCreditScore = $_POST['max_score'];
$startCreditScore = $_POST['min_score'];
$originalPriceFrom = $_POST['min_price'];
$originalPriceTo =$_POST['max_price'];

if (!empty($_POST['limit'])) {
$pageSize= $_POST['limit'];
}else {
	
	$_POST['limit']=$pageSize=5;
}

$category_id = $_POST['affiliate_cat_id'];


$Ali = new AliexIOTest;
$Ali->comparams= $comparams ;
if($product_id =='') $aliexpress_json = $Ali->testAliexIO($keyword,$pageNo,$pageSize,$sort,$originalPriceFrom,$originalPriceTo,$startCreditScore,$endCreditScore,$currency,$category_id );
if($product_id !='') $aliexpress_json = $Ali->testGetProductDetail($product_id,$currency );


print_r ($aliexpress_json);exit;

