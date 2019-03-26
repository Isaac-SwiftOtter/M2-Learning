<?php
/**
 * @by SwiftOtter, Inc., 3/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Learning\OrderAttributes\Helper\Attributes;

class CustomerData implements  ArgumentInterface
{
    /**
     * @var Attributes
     */
    private $attributeHelper;

    /**
     * CustomerData constructor.
     * @param Attributes $attributeHelper
     */
    public function __construct(Attributes $attributeHelper)
    {
        $this->attributeHelper = $attributeHelper;
    }

    public function attributeData($data)
    {
        $attributeDataList = [];
        $attributeArray = $this->attributeHelper->attributeFieldDataToArray($data);

        foreach ($attributeArray as $attribute) {
            list($attributeCode, $attributeCustomerInput) = explode(" : ", $attribute, 2);
            $attributeLabelArray = $this->attributeHelper->getAttributeLabels();
            $attributeLabel = $attributeLabelArray[$attributeCode];
            $attributeData = $attributeLabel . ": " . $attributeCustomerInput;
            array_push($attributeDataList, $attributeData);
        }

        return $attributeDataList;
    }
}