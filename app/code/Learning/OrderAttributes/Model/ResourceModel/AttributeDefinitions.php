<?php
/**
 * @by SwiftOtter, Inc., 2/14/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class AttributeDefinitions extends AbstractDb
{
    public function _construct()
    {
        $this->_init('learning_custom_order_attributes_definitions', 'attribute_id');
    }
}