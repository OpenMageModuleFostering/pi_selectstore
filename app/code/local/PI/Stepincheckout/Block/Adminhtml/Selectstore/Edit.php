<?php

class PI_Stepincheckout_Block_Adminhtml_Selectstore_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'stepincheckout';
        $this->_controller = 'adminhtml_selectstore'; 

        $this->_updateButton('delete', 'label', Mage::helper('stepincheckout')->__('Delete'));
       
       

        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
                ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('edge_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edge_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edge_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
               
            }
        ";
    }

    public function getHeaderText() {
        if (Mage::registry('selectstore_data') && Mage::registry('selectstore_data')->getId()) {
            return Mage::helper('stepincheckout')->__("Edit Store '%s'", $this->htmlEscape(Mage::registry('selectstore_data')->getName()));
        } else {
            return Mage::helper('stepincheckout')->__('Add Store');
        }
    }

}
