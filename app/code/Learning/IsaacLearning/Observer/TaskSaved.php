<?php
/**
 * @by SwiftOtter, Inc., 11/28/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface as Logger;

class TaskSaved implements ObserverInterface
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * TaskSaved constructor.
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $title = $observer->getData('task_name');
        $logText = 'Successfully logged new task: ' . $title . '.';

        $this->logger->info('Data', ['info' => $logText]);
    }
}