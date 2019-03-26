<?php
/**
 * @by SwiftOtter, Inc., 3/25/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Magento\Sales\Api\Data\OrderInterface;
use Magento\Framework\Event\Manager;

class OrderAttributeInfo
{

    /**
     * @var Manager
     */
    private $eventManager;

    /**
     * @param Manager $eventManager
     */
    public function __construct(Manager $eventManager)
    {
        $this->eventManager = $eventManager;
    }


    public function afterPlace(OrderInterface $order)
    {
        $orderId = $order->getEntityId();
        $attributeData = $order->getData('order_attribute_field_data');

        $this->eventManager->dispatch('custom_order_attribute_data_save', ['orderId' => $orderId, 'data' => $attributeData]);

        return $order;
    }
}