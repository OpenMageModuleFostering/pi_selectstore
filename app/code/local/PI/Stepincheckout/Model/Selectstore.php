<?php

class PI_Stepincheckout_Model_Selectstore extends Mage_Core_Model_Abstract {
    public function _construct() {
        parent::_construct();
        $this->_init('stepincheckout/selectstore');
    }
}