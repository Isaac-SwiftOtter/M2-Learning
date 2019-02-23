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
     * @var AttributeDefinitionsFactory
     */
    private $attributeFactory;

    /**
     * AttributeDefinitionsRepository constructor.
     * @param ResourceModel\AttributeDefinitions $resourceModel
     * @param AttributeDefinitionsFactory $attributeFactory
     */
    public function __construct(ResourceModel\AttributeDefinitions $resourceModel, AttributeDefinitionsFactory $attributeFactory)
    {
        $this->resourceModel = $resourceModel;
        $this->attributeFactory = $attributeFactory;
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
        // TODO: Implement getById() method.
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
        $attribute = $this->attributeFactory->create();
        $attribute->setId($attributeDefinitions);
        $this->delete($attribute);

    }
}