<?php
/**
 * @by SwiftOtter, Inc., 1/4/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Api\AttributeRepositoryInterface;
use Learning\OrderAttributes\Api\Data\AttributeInterface;

class AttributeRepository implements AttributeRepositoryInterface
{
    /**
     * @var \Learning\OrderAttributes\Model\ResourceModel\Attribute
     */
    private $resourceModel;

    /**
     * AttributeRepository constructor.
     *
     * param ResourceModel\Attribute
     */
    public function __construct(ResourceModel\Attribute $resourceModel)
    {
        $this->resourceModel = $resourceModel;
    }

    public function save(AttributeInterface $attribute)
    {
        $this->resourceModel->save($attribute);
        return $attribute;
    }

    public function delete(AttributeInterface $attribute)
    {
        $this->resourceModel->delete($attribute);
    }
}