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
                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
                'Entity ID'
            )->addForeignKey(
                $installer->getFkName(
                    'learning_custom_order_attributes',
                    'entity_id',
                    'sales_order',
                    'entity_id'
                ),
                'entity_id',
                $installer->getTable('sales_order'),
                'entity_id',
                \Magento\Framework\Db\Ddl\Table::ACTION_CASCADE
            )->setComment('Learning Custom Order Attributes');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}