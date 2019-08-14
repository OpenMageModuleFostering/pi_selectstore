<?php
class PI_Stepincheckout_Model_Checkout_Type_Onepage extends Mage_Checkout_Model_Type_Onepage{
    
    public function saveSelectedStore($data){
        if (empty($data)) {
            return array('error' => -1, 'message' => $this->_helper->__('Invalid data.'));
        }
        $this->getQuote()->setSelectedStore($data['selected_store']);
        $this->getQuote()->collectTotals();
        $this->getQuote()->save();
 
        $this->getCheckout()
        ->setStepData('select_store', 'allow', true)
        ->setStepData('select_store', 'complete', true)
        ->setStepData('payment', 'allow', true);
 
        return array();
    }
}
