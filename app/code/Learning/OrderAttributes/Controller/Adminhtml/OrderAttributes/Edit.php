<?php
/**
 * @by SwiftOtter, Inc., 1/15/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

use Magento\Framework\Controller\ResultFactory;

class Edit extends Attribute
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id', false);

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        if ($id) {
            $headerText = 'Edit Attribute';
        } else {
            $headerText = 'New Order Attribute';
        }

        $resultPage->getConfig()->getTitle()->prepend(__($headerText));
        return $resultPage;
    }
}