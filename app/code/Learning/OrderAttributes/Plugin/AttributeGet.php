<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\Attribute\CollectionFactory;
use Learning\OrderAttributes\Model\OrderExtensionAttributeFactory;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Learning\OrderAttributes\Helper\Attributes;

class AttributeGet
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var OrderExtensionAttributeFactory
     */
    private $extensionAttributeFactory;

    /**
     * @var OrderExtensionFactory
     */
    private $orderExtensionFactory;

    /**
     * @var Attributes
     */
    private $attributeHelper;

    /**
     * AttributeGet constructor.
     * @param CollectionFactory $collectionFactory
     * @param OrderExtensionAttributeFactory $extensionAttributeFactory
     * @param OrderExtensionFactory $orderExtensionFactory
     * @param Attributes $attributeHelper
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        OrderExtensionAttributeFactory $extensionAttributeFactory,
        OrderExtensionFactory $orderExtensionFactory,
        Attributes $attributeHelper
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->extensionAttributeFactory = $extensionAttributeFactory;
        $this->orderExtensionFactory = $orderExtensionFactory;
        $this->attributeHelper = $attributeHelper;
    }

    public function afterGet(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderInterface $resultOrder
    )
    {
//        $resultOrder = $this->getAttributes($resultOrder);
        return $resultOrder;
    }

    private function getAttributes(\Magento\Sales\Api\Data\OrderInterface $order)
    {
        $attributeList = $this->attributeHelper->getListOfAttributes();

        $extensionAttributes = $order->getExtensionAttributes();
        $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();
        $orderAttribute = $this->extensionAttributeFactory->create();
        $orderAttribute->getAttributeDataFromQuote($attributeList);
        $orderExtension->setCustomOrderData($orderAttribute);
        $order->setExtensionAttributes($orderExtension);

        return $order;
    }
}