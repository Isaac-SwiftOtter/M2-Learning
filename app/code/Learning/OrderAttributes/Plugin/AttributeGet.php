<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\Attribute\CollectionFactory;
use Learning\OrderAttributes\Model\OrderExtensionAttributeFactory;
use Magento\Sales\Api\Data\OrderExtensionFactory;

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
     * AttributeGet constructor.
     * @param CollectionFactory $collectionFactory
     * @param OrderExtensionAttributeFactory $extensionAttributeFactory
     * @param OrderExtensionFactory $orderExtensionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        OrderExtensionAttributeFactory $extensionAttributeFactory,
        OrderExtensionFactory $orderExtensionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->extensionAttributeFactory = $extensionAttributeFactory;
        $this->orderExtensionFactory = $orderExtensionFactory;
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
        $attributeList = [];
        $attributes = $this->collectionFactory->create();

        foreach ($attributes->getItems() as $attribute) {
            $attributeList[] = [$attribute];
        }

        $extensionAttributes = $order->getExtensionAttributes();
        $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();
        $orderAttribute = $this->extensionAttributeFactory->create();
        $orderAttribute->getAttributeDataFromQuote($attributeList);
        $orderExtension->setCustomOrderData($orderAttribute);
        $order->setExtensionAttributes($orderExtension);

        return $order;
    }
}