<?php
/**
 * @by SwiftOtter, Inc., 11/27/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Plugin;

class LearningPlugin
{
    public function afterHelloWorld(\Learning\IsaacLearning\ViewModel\Learning\Page $context, $helloWorld)
    {
        $helloWorld = "Isaac's Learning Plugin";
        return $helloWorld;
    }
}