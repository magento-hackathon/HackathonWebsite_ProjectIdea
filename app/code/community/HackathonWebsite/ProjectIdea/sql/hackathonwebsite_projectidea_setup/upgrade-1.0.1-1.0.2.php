<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->getConnection()->addColumn(
    $installer->getTable('hackathonwebsite_projectidea/projectidea'),
    'customer_id',
    array(
         'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
         'comment' => 'Customer who created the idea'
    )
);

$installer->endSetup();