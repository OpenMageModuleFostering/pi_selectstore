<?php
class PI_Stepincheckout_Model_Sales_Order_Total_Invoice_Price extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
	public function collect(Mage_Sales_Model_Order_Invoice $invoice)
	{
		$order = $invoice->getOrder();
                
		$storeDetail = Mage::getModel('stepincheckout/selectstore')->load($order->getSelectedStore());
            
                $value = $storeDetail->getPrice();
                
		if ($value>0) {
			$invoice->setGrandTotal($invoice->getGrandTotal() + $value);
			$invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $value);
		} 
                
		$invoice->setSelectedStore($order->getSelectedStore());
		//$invoice->setSelectedStore($order->getSelectedStore());
		return $this;
	}
}
