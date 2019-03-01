<?php
/**
 * @by SwiftOtter, Inc., 2/26/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Plugin;

class OrderGet
{
    public function afterGet(

        $resultOrder
    )
    {
        $resultOrder =$this->getAttributes($resultOrder);
        return $resultOrder;
    }

    private function getAttributes($order)
    {

    }
}