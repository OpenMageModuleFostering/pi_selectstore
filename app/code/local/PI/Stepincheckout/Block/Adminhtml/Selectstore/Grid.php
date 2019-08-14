<?php

class PI_Stepincheckout_Block_Adminhtml_Selectstore_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('storeGrid');
        $this->setDefaultSort('store_id');// sorting according to which colunm name
    }

    protected function _prepareCollection() {

        $collection = Mage::getModel('stepincheckout/selectstore')->getCollection();
        $this->setCollection($collection);


        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('store_id', array(
            'header' => Mage::helper('stepincheckout')->__('ID'),
            'width' => '25%',
            'index' => 'store_id',
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('stepincheckout')->__('Store Name'),
            'width' => '25%',
            'index' => 'name',
        ));
          

        $this->addColumn('action', array(
            'header' => Mage::helper('stepincheckout')->__('Action'),
            'width' => '100',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('stepincheckout')->__('Edit'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
            'is_system' => true,
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction() {

        $this->setMassactionIdField('store_id');
        $this->getMassactionBlock()->setFormFieldName('store_id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('stepincheckout')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('stepincheckout')->__('Are you sure?')
        ));

        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}

