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
    public function getAttributes()
    {

    }

    /**
     * @inheritdoc
     */
    public function setValues($attributeData)
    {

    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {

    }


    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(\Learning\OrderAttributes\Api\Data\QuoteExtensionAttributeExtensionInterface $extensionAttributes)
    {

    }
}