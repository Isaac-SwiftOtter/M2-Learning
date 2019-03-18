<?php
/**
 * @by SwiftOtter, Inc., 3/15/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\ViewModel\AttributesFields;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions\CollectionFactory;

class CheckoutPageFields implements ArgumentInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * CheckoutPageFields constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function getListOfAttributes()
    {
        $attributeList = [];
        $attributes = $this->collectionFactory->create();

        foreach ($attributes->getItems() as $attribute) {
            $attributeList[] = [
                'attribute_id' => $attribute->getData('attribute_id'),
                'attribute_code' => $attribute->getData('attribute_code'),
                'attribute_label' => $attribute->getData('attribute_label')
            ];
        }

        return $attributeList;
    }

    public function getAttributeCodes()
    {
        $attributeCodes = [];
        $attributeList = $this->getListOfAttributes();

        foreach ($attributeList as $attribute) {
            $attributeCodes[] = $attribute['attribute_code'];
        }

        return $attributeCodes;
    }

    public function getAttributeCodeFieldIds()
    {
        $attributeFieldIds = [];
        $attributeCodeList = $this->getAttributeCodes();

        foreach ($attributeCodeList as $attribute) {
            $attributeFieldIds[] = $attribute . "_field";
        }

        return $attributeFieldIds;
    }
}