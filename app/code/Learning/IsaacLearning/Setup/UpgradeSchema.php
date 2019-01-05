<?php
/**
 * @by SwiftOtter, Inc., 11/8/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(),'2.0.1', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('isaac_learning'),
                'priority',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 200,
                    'comment' => 'Task Priority',
                    'after' => 'title'
                ]
            );
        }
        $setup->endSetup();
    }
}