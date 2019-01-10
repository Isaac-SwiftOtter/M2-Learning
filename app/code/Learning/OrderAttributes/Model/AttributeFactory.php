<?php
/**
 * @by SwiftOtter, Inc., 1/9/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Model;

use Magento\Framework\ObjectManagerInterface;

class AttributeFactory
{
    /**
     * Object Manager Instance
     * @var ObjectManagerInterface
     */
    private $_objectManager = null;

    /**
     * Instance Name
     * @var string
     */
    private $_instanceName = null;

    /**
     * AttributeFactory constructor.
     * @param ObjectManagerInterface $objectManager
     * @param string $instanceName
     */
    public function __construct(ObjectManagerInterface $objectManager, $instanceName = '\\Learning\\OrderAttributes\\Model\\Attribute')
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    /**
     * Create instance
     * @param array $data
     * @return \Learning\OrderAttributes\Model\Attribute
     */
    public function create(array $data = array())
    {
        return $this->_objectManager->create($this->_instanceName, $data);
    }
}