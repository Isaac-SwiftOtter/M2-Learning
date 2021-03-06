<?php
/**
 * @by SwiftOtter, Inc., 3/13/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions\CollectionFactory;
use Learning\OrderAttributes\Helper\Attributes;

class CustomAttributeLayoutProcessor
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var Attributes
     */
    private $attributeHelper;

    /**
     * CustomAttributeLayoutProcessor constructor
     * @param CollectionFactory $collectionFactory
     * @param Attributes $attributeHelper
     */
    public function __construct(CollectionFactory $collectionFactory, Attributes $attributeHelper)
    {
        $this->collectionFactory = $collectionFactory;
        $this->attributeHelper = $attributeHelper;
    }


    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, array $jsLayout)
    {
        $attributeList = $this->attributeHelper->getListOfAttributes();

        foreach ($attributeList as $index => $attribute) {
            $attributeId = $attribute['attribute_id'];
            $attributeCode = $attribute['attribute_code'];
            $attributeLabel = $attribute['attribute_label'];

            $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['before-form']['children']
            ['custom_field_' . $attributeCode] = [
                'component' => 'Magento_Ui/js/form/element/abstract',
                'config' => [
                    'customScope' => 'shippingAddress',
                    'template' => 'ui/form/field',
                    'elementTmpl' => 'ui/form/element/input',
                    'id' => $attributeCode . '_field'
                ],
                'dataScope' => 'shippingAddress.custom_field_' . $attributeCode,
                'label' => __($attributeLabel),
                'provider' => 'checkoutProvider',
                'visible' => true,
                'validation' => [
                    'required-entry' => true,
                    'max_text_length' => 200,
                    'min_text_length' => 1
                ],
                'sortOrder' => ($index * 10),
                'options' => [],
                'customEntry' => true,
                'id' => $attributeCode,
                'attribute_id' => $attributeId

            ];
        }

        return $jsLayout;
    }

}