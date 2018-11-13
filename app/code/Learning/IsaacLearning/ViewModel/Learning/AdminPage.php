<?php
/**
 * @by SwiftOtter, Inc., 11/12/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\ViewModel\Learning;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class AdminPage implements ArgumentInterface
{
    public function helloWorld()
    {
        return "Hello World";
    }
}