<?php

class PI_Stepincheckout_Block_Adminhtml_Selectstore_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

 public function __construct()
  {
      parent::__construct();
      $this->setId('selectstore_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('stepincheckout')->__('Store Informations'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('stepincheckout')->__('Store Informations'),
          'title'     => Mage::helper('stepincheckout')->__('Store Informations'),
          'content'   => $this->getLayout()->createBlock('stepincheckout/adminhtml_selectstore_edit_tab_store')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
