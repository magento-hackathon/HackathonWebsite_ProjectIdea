<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->getConnection()->addColumn(
    $installer->getTable('hackathonwebsite_projectidea/projectidea'),
    'created_at',
    array(
         'type' => Varien_Db_Ddl_Table::TYPE_DATETIME,
         'comment' => 'Creation date time from project idea'
    )
);

$installer->endSetup();