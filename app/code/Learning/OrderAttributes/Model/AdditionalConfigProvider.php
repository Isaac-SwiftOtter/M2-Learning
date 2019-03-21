<?php
/**
 * @by SwiftOtter, Inc., 3/20/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Helper\Attributes;

class AdditionalConfigProvider
{
    /**
     * @var Attributes
     */
    private $attributesHelper;

    /**
     * AdditionalConfigProvider constructor.
     * @param Attributes $attributes
     */
    public function __construct(Attributes $attributes)
    {
        $this->attributesHelper = $attributes;
    }

    public function getConfig()
    {
        $output['custom_order_attributes_field_names'] = $this->attributesHelper->getAttributeFieldNames();
        return $output;
    }

}