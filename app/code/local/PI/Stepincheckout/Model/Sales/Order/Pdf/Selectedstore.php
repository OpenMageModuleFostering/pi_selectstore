<?php
class PI_Stepincheckout_Model_Sales_Order_Pdf_Selectedstore extends Mage_Sales_Model_Order_Pdf_Total_Default
{
    public function getTotalsForDisplay()
    {
        // getAmount is defined in the parent class and should read
        // the value from the defined source_field in your config.xml
        $order = $this->getOrder();
        $selectedStore = $order->getSelectedStore();
        
        $storeDetail = Mage::getModel('stepincheckout/selectstore')->load($selectedStore);            
        $value = $storeDetail->getPrice();
        //if($value>0)
        //{
            $label = Mage::helper('stepincheckout')->__('Selected Store');        
            $fontSize = $this->getFontSize() ? $this->getFontSize() : 7;
            $total = array(
                'amount'    => $order->formatPriceTxt($value),
                'label'     => $label,
                'font_size' => $fontSize
            );
            
        //}
            
          return array($total);
    }
}
?>