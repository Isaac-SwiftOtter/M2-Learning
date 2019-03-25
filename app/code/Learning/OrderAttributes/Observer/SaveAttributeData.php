<?php
/**
 * @by SwiftOtter, Inc., 3/25/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Learning\OrderAttributes\Helper\Attributes;
use Learning\OrderAttributes\Model\AttributeFactory;
use Learning\OrderAttributes\Model\AttributeRepository;

class SaveAttributeData implements ObserverInterface
{
    /**
     * @var Attributes
     */
    private $attributeHelper;

    /**
     * @var AttributeFactory
     */
    private $attributeFactory;

    /**
     * @var AttributeRepository
     */
    private $attributeRepository;

    /**
     * SaveAttributeData constructor.
     * @param Attributes $attributeHelper
     * @param AttributeFactory $attributeFactory
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(Attributes $attributeHelper, AttributeFactory $attributeFactory, AttributeRepository $attributeRepository)
    {
        $this->attributeHelper = $attributeHelper;
        $this->attributeFactory = $attributeFactory;
        $this->attributeRepository = $attributeRepository;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        return $this;
    }


    //Save data to 'learning_custom_order_attributes' table
//$orderId = $order->getData('entity_id');
//$attributeArray = $this->attributeHelper->attributeFieldDataToArray($orderAttributeData);
//
//foreach ($attributeArray as $attributeList) {
//$attributeData = explode(" // ", $attributeList);
//$attributeCode = $attributeData[0];
//$attributeCustomerInput = $attributeData[1];
//
//$attributeLabelArray = $this->attributeHelper->getAttributeLabels();
//$attributeLabel = $attributeLabelArray[$attributeCode];
//
//$attribute = $this->attributeFactory->create();
//$attribute->setData('order_id', $orderId);
//$attribute->setData('attribute_label', $attributeLabel);
//$attribute->setData('attribute_data', $attributeCustomerInput);
//
//$this->attributeRepository->save($attribute);
//}
}