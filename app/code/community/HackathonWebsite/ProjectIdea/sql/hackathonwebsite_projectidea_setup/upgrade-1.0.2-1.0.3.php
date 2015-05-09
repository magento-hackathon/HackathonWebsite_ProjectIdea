<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->getConnection()->addColumn(
    $installer->getTable('hackathonwebsite_projectidea/projectidea'),
    'repository_url',
    array(
         'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
         'comment' => 'Repository URL',
         'length' => 255
    )
);

$installer->endSetup();
