<?php
/**
 * @by SwiftOtter, Inc., 2/14/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Api\Data\AttributeDefinitionsInterface;
use Magento\Framework\Model\AbstractModel;

class AttributeDefinitions extends AbstractModel implements AttributeDefinitionsInterface
{
    const MODULE_NAME = 'Learning_OrderAttributes';

    public function _construct()
    {
        $this->_init(\Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions::class);
    }
}