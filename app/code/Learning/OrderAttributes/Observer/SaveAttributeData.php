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
        $orderId = $observer->getData('orderId');
        $attributeArray = $this->attributeHelper->attributeFieldDataToArray($observer->getData('data'));

        foreach ($attributeArray as $attributeList) {
            list($attributeCode, $attributeCustomerInput) = explode(" : ", $attributeList, 2);

            $attributeLabelArray = $this->attributeHelper->getAttributeLabels();
            $attributeLabel = $attributeLabelArray[$attributeCode];

            $attribute = $this->attributeFactory->create();
            $attribute->setData('order_id', $orderId);
            $attribute->setData('attribute_label', $attributeLabel);
            $attribute->setData('attribute_data', $attributeCustomerInput);

            $this->attributeRepository->save($attribute);
        }

        return $this;
    }
}