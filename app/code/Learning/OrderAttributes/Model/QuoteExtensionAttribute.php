<?php
/**
 * @by SwiftOtter, Inc., 3/11/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Api\Data\QuoteExtensionAttributeInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class QuoteExtensionAttribute extends AbstractExtensibleModel implements QuoteExtensionAttributeInterface
{
    /**
     * @inheritdoc
     */
    public function setAttributes($attributes)
    {
        $this->setData(self::VALUE, $attributes);
    }

    /**
     * @inheritdoc
     */
    public function setValues($attributeData)
    {
        $this->setData('attributes', $attributeData);
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }


    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(\Learning\OrderAttributes\Api\Data\QuoteExtensionAttributeExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}