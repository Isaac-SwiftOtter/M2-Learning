<?php
/**
 * @by SwiftOtter, Inc., 1/9/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Controller\Adminhtml\OrderAttributes;

use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use \Magento\Eav\Model\Config;
use \Magento\Eav\Model\Entity\Type;
use \Learning\OrderAttributes\Model\AttributeFactory;
use \Learning\OrderAttributes\Api\AttributeRepositoryInterface;

abstract class Attribute extends Action
{
    const ADMIN_RESOURCE = 'Learning_OrderAttributes::order_attributes';

    /**
     * @var Type
     */
    private $entityType;

    /**
     * @var AttributeFactory
     */
    private $attrFactory;

    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var AttributeRepositoryInterface
     */
    private $attributeRepository;

    /**
     * Attribute constructor.
     * @param Context $context
     * @param AttributeFactory $attributeFactory
     * @param Config $config
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(
        Context $context,
        AttributeFactory $attributeFactory,
        Config $config,
        AttributeRepositoryInterface $attributeRepository
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
     * @return \Learning\OrderAttributes\Model\Attribute
     */
    public function _initAttribute()
    {
        $attribute = $this->attrFactory->create();
        return $attribute;
    }

    /**
     * @return AttributeRepositoryInterface
     */
    public function attributeRepository()
    {
        return $this->attributeRepository;
    }
}