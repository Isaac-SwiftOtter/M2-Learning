<?php
/**
 * @by SwiftOtter, Inc., 1/15/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

class Create extends Attribute
{
    public function execute()
    {
        $this->_redirect('*/*/edit');
    }
}