<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\Attribute\CollectionFactory;
use Learning\OrderAttributes\Model\ExtensionAttributeFactory;

class AttributeGet
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var ExtensionAttributeFactory
     */
    private $extensionAttributeFactory;

    /**
     * AttributeGet constructor.
     * @param CollectionFactory $collectionFactory
     * @param ExtensionAttributeFactory $extensionAttributeFactory
     */
    public function __construct(CollectionFactory $collectionFactory, ExtensionAttributeFactory $extensionAttributeFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->extensionAttributeFactory = $extensionAttributeFactory;
    }

    public function afterGet(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderInterface $resultOrder
    )
    {
        $resultOrder = $this->getAttributes($resultOrder);
        return $resultOrder;
    }

    private function getAttributes(\Magento\Sales\Api\Data\OrderInterface $order)
    {
        $attributeList = [];
        $attributes = $this->collectionFactory->create();

        foreach ($attributes->getItems() as $attribute) {
            $attributeList[] = [$attribute];
        }

        $extensionAttributes = $order->getExtensionAttributes();
        $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();
        $orderAttribute = $this->extensionAttributeFactory->create();
        $orderAttribute->setValue($attributeList);
        $orderExtension->setOrderAttribute($orderAttribute);
        $order->setExtensionAttributes($orderExtension);

        return $order;
    }
}