<?php
/**
 * @by SwiftOtter, Inc., 11/7/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Model;

use Learning\IsaacLearning\Api\TaskRepositoryInterface;
use Learning\IsaacLearning\Api\Data\TaskInterface;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var \Learning\IsaacLearning\Model\ResourceModel\Task
     */
    private $resourceModel;

    /**
     * TaskRepository constructor.
     * @param ResourceModel\Task $resourceModel
     */
    public function __construct(ResourceModel\Task $resourceModel)
    {
        $this->resourceModel = $resourceModel;
    }

    public function save(TaskInterface $task)
    {
        $this->resourceModel->save($task);
        return $task;
    }

    public function delete(TaskInterface $task)
    {
        $this->resourceModel->delete($task);
    }
}