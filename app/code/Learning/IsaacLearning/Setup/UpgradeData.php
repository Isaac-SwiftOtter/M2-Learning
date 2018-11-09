<?php
/**
 * @by SwiftOtter, Inc., 11/8/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->getConnection();

        if (version_compare($context->getVersion(),'2.1.0', '<')) {
            $setup->updateTableRow(
                $setup->getTable('isaac_learning'),
                'learning_id',
                1,
                'priority',
                'High'
            );
            $setup->updateTableRow(
                $setup->getTable('isaac_learning'),
                'learning_id',
                2,
                'priority',
                'Low'
            );
        }
        $setup->endSetup();
    }
}