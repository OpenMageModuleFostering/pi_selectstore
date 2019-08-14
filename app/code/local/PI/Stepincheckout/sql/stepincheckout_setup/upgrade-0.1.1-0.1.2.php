<?php
$installer = $this;
$installer->startSetup();

//Add Column to sales table
$this->_conn->addColumn($this->getTable('sales/invoice'), 'selected_store', 'float');

$this->_conn->addColumn($this->getTable('sales/shipment'), 'selected_store', 'float');

$this->_conn->addColumn($this->getTable('sales/creditmemo'), 'selected_store', 'float');

$installer->endSetup();