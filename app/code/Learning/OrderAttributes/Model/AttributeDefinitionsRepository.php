<?php
/**
 * @by SwiftOtter, Inc., 2/14/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Learning\OrderAttributes\Api\AttributeDefinitionsRepositoryInterface;
use Learning\OrderAttributes\Api\Data\AttributeDefinitionsInterface;

class AttributeDefinitionsRepository implements AttributeDefinitionsRepositoryInterface
{
    /**
     * @var AttributeDefinitions
     */
    private $resourceModel;

    /**
     * AttributeDefinitionsRepository constructor.
     * @param ResourceModel\AttributeDefinitions $resourceModel
     */
    public function __construct(ResourceModel\AttributeDefinitions $resourceModel)
    {
        $this->resourceModel = $resourceModel;
    }

    /**
     * @param AttributeDefinitionsInterface $attributeDefinitions
     * @return AttributeDefinitionsInterface
     */
    public function save(AttributeDefinitionsInterface $attributeDefinitions)
    {
        $this->resourceModel->save($attributeDefinitions);
        return $attributeDefinitions;
    }

    /**
     * @param int $id
     * @return AttributeDefinitionsInterface
     */
    public function getById(int $id)
    {

    }

    /**
     * @param AttributeDefinitionsInterface $attributeDefinitions
     * @return AttributeDefinitionsInterface
     */
    public function delete(AttributeDefinitionsInterface $attributeDefinitions)
    {
        $this->resourceModel->delete($attributeDefinitions);
    }

    /**
     * @param int $attributeDefinitions
     * @return void
     */
    public function deleteById(int $attributeDefinitions)
    {

    }
}