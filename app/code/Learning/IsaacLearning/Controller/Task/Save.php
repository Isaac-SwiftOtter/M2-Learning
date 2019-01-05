<?php
/**
 * @by SwiftOtter, Inc., 11/8/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Controller\Task;

use Learning\IsaacLearning\Api\TaskRepositoryInterface as TaskRepository;
use Learning\IsaacLearning\Model\TaskFactory as TaskFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Data\Form\FormKey\Validator
     */
    private $validator;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @var TaskFactory
     */
    private $taskFactory;

    /**
     * Save constructor.
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Data\Form\FormKey\Validator $validator
     * @param TaskRepository $taskRepository
     * @param TaskFactory $taskFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Data\Form\FormKey\Validator $validator,
        TaskRepository $taskRepository,
        TaskFactory $taskFactory
    )
    {
        $this->validator = $validator;
        $this->taskRepository = $taskRepository;
        $this->taskFactory = $taskFactory;
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

        $this->_eventManager->dispatch('Learning_IsaacLearning_Beginning_Save');

        $task = $this->taskFactory->create();
        $task->setData('title', $title);
        $task->setData('priority', $priority);
        $task->setData('description', $description);
        $this->taskRepository->save($task);

        $this->_eventManager->dispatch('Learning_IsaacLearning_Task_Saved', ['task_name' => $title]);

        $this->_redirect('isaac/own/test');
        $this->messageManager->addSuccessMessage('New task saved!');
    }
}