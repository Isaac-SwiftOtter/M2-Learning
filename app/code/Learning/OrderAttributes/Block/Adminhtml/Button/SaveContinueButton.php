<?php
/**
 * @by SwiftOtter, Inc., 1/24/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Block\Adminhtml\Button;

class SaveContinueButton extends Button
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save and Continue Edit'),
            'class' => 'save',
            'sort_order' => 60,
            'data_attribute' => [
                'mage-init'=> [
                    'button' => [
                        'event' => 'saveAndContinueEdit'
                    ]
                ]
            ]
        ];
    }
}