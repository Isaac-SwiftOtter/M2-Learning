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
     * @param \Learning\OrderAttributes\Api\Data\AttributeInterface $attribute
     * @return \Learning\OrderAttributes\Api\Data\AttributeInterface
     */
    public function save(AttributeInterface $attribute);

    /**
     * @param \Learning\OrderAttributes\Api\Data\AttributeInterface $attribute
     * @return \Learning\OrderAttributes\Api\Data\AttributeInterface
     */
    public function delete(AttributeInterface $attribute);
}