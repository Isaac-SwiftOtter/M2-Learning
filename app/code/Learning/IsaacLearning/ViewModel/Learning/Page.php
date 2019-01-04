<?php
/**
 * @by SwiftOtter, Inc., 10/24/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\ViewModel\Learning;

use \Magento\Framework\View\Element\Block\ArgumentInterface;

class Page implements ArgumentInterface
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    private $dateTime;

    /**
     * @var \Learning\IsaacLearning\Model\ResourceModel\Task\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var \Learning\IsaacLearning\Model\ResourceModel\Task
     */
    private $taskIdSum;

    /**
     * @param \Magento\Framework\Stdlib\DateTime $dateTime
     * @param \Learning\IsaacLearning\Model\ResourceModel\Task\CollectionFactory $collectionFactory
     * @param \Learning\IsaacLearning\Model\ResourceModel\Task $taskIdSum
     */
    public function __construct(
        \Magento\Framework\Stdlib\DateTime $dateTime,
        \Learning\IsaacLearning\Model\ResourceModel\Task\CollectionFactory $collectionFactory,
        \Learning\IsaacLearning\Model\ResourceModel\Task $taskIdSum
    )
    {
        $this->dateTime = $dateTime;
        $this->collectionFactory = $collectionFactory;
        $this->taskIdSum = $taskIdSum;
    }

    public function getAllTasks()
    {
        $allTasks = [];
        $tasks = $this->collectionFactory->create();

        foreach($tasks->getItems() as $task) {
            $allTasks[] = [
                $task->getData('learning_id') . ': ' .
                $task->getData('title') . ' - ' .
                $task->getData('priority') . ' - ' .
                $task->getData('description')
            ];
        }

        return $allTasks;

    }

    public function getPriorityOptions()
    {
        return \Learning\IsaacLearning\Model\Task::getPriorityOptions();
    }

    public function getIdSum()
    {
        return $this->taskIdSum->idSum();
    }

    public function helloWorld()
    {
        $helloWorld = "Hello World!";
        return $helloWorld;
    }
}