<?php
/**
 * @by SwiftOtter, Inc., 3/13/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions\CollectionFactory;

class CustomAttributeLayoutProcessor
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * CustomAttributeLayoutProcessor constructor
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }


    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, array $jsLayout)
    {
        $attributeList = [];
        $attributes = $this->collectionFactory->create();
        foreach ($attributes->getItems() as $attribute) {
            $attributeList[] = $attribute;
        }

        foreach ($attributeList as $attribute) {
            $attributeId = $attribute->getData('attribute_id');
            $attributeCode = $attribute->getData('attribute_code');
            $attributeLabel = $attribute->getData('attribute_label');

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
                'sortOrder' => '1500',
                'options' => [],
                'customEntry' => true,
                'id' => $attributeCode,
                'attribute_id' => $attributeId

            ];
        }

        return $jsLayout;
    }

}