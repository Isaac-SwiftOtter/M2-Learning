<?php
/**
 * @by SwiftOtter, Inc., 12/21/18
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Api\Data\AttributeInterface;
use Learning\OrderAttributes\Model\ResourceModel\Attribute as AttributeResource;
use Magento\Framework\Model\AbstractModel;

class Attribute extends AbstractModel implements AttributeInterface
{
    const MODULE_NAME = 'Learning_OrderAttributes';

    public function _construct()
    {
        $this->_init(AttributeResource::class);
    }
}