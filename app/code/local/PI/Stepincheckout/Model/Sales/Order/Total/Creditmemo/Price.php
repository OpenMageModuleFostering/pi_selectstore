<?php
class PI_Stepincheckout_Model_Sales_Order_Total_Creditmemo_Price extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
	public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
	{
		$order = $creditmemo->getOrder();
		
    $storeDetail = Mage::getModel('stepincheckout/selectstore')->load($order->getSelectedStore());

    $value = $storeDetail->getPrice();
                
		if ($value > 0) {
			$creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $value);
			$creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $value);
			$creditmemo->setSelectedStore($order->getSelectedStore());
			//$creditmemo->setBaseFeeAmount($basefeeAmountLeft);
		}
		return $this;
	}
}
