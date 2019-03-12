<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Api\Data\OrderExtensionAttributeInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class OrderExtensionAttribute extends AbstractExtensibleModel implements OrderExtensionAttributeInterface
{
    /**
     * @inheritDoc
     */
    public function getAttributeDataFromQuote()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * @inheritDoc
     */
    public function setOrderId($value)
    {
        return $this->setData(self::VALUE, $value);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(\Learning\OrderAttributes\Api\Data\OrderExtensionAttributeExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}