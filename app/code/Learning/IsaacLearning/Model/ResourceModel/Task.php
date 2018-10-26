<?php
/**
 * @by SwiftOtter, Inc., 10/18/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Model\ResourceModel;

class Task extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }

    public function _construct()
    {
        $this->_init('isaac_learning', 'learning_id');
    }

    public function idSum()
    {
        $select = $this->getConnection()->select();

        $select->from($this->getTable('isaac_learning'), 'learning_id');

        $ids = $this->getConnection()->fetchCol($select);

        return array_sum($ids);
    }
}