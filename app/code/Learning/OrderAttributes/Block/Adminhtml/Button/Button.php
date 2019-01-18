<?php
/**
 * @by SwiftOtter, Inc., 1/18/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class Button implements ButtonProviderInterface
{
    public $buttonData;

    private $hideOnNew;

    private $registry;

    private $registryIdKey;

    private $urlBuilder;

    public function __construct(
        $buttonData = [],
        $hideOnNew = false,
        $registryIdKey,
        Registry $registry,
        Context $context
    )
    {
        $this->buttonData = $buttonData;
        $this->hideOnNew = $hideOnNew;
        $this->registryIdKey = $registryIdKey;
        $this->registry = $registry;
        $this->urlBuilder = $context->getUrlBuilder();
    }

    public function getId()
    {
        return $this->registry->registry($this->registryIdKey);
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }

    public function getButtonData()
    {
        if ($this->hideOnNew && !$this->getId()) {
            return [];
        }

        return $this->buttonData;
    }
}