<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('hackathonwebsite_projectidea/projectidea'))
    ->addColumn(
        'projectIdea_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
             'identity' => true,
             'unsigned' => true,
             'nullable' => false,
             'primary'  => true,
        ),
        'Primary key of the projectIdea'
    )
    ->addColumn(
        'submitter',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        255,
        array(),
        'the name of the submitter'
    )
    ->addColumn(
        'title',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        255,
        array(),
        'the name of the project'
    )
    ->addColumn(
        'description',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        null,
        array(),
        'description of the project'
    );

$installer->getConnection()->createTable($table);

$installer->endSetup();