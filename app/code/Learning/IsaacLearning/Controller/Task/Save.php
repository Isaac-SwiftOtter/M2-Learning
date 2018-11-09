<?php
/**
 * @by SwiftOtter, Inc., 11/8/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Controller\Task;

use Learning\IsaacLearning\Api\TaskRepositoryInterfaceFactory as TaskRepositoryFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Data\Form\FormKey\Validator
     */
    private $validator;

    /**
     * @var TaskRepositoryFactory
     */
    private $taskRepositoryFactory;

    /**
     * Save constructor.
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Data\Form\FormKey\Validator $validator
     * @param TaskRepositoryFactory $taskRepositoryFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Data\Form\FormKey\Validator $validator,
        TaskRepositoryFactory $taskRepositoryFactory
    )
    {
        $this->validator = $validator;
        $this->taskRepositoryFactory = $taskRepositoryFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->validator->validate($this->getRequest())) {
            $this->messageManager->addErrorMessage('Failed to save task.');
        }

        $title = $this->getRequest()->getParam('title');
        $priority = $this->getRequest()->getParam('priority');
        $description = $this->getRequest()->getParam('description');

        $task = $this->taskRepositoryFactory->create();
        $task->setData('title', $title);
        $task->setData('priority', $priority);
        $task->setData('description', $description);
        $task->save();

        $this->_redirect('isaac/own/test');
    }
}