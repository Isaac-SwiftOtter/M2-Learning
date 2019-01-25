<?php
/**
 * @by SwiftOtter, Inc., 1/23/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Block\Adminhtml\Button;

class SaveButton extends Button
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Attribute'),
            'class' => 'save primary',
            'sort_order' => 80,
            'data_attribute' => [
                'mage-init'=> [
                    'button' => [
                        'event' => 'save'
                    ]
                ]
            ]
        ];
    }
}