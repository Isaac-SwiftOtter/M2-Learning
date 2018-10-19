<?php
/**
 * @by SwiftOtter, Inc., 10/18/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Model;

class Task extends \Magento\Framework\Model\AbstractModel
{
    const PRIORITY_LOW = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH = 3;
    const PRIORITY_CRITICAL = 4;

    protected static $priorityOptions = [
        self::PRIORITY_LOW => 'Low',
        self::PRIORITY_MEDIUM => 'Medium',
        self::PRIORITY_HIGH => 'High',
        self::PRIORITY_CRITICAL => 'Critical'
    ];

    public function _construct()
    {
        $this->_init('Learning\IsaacLearning\Model\ResourceModel\Task');
    }

    public function getPriorityOptions()
    {
        return self::$priorityOptions;
    }
}