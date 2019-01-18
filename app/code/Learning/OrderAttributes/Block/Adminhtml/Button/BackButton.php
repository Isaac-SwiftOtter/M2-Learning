<?php
/**
 * @by SwiftOtter, Inc., 1/18/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Block\Adminhtml\Button;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class BackButton extends Button
{
    public function __construct(
        array $buttonData = [],
        $hideOnNew = true,
        string $registryIdKey,
        Registry $registry,
        Context $context,
        string $targetRoute
    )
    {
        parent::__construct(
            $buttonData,
            $hideOnNew,
            $registryIdKey,
            $registry,
            $context
        );

        $this->buttonData['on_click'] = "location.href = '{$this->getUrl($targetRoute)}'";
    }
}