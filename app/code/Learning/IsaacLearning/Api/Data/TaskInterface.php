<?php
/**
 * @by SwiftOtter, Inc., 11/7/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Api\Data;

interface TaskInterface
{
    const PRIORITY_LOW = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH = 3;
    const PRIORITY_CRITICAL = 4;

    public static function getPriorityOptions();
}