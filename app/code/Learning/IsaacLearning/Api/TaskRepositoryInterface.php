<?php
/**
 * @by SwiftOtter, Inc., 11/6/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Api;

use Learning\IsaacLearning\Api\Data\TaskInterface;

interface TaskRepositoryInterface
{
    /**
     * @param \Learning\IsaacLearning\Api\Data\TaskInterface $task
     * @return \Learning\IsaacLearning\Api\Data\TaskInterface
     */
    public function save(TaskInterface $task);

    /**
     * @param \Learning\IsaacLearning\Api\Data\TaskInterface $task
     * @return void
     */
    public function delete(TaskInterface $task);
}