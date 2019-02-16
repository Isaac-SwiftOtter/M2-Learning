<?php
/**
 * @by SwiftOtter, Inc., 1/9/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

use Learning\OrderAttributes\Model\AttributeDefinitions;
use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use \Magento\Eav\Model\Config;
use \Magento\Eav\Model\Entity\Type;
use \Learning\OrderAttributes\Model\AttributeDefinitionsFactory;
use \Learning\OrderAttributes\Api\AttributeDefinitionsRepositoryInterface;

abstract class Attribute extends Action
{
    const ADMIN_RESOURCE = 'Learning_OrderAttributes::order_attributes';

    /**
     * @var Type
     */
    private $entityType;

    /**
     * @var AttributeDefinitionsFactory
     */
    private $attrFactory;

    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var AttributeDefinitionsRepositoryInterface
     */
    private $attributeRepository;

    /**
     * Attribute constructor.
     * @param Context $context
     * @param AttributeDefinitionsFactory $attributeFactory
     * @param Config $config
     * @param AttributeDefinitionsRepositoryInterface $attributeRepository
     */
    public function __construct(
        Context $context,
        AttributeDefinitionsFactory $attributeFactory,
        Config $config,
        AttributeDefinitionsRepositoryInterface $attributeRepository
    )
    {
        $this->attrFactory = $attributeFactory;
        $this->eavConfig = $config;
        parent::__construct($context);
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Return order entity type instance
     * @return Type
     */
    public function _getEntityType()
    {
        if ($this->entityType === null) {
            $this->entityType = $this->eavConfig->getEntityType('order');
        }
        return $this->entityType;
    }

    public function _initAction()
    {
        $this->_view->loadLayout();
        return $this;
    }

    /**
     * @return \Learning\OrderAttributes\Model\AttributeDefinitions
     */
    public function _initAttribute()
    {
        $attribute = $this->attrFactory->create();
        return $attribute;
    }

    /**
     * @return AttributeDefinitionsRepositoryInterface
     */
    public function attributeRepository()
    {
        return $this->attributeRepository;
    }
}