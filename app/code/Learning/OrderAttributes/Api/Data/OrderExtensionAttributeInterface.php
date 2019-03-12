<?php
/**
 * Created by PhpStorm.
 * User: swiftotter
 * Date: 2/26/19
 * Time: 5:51 PM
 */

namespace Learning\OrderAttributes\Api\Data;


interface OrderExtensionAttributeInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const VALUE = 'value';

    /**
     * Get array of attributes utilized in quote
     * @return array|null
     */
    public function getAttributeDataFromQuote();

    /**
     * Set order id linked with foreign key in table
     * @param string|null $value
     * @return $this
     */
    public function setOrderId($value);

    /**
     * Get existing extension attributes
     * @return \Learning\OrderAttributes\Api\Data\OrderExtensionAttributeExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set extension attribute
     * @param \Learning\OrderAttributes\Api\Data\OrderExtensionAttributeExtensionInterface|null $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Learning\OrderAttributes\Api\Data\OrderExtensionAttributeExtensionInterface $extensionAttributes);
}