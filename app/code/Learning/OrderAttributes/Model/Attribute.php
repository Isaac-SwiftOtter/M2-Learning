<?php
/**
 * @by SwiftOtter, Inc., 12/21/18
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use \Magento\Framework\Model\AbstractModel;
use \Learning\OrderAttributes\Model\ResourceModel\Attribute as AttributeResource;

class Attribute extends AbstractModel
{
    public function _construct()
    {
        $this->_init(AttributeResource::class);
    }
}