<?php

class PI_Stepincheckout_Model_Resource_Selectstore_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('stepincheckout/selectstore');
    }
}
