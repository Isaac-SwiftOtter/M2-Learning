<?php
/**
 * @by SwiftOtter, Inc., 12/6/18
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Settings extends Action
{
    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->resultPageFactory->create();
    }
}