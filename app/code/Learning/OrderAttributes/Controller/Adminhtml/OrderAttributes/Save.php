<?php
/**
 * @by SwiftOtter, Inc., 1/4/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

use \Magento\Backend\App\Action\Context;
use \Magento\Eav\Model\Config;
use \Learning\OrderAttributes\Model\AttributeFactory;

class Save extends Attribute
{
    /**
     * Save constructor.
     * @param Context $context
     * @param Config $config
     * @param AttributeFactory $attributeFactory
     */
    public function __construct(
        Context $context,
        Config $config,
        AttributeFactory $attributeFactory
    )
    {
        parent::__construct(
            $context,
            $attributeFactory,
            $config
        );
    }

    public function execute()
    {
        $attrData = $this->getRequest()->getPostData();

        if (!$this->getRequest()->isPost() && $attrData) {
            return;
        }

        $attribute = $this->_initAttribute();
        $attributeId = $this->getRequest()->getParam('attribute_id');

        if ($attributeId) {
            $attribute->load($attributeId);
        }

        $this->_redirect('adminhtml/*/');


    }
}