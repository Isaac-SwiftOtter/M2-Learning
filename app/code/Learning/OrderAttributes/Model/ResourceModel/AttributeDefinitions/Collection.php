<?php
/**
 * @by SwiftOtter, Inc., 2/14/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(\Learning\OrderAttributes\Model\AttributeDefinitions::class,
            \Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions::class);
    }
}