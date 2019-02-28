<?php
/**
 * @by SwiftOtter, Inc., 12/21/18
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Attribute extends AbstractDb
{
    public function _construct()
    {
        $this->_init('learning_custom_order_attributes', 'entity_id');
    }

    public function numberOfAttributes()
    {
        $column = $this->getConnection()->select();
        $column->from($this->getTable('learning_custom_order_attributes'), 'entity_id');
        $ids = $this->getConnection()->fetchCol($column);

        return count($ids);
    }
}