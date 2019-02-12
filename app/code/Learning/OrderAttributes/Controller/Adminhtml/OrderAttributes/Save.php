<?php
/**
 * @by SwiftOtter, Inc., 1/4/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

class Save extends Attribute
{
    const GENERAL_DATA_KEY = 'general';

//    /**
//     * Save constructor.
//     * @param Context $context
//     * @param Config $config
//     * @param AttributeFactory $attributeFactory
//     */
//    public function __construct(
//        Context $context,
//        Config $config,
//        AttributeFactory $attributeFactory
//    )
//    {
//        parent::__construct(
//            $context,
//            $attributeFactory,
//            $config
//        );
//    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $attrData = $data[self::GENERAL_DATA_KEY];

        if (!$this->getRequest()->isPost() && $attrData) {
            return;
        }

        $attribute = $this->_initAttribute();
        $attributeId = $this->getRequest()->getParam('attribute_id');

        if ($attributeId) {
            $attribute->load($attributeId);
        }

        $attribute->setData($attrData);

        $this->attributeRepository()->save($attribute);

        $this->_redirect('*/*/');


    }
}