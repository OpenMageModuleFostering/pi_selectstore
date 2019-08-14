<?php
$this->startSetup();
$table = new Varien_Db_Ddl_Table();
$table->setName($this->getTable('stepincheckout/store'));
$table->addColumn(
    'store_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    array(
        'auto_increment' => true,
        'unsigned' => true,
        'nullable'=> false,
        'primary' => true
    )
);

$table->addColumn(
    'name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);

$table->addColumn(
    'price',
    Varien_Db_Ddl_Table::TYPE_FLOAT,
    10,
    array(
        'nullable' => false,
    )
);


$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');
$this->getConnection()->createTable($table);

$this->endSetup();
