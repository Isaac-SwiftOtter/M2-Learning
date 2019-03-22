<?php
/**
 * @by SwiftOtter, Inc., 3/13/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions\CollectionFactory;
use Learning\OrderAttributes\Model\QuoteExtensionAttributeFactory;
use Magento\Quote\Api\Data\CartExtensionFactory;
use Learning\OrderAttributes\Helper\Attributes;

class LoadExtensionAttribute
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var QuoteExtensionAttributeFactory
     */
    private $quoteExtensionAttributeFactory;

    /**
     * @var cartExtensionFactory
     */
    private $cartExtensionFactory;

    /**
     * @var Attributes
     */
    private $attributeHelper;

    /**
     * LoadExtensionAttribute constructor.
     * @param CollectionFactory $collectionFactory
     * @param QuoteExtensionAttributeFactory $quoteExtensionAttributeFactory
     * @param CartExtensionFactory $cartExtensionFactory
     * @param Attributes $attributeHelper
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        QuoteExtensionAttributeFactory $quoteExtensionAttributeFactory,
        CartExtensionFactory $cartExtensionFactory,
        Attributes $attributeHelper
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->quoteExtensionAttributeFactory = $quoteExtensionAttributeFactory;
        $this->cartExtensionFactory = $cartExtensionFactory;
        $this->attributeHelper = $attributeHelper;
    }

    public function afterLoadByIdWithoutStore(\Magento\Quote\Model\Quote $quote)
    {
        $quote = $this->loadExtensionAttribute($quote);
        return $quote;
    }

    private function loadExtensionAttribute(\Magento\Quote\Api\Data\CartInterface $quote)
    {
        $attributeList = $this->attributeHelper->getListOfAttributes();

        $extensionAttributes = $quote->getExtensionAttributes();
        $quoteExtension = $extensionAttributes ? $extensionAttributes : $this->cartExtensionFactory->create();
        $quoteAttribute = $this->quoteExtensionAttributeFactory->create();
        $quoteAttribute->setAttributes($attributeList);
        $quoteExtension->setCustomOrderAttributes($quoteAttribute);
        $quote->setExtensionAttributes($quoteExtension);

        return $quote;
    }
}