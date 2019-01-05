<?php
/**
 * @by SwiftOtter, Inc., 10/18/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Model;

use Learning\IsaacLearning\Api\Data\TaskInterface;
use \Magento\Framework\Model\AbstractModel;
use \Learning\IsaacLearning\Model\ResourceModel\Task as TaskResource;

class Task extends AbstractModel implements TaskInterface
{
    private static $priorityOptions = [
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