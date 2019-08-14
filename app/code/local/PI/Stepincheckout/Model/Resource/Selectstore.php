<?php

class PI_Stepincheckout_Model_Resource_Selectstore extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('stepincheckout/store', 'store_id');
    }
}