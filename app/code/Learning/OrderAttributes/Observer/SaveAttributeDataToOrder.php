<?php
/**
 * @by SwiftOtter, Inc., 3/25/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Learning\OrderAttributes\Helper\Attributes;

class SaveAttributeDataToOrder implements ObserverInterface
{
    /**
     * @var Attributes
     */
    private $attributeHelper;

    /**
     * SaveAttributeDataToOrder constructor.
     * @param Attributes $attributeHelper
     */
    public function __construct(Attributes $attributeHelper)
    {
        $this->attributeHelper = $attributeHelper;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $orderAttributeData = $observer->getData('quote')->getData('order_attribute_field_data');

        $order->setData('order_attribute_field_data', $orderAttributeData);

        return $this;
    }
}