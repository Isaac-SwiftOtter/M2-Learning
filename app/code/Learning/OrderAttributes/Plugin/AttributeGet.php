<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\Attribute\CollectionFactory;

class AttributeGet
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * AttributeGet constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function afterGet(

        $resultOrder
    )
    {
        $resultOrder =$this->getAttributes($resultOrder);
        return $resultOrder;
    }

    private function getAttributes($order)
    {
        $attributeList = [];
        $attributes = $this->collectionFactory->create();

        foreach ($attributes->getItems() as $attribute) {
            $attributeList[] = [$attribute];
        }

        $extensionAttributes = $order->getExtensionAttributes();
        $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();
    }
}