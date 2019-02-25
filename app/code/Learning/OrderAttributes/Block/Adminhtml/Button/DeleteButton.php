<?php
/**
 * @by SwiftOtter, Inc., 1/18/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Block\Adminhtml\Button;

class DeleteButton extends Button
{
    public function getButtonData()
    {
        return [
            'label' => __('Delete Attribute'),
            'class' => 'delete',
            'sort_order' => 20,
            'id' => 'order-attribute-delete-button',
            'on_click' => sprintf("location.href = '%s';", $this->getUrl('*/*/delete'))
        ];
    }

    public function getDeleteUrl($deleteAction, $requestIdParam)
    {
        return $this->getUrl($deleteAction, [$requestIdParam =>$this->getAttributeId()]);
    }
}