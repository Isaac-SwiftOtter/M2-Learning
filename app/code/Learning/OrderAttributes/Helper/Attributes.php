<?php
/**
 * @by SwiftOtter, Inc., 3/20/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Helper;

use Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions\CollectionFactory;

class Attributes
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

    public function getAttributeFieldNames()
    {
        $attributeFieldNames = [];
        $attributeCodeList = $this->getAttributeCodes();

        foreach ($attributeCodeList as $attribute) {
            $attributeFieldNames[] = "custom_field_" . $attribute;
        }

        return $attributeFieldNames;
    }
}