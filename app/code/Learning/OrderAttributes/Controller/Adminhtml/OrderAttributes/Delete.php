<?php
/**
 * @by SwiftOtter, Inc., 1/24/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

class Delete extends Attribute
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $this->_redirect('*/*/');
    }

}