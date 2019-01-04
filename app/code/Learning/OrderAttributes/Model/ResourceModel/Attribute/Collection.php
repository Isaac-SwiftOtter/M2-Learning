<?php
/**
 * @by SwiftOtter, Inc., 12/21/18
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model\ResourceModel\Attribute;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(\Learning\OrderAttributes\Model\Attribute::class,
            \Learning\OrderAttributes\Model\ResourceModel\Attribute::class);
    }
}