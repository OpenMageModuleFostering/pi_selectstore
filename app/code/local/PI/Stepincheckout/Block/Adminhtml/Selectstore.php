<?php

class PI_Stepincheckout_Block_Adminhtml_Selectstore extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {

        $this->_controller = 'adminhtml_selectstore';
        $this->_blockGroup = 'stepincheckout';
        $this->_headerText = Mage::helper('stepincheckout')->__('Manage Store');
        $this->_addButtonLabel = Mage::helper('stepincheckout')->__('Add New Store');     
        
        parent::__construct(); 
    }

}