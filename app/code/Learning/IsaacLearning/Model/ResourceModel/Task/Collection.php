<?php
/**
 * @by SwiftOtter, Inc., 10/18/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Model\ResourceModel\Task;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init(\Learning\IsaacLearning\Model\Task::class,
            \Learning\IsaacLearning\Model\ResourceModel\Task::class);
    }
}