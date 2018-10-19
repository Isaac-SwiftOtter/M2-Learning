<?php
/**
 * @by SwiftOtter, Inc., 9/19/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Block;

class LearningController extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $dateTime;

    /**
     * @var \Learning\IsaacLearning\Model\TaskFactory
     */
    protected $taskFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Stdlib\DateTime $dateTime,
        \Learning\IsaacLearning\Model\TaskFactory $taskFactory,
        array $data = []
    )
    {
        $this->dateTime = $dateTime;
        $this->taskFactory = $taskFactory;
        parent::__construct($context, $data);
    }

    public function getAllTasks()
    {
        return $this->taskFactory->create()->getCollection();
    }

    public function getPriorityOptions()
    {
        return \Learning\IsaacLearning\Model\Task::getPriorityOptions();
    }

    public function helloWorld()
    {
        return "Hello World!";
    }
}