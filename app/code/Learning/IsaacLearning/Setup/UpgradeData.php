<?php
/**
 * @by SwiftOtter, Inc., 11/8/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Customer\Model\Customer;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\ResourceModel\Attribute;
use Magento\Customer\Setup\CustomerSetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var Attribute
     */
    private $attributeResource;

    /**
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * UpgradeData constructor.
     * @param EavSetupFactory $eavSetupFactory
     * @param Config $eavConfig
     * @param Attribute $attributeResource
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig,
        Attribute $attributeResource,
        CustomerSetupFactory $customerSetupFactory
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->attributeResource = $attributeResource;
        $this->customerSetupFactory = $customerSetupFactory;
    }

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

        if (version_compare($context->getVersion(), '2.2.0', '<')) {
            /**
             * Implementing Exam Objective 6.7
             */
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->addAttribute(Customer::ENTITY, 'learning_attribute', [
                'type' => 'varchar',
                'label' => 'Learning Attribute',
                'input' => 'text',
                'required' => 'false',
                'visible' => 'true',
                'user_defined' => 'true',
                'position' => 999,
                'system' => 0
            ]);

            $learningAttribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'learning_attribute');
            $learningAttribute->setData('used_in_forms', ['adminhtml_customer']);
            $this->attributeResource->save($learningAttribute);

            /**
             * Implementing Exam Objective 6.8
             */
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

            $customerSetup->addAttribute('customer_address', 'learning_customer', [
                'type' =>'varchar',
                'label' => 'Learning Customer',
                'input' => 'text',
                'required' => 'false',
                'visible' => 'true',
                'user_defined' => 'true',
                'sort_order' => 999,
                'position' =>999,
                'system' => 0,
                'is_html_allowed_on_front' => 'true',
                'visible_on_front' => 'true'
            ]);

            $learningAddressAttribute = $this->eavConfig->getAttribute('customer_address', 'learning_customer');
            $learningAddressAttribute->setData('used_in_forms', ['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']);
            $this->attributeResource->save($learningAddressAttribute);
        }

        $setup->endSetup();
    }
}