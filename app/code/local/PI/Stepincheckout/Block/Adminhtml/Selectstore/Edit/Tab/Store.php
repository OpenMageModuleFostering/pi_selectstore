<?php

class PI_Stepincheckout_Block_Adminhtml_Selectstore_Edit_Tab_Store extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('selectstore_form', array('legend' => Mage::helper('stepincheckout')->__('Store Details')));

        $fieldset->addField('name', 'text', array(
            'label' => Mage::helper('stepincheckout')->__('Store Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'name',
        ));
        
        $fieldset->addField('price', 'text', array(
            'label' => Mage::helper('stepincheckout')->__('Price'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'price',
        ));
        
       

        if (Mage::getSingleton('adminhtml/session')->getSelectstoreData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getSelectstoreData());
            Mage::getSingleton('adminhtml/session')->setDriverData(null);
        } elseif (Mage::registry('selectstore_data')) {
            $form->setValues(Mage::registry('selectstore_data')->getData());
        }
        return parent::_prepareForm();
    }

}
