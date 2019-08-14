<?php
class PI_Stepincheckout_Block_Checkout_Onepage_Selectstore extends Mage_Checkout_Block_Onepage_Abstract{
    protected function _construct()
    {
        $this->getCheckout()->setStepData('select_store', array(
            'label'     => Mage::helper('checkout')->__('Select A Store'),
            'is_show'   => $this->isShow()
        ));
 
        parent::_construct();
    }
}
