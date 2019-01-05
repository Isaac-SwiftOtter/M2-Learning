<?php
/**
 * @by SwiftOtter, Inc., 1/4/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use \Magento\Framework\Data\Form\FormKey\Validator;
use \Learning\OrderAttributes\Api\AttributeRepositoryInterface as AttributeRepository;
use \Learning\OrderAttributes\Model\AttributeFactory as AttributeFactory;

class Save extends Action
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     * @var AttributeRepository
     */
    private $attrRepo;

    /**
     * @var AttributeFactory
     */
    private $attrFactory;


    public function __construct(
        Context $context,
        Validator $validator,
        AttributeRepository $attrRepo,
        AttributeFactory $attrFactory
    )
    {
        $this->validator = $validator;
        $this->attrRepo = $attrRepo;
        $this->attrFactory = $attrFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        if (!$this->validator->validate($this->getRequest())) {
            $this->messageManager->addErrorMessage('Failed to save Attribute');
        }


    }
}