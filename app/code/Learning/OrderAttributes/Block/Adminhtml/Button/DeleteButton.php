<?php
/**
 * @by SwiftOtter, Inc., 1/18/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Block\Adminhtml\Button;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class DeleteButton extends Button
{
    public function __construct(
        array $buttonData = [],
        $hideOnNew = true,
        string $registryIdKey,
        Registry $registry,
        Context $context,
        string $htmlId,
        string $requestIdParam = 'id',
        string $deleteAction = '*/*/delete'
    )
    {
        parent::__construct(
            $buttonData,
            $hideOnNew,
            $registryIdKey,
            $registry,
            $context
        );

        $this->buttonData['data_attribute'] = ['url' => $this->getDeleteUrl($deleteAction, $requestIdParam)];
        $this->buttonData['id'] = $htmlId;
        $this->buttonData['on_click'] = '';
    }

    public function getDeleteUrl($deleteAction, $requestIdParam)
    {
        return $this->getUrl($deleteAction, [$requestIdParam =>$this->getId()]);
    }
}