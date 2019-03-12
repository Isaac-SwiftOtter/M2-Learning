<?php
/**
 * Created by PhpStorm.
 * User: swiftotter
 * Date: 3/11/19
 * Time: 6:13 PM
 */

namespace Learning\OrderAttributes\Api\Data;


interface QuoteExtensionAttributeInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const VALUE = 'value';

    /**
     * Get list of attributes
     * @return array|null
     */
    public function getAttributes();

    /**
     * Set data gathered from attributes
     * @param array $attributeData
     * @return $this
     */
    public function setValues($attributeData);

    /**
     * Get existing extension attributes
     * @return \Learning\OrderAttributes\Api\Data\QuoteExtensionAttributeExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set extension attributes
     * @param \Learning\OrderAttributes\Api\Data\QuoteExtensionAttributeExtensionInterface|null $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Learning\OrderAttributes\Api\Data\QuoteExtensionAttributeExtensionInterface $extensionAttributes);

}