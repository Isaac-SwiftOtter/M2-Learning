<?php
/**
 * @by SwiftOtter, Inc., 3/21/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

use Learning\OrderAttributes\Helper\Attributes;
use Learning\OrderAttributes\Api\AttributeRepositoryInterface;

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
     * QuoteDataSave constructor.
     * @param Attributes $attributeHelper
     * @param AttributeRepositoryInterface $repository
     */
    public function __construct(Attributes $attributeHelper, AttributeRepositoryInterface $repository)
    {
        $this->attributeHelper = $attributeHelper;
        $this->repository = $repository;
    }



}