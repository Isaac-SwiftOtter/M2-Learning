<?php
/**
 * @by SwiftOtter, Inc., 10/18/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Model;

use \Magento\Framework\Model\AbstractModel;
use \Learning\IsaacLearning\Model\ResourceModel\Task as TaskResource;

class Task extends AbstractModel
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
        $this->_init(TaskResource::class);
    }

    public static function getPriorityOptions()
    {
        return self::$priorityOptions;
    }
}