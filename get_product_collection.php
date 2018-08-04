<?php
ini_set('display_errors', 'on');
require('app/mage.php');
Mage::app();
$searchString = "test";
$_productCollection = Mage::getModel('catalog/product')->getCollection()
														->addAttributeToSelect('*')
														->addAttributeToFilter('name',array('like' => '%'.$searchString.'%'));

if(!empty($_productCollection)){
	//print_r(get_class_methods($_productCollection));
	foreach($_productCollection as $_product)
	{
		//echo "<pre>";
		echo $_product->getID() ."<br/>";
		echo $_product->getName() ."<br/>";
		echo $_product->getPrice() ."<br/>";
		echo $_product->getDescription() ."<br/>";
		echo $_product->getShortDescription() ."<br/>";
		echo $_product->getSku() ."<br/>";
		echo $_product->getMetaDescription() ."<br/>";
		echo $_product->getMetaKeyword() ."<br/>";
		echo $_product->getMetaTitle() ."<br/>";
		echo $_product->getProductUrl()."<br/>";
		
		echo "<hr>";
	}
	
} else {
	echo "There are no products macthing in the section";
}
echo $_SERVER[HTTP_HOST]."<br/>";

?>
<a href="<?php echo Mage::getStoreUrl()?>"><?php echo $_product->getName()?></a>;

