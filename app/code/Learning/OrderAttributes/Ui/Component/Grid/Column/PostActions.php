<?php
/**
 * @by SwiftOtter, Inc., 2/20/19
 * @website https://swiftotter.com
 **/

namespace Learning\OrderAttributes\Ui\Component\Grid\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class PostActions extends Column
{
    const ATTRIBUTE_EDIT_URL = 'oapage/orderattributes/edit';
    const ATTRIBUTE_DELETE_URL = 'oapage/orderattributes/delete';

    private $urlBuilder;

    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $urlBuilder, array $components = [], array $data = [])
    {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->urlBuilder->getUrl(self::ATTRIBUTE_EDIT_URL, ['id' => $item['attribute_id']]),
                    'label' => __('Edit'),
                    'hidden' => false
                ];

                $label = $item['attribute_label'];

                $item[$this->getData('name')]['delete'] = [
                    'href' => $this->urlBuilder->getUrl(self::ATTRIBUTE_DELETE_URL, ['id' => $item['attribute_id']]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => sprintf(__('Delete %s Attribute'), $label),
                        'message' => sprintf(__('Are you sure you want to delete this attribute: %s'), $label)
                    ]
                ];
            }
        }
        return $dataSource;
    }
}