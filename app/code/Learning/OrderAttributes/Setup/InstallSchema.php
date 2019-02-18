<?php
/**
 * @by SwiftOtter, Inc., 1/2/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        /**
         * Create table 'learning_custom_order_attributes'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('learning_custom_order_attributes')
            )->addColumn(
                'entity_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->addColumn(
                'attribute_code',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Attribute Code'
            )->addColumn(
                'attribute_data',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Attribute Data'
            );
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'learning_custom_order_attributes_definitions'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('learning_custom_order_attributes_definitions')
            )->addColumn(
                'attribute_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
                'Attribute ID'
            )->addColumn(
                'attribute_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Attribute Code'
            )->addColumn(
                'attribute_label',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Attribute Label'
            );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}