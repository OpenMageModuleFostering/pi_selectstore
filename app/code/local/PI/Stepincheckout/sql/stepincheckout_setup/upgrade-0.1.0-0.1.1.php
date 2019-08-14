<?php
$installer = $this;
$installer->startSetup();

//Add Column to sales table
$this->_conn->addColumn($this->getTable('sales/quote'), 'selected_store', 'float');

$this->_conn->addColumn($this->getTable('sales/order'), 'selected_store', 'float');

$installer->endSetup();