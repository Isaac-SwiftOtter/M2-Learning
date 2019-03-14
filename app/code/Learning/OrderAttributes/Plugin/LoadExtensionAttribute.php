<?php
/**
 * @by SwiftOtter, Inc., 3/13/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Model\ResourceModel\AttributeDefinitions\CollectionFactory;
use Learning\OrderAttributes\Model\QuoteExtensionAttributeFactory;
use Magento\Quote\Api\Data\CartExtensionFactory;

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
     * LoadExtensionAttribute constructor.
     * @param CollectionFactory $collectionFactory
     * @param QuoteExtensionAttributeFactory $quoteExtensionAttributeFactory
     * @param CartExtensionFactory $cartExtensionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        QuoteExtensionAttributeFactory $quoteExtensionAttributeFactory,
        CartExtensionFactory $cartExtensionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->quoteExtensionAttributeFactory = $quoteExtensionAttributeFactory;
        $this->cartExtensionFactory = $cartExtensionFactory;
    }

    public function afterLoadByIdWithoutStore(\Magento\Quote\Model\Quote $quote)
    {
        $quote = $this->loadExtensionAttribute($quote);
        return $quote;
    }

    private function loadExtensionAttribute(\Magento\Quote\Api\Data\CartInterface $quote)
    {
        $attributeList = [];
        $attributes = $this->collectionFactory->create();
        foreach ($attributes->getItems() as $attribute) {
            $attributeList[] = $attribute;
        }

        $extensionAttributes = $quote->getExtensionAttributes();
        $quoteExtension = $extensionAttributes ? $extensionAttributes : $this->cartExtensionFactory->create();
        $quoteAttribute = $this->quoteExtensionAttributeFactory->create();
        $quoteAttribute->setAttributes($attributeList);
        $quoteExtension->setCustomOrderAttributes($quoteAttribute);
        $quote->setExtensionAttributes($quoteExtension);

        return $quote;
    }
}