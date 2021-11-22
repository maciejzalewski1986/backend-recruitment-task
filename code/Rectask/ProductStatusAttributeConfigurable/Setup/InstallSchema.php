<?php

namespace Rectask\ProductStatusAttributeConfigurable\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        // Nazwa tabeli
        $tableName = $installer->getTable('product_status_attribute_configurable_options');
        // Jesli tabela nie istnieje
        if ($installer->getConnection()->isTableExists($tableName) != true) {
            // Create tutorial_simplenews table
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'label',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'nazwa opcji w ui'
                )
                ->addColumn(
                    'color',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'wyswietlany kolor'
                )
               
                ->setComment('tabela modułu ProductStatusAttributeConfigurable')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }
        
        if ($installer->getConnection()->isTableExists($tableName) == true) {
        	// ładowanie opcji domyslnych
        	$data = 
        	[
        			[
        					'label' => 'Option 1',
        					'color' => '#FF0000',
        			],
        			[
        					'label' => 'Option 2',
        					'color' => '#008000',
        			]
        	];
        	
        	// Insert data to table
        	foreach ($data as $item) {
        		$installer->getConnection()->insert($tableName, $item);
        	}
        }

        $installer->endSetup();
    }
}