<?php
/**
 * @by SwiftOtter, Inc., 3/21/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Helper\Attributes;
use Learning\OrderAttributes\Api\AttributeRepositoryInterface;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Api\Data\CartExtensionFactory;

class QuoteDataSave
{
    /**
     * @var Attributes
     */
    private $attributeHelper;

    /**
     * @var AttributeRepositoryInterface
     */
    private $repository;

    /**
     * @var CartRepositoryInterface
     */
    private $quoteRepository;

    /**
     * @var CartExtensionFactory
     */
    private $cartExtensionFactory;

    /**
     * QuoteDataSave constructor.
     * @param Attributes $attributeHelper
     * @param AttributeRepositoryInterface $repository
     * @param CartRepositoryInterface $quoteRepository
     */
    public function __construct(
        Attributes $attributeHelper,
        AttributeRepositoryInterface $repository,
        CartRepositoryInterface $quoteRepository,
        CartExtensionFactory $cartExtensionFactory
    )
    {
        $this->attributeHelper = $attributeHelper;
        $this->repository = $repository;
        $this->quoteRepository = $quoteRepository;
        $this->cartExtensionFactory = $cartExtensionFactory;
    }

    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    )
    {
        $addressExtensionAttributes = $this->attributeHelper->attributeFieldDataToString($addressInformation->getExtensionAttributes()->getOrderAttributeFieldData());

        if ($addressExtensionAttributes) {
            $quote = $this->quoteRepository->getActive($cartId);
            $quote->setData('order_attribute_field_data', $addressExtensionAttributes);
        }

        return null;
    }

}