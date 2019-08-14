<?php
class PI_Stepincheckout_Model_Sales_Quote_Address_Total_Price extends Mage_Sales_Model_Quote_Address_Total_Abstract{
    protected $_code = 'selected_store';
 
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);
 
        $this->_setAmount(0);
        $this->_setBaseAmount(0);
 
        $items = $this->_getAddressItems($address);
        if (!count($items)) {
            return $this; //this makes only address type shipping to come through
        }
 
 
        $quote = $address->getQuote();
 
        if($quote->getSelectedStore()!=''){ 
            
 
            $selectedStore =  $quote->getSelectedStore();
            $storeDetail = Mage::getModel('stepincheckout/selectstore')->load($selectedStore);

 
            $address->setGrandTotal($address->getGrandTotal() + $storeDetail->getPrice());
            $address->setBaseGrandTotal($address->getBaseGrandTotal() + $storeDetail->getPrice());
        }
    }
 
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        $quote = $address->getQuote();
        if($quote->getSelectedStore()!=''){
            
            $selectedStore =  $quote->getSelectedStore();
            $storeDetail = Mage::getModel('stepincheckout/selectstore')->load($selectedStore);
            
            $amt = $storeDetail->getPrice()/2;
            $address->addTotal(array(
                    'code'=> $this->getCode(),
                    'title'=> $storeDetail->getName(),
                    'value'=> $amt
            ));
        }
        return $this;
    }
}
