<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\AttributeRepository;

class OrderSave
{
    /**
     * @var AttributeRepository
     */
    private $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function afterSave(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderInterface $resultOrder
    )
    {
        $resultOrder = $this->saveAttributeData($resultOrder);
        return $resultOrder;
    }

    private function saveAttributeData(\Magento\Sales\Api\Data\OrderInterface $order)
    {
        $extensionAttributes = $order->getExtensionAttributes();
        if (null !== $extensionAttributes && null !== $extensionAttributes->getAttributes()) {
            $attributeValues = $extensionAttributes->getAttributes()->getValue();
            $this->attributeRepository->save($attributeValues);
        }

        return $order;
    }
}