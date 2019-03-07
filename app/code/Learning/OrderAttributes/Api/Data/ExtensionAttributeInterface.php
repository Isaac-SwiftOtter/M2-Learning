<?php
/**
 * Created by PhpStorm.
 * User: swiftotter
 * Date: 2/26/19
 * Time: 5:51 PM
 */

namespace Learning\OrderAttributes\Api\Data;


interface ExtensionAttributeInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const VALUE = 'value';

    /**
     * Get array of custom attributes
     * @return array|null
     */
    public function getAttributes();

    /**
     * Set custom attribute values
     * @param array|null $value
     * @return $this
     */
    public function setValues($value);

    /**
     * Get existing extension attributes
     * @return \Magento\Sales\Api\Data\OrderExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set extension attribute
     * @param \Magento\Sales\Api\Data\OrderExtensionInterface|null $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Magento\Sales\Api\Data\OrderExtensionInterface $extensionAttributes);
}