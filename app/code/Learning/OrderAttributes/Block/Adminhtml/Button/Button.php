<?php
/**
 * @by SwiftOtter, Inc., 1/18/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Framework\View\Element\UiComponent\Context;
use Magento\Framework\Registry;

class Button implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    private $context;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * Button constructor.
     * @param Context $context
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        Registry $registry
    )
    {
        $this->context = $context;
        $this->registry = $registry;
    }

    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrl($route, $params);
    }

    /**
     * @return int/null
     */
    public function getAttributeId()
    {
        $id = $this->context->getRequestParam('id');
        return $id;
    }

    public function getButtonData()
    {
        return [];
    }
}