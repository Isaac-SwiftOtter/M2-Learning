<?php
/**
 * @by SwiftOtter, Inc., 11/28/18
 * @website https://swiftotter.com
 **/

namespace Learning\IsaacLearning\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface as Logger;

class BeginningSave implements ObserverInterface
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * BeginningSave constructor.
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
        $data = 'Saving new task';
        $this->logger->info('Data', ['info' => $data]);
    }
}