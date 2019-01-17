<?php
/**
 * Created by PhpStorm.
 * User: swiftotter
 * Date: 1/4/19
 * Time: 9:24 AM
 */

namespace Learning\OrderAttributes\Api;

use \Learning\OrderAttributes\Api\Data\AttributeInterface;

interface AttributeRepositoryInterface
{
    /**
     * @param AttributeInterface $attribute
     * @return AttributeInterface
     */
    public function save(AttributeInterface $attribute);

    /**
     * @param int $id
     * @return AttributeInterface
     */
    public function getById(int $id);

    /**
     * @param AttributeInterface $attribute
     * @return AttributeInterface
     */
    public function delete(AttributeInterface $attribute);

    /**
     * @param int $attribute
     * @return void
     */
    public function deleteById(int $attribute);
}