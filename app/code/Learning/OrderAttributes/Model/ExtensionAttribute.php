<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Api\Data\ExtensionAttributeInterface;

class ExtensionAttribute implements ExtensionAttributeInterface
{
    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * {@inheritdoc}
     */
    public function setValues($value)
    {
        return $this->setData(self::VALUE, $value);
    }
}