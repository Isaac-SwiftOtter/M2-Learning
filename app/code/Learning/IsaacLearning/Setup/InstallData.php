<?php
/**
 * @by SwiftOtter, Inc., 10/18/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        //Insert sample task in isaac_learning
        $installer->getConnection()->insert(
            $installer->getTable('isaac_learning'),
            ['learning_id' => '', 'title' => 'Sample Task', 'description' => 'Description of sample task']
        );

        //Insert second sample task in isaac_learning
        $installer->getConnection()->insert(
            $installer->getTable('isaac_learning'),
            ['learning_id' => '', 'title' => 'Second Sample Task', 'description' => 'Description of second sample task']
        );

        $installer->endSetup();
    }
}