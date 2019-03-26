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
         * Create table 'learning_custom_order_attributes_definitions'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('learning_custom_order_attributes_definitions')
            )->addColumn(
                'attribute_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
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

        /**
         * Create table 'learning_custom_order_attributes'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('learning_custom_order_attributes')
            )->addColumn(
                'entity_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->addColumn(
                'order_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'Order ID'
            )->addColumn(
                'attribute_label',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Attribute Label'
            )->addColumn(
                'attribute_data',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Attribute Data'
            )->addIndex(
                $installer->getIdxName('learning_custom_order_attributes', ['order_id']),
                ['order_id']
            )->addForeignKey(
                $installer->getFkName(
                    'learning_custom_order_attributes',
                    'order_id',
                    'sales_order',
                    'entity_id'
                ),
                'order_id',
                $installer->getTable('sales_order'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )->setComment('Custom Order Attribute Data');
        $installer->getConnection()->createTable($table);

        /**
         * Add "order_attribute_field_data" column to "quote" table
         */
        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'order_attribute_field_data',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'comment' => 'Order Attribute Customer Data'
            ]
        );

        /**
         * Add "order_attribute_field_data" column to "sales_order" table
         */
        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            'order_attribute_field_data',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'comment' => 'Order Attribute Customer Data'
            ]
        );

        $installer->endSetup();
    }
}