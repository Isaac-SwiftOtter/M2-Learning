<?php
/**
 * Created by PhpStorm.
 * User: swiftotter
 * Date: 2/14/19
 * Time: 5:04 PM
 */

namespace Learning\OrderAttributes\Api;

use Learning\OrderAttributes\Api\Data\AttributeDefinitionsInterface;

interface AttributeDefinitionsRepositoryInterface
{
    /**
     * @param AttributeDefinitionsInterface $attributeDefinitions
     * @return AttributeDefinitionsInterface
     */
    public function save(AttributeDefinitionsInterface $attributeDefinitions);

    /**
     * @param int $id
     * @return AttributeDefinitionsInterface
     */
    public function getById(int $id);

    /**
     * @param AttributeDefinitionsInterface $attributeDefinitions
     * @return AttributeDefinitionsInterface
     */
    public function delete(AttributeDefinitionsInterface $attributeDefinitions);

    /**
     * @param int $attributeDefinitions
     * @return void
     */
    public function deleteById(int $attributeDefinitions);
}