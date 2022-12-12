<?php
namespace Mageplaza\HelloWorld\Plugin\Adminhtml;


use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\Url;

class Actions {
    protected $urlBuilder;
    protected $context;
    public function __construct(
    ContextInterface $context, Url $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->context = $context;
    }
    public function afterPrepareDataSource($productActions, $result) {
            if (isset($result['data']['items'])) {
                $storeId = $this->context->getFilterParam('id_column');
                 foreach ($result['data']['items'] as &$item) {
                $item[$productActions->getData('name')]['preview'] = [
                    'href' => $this->urlBuilder->getUrl('mageplaza_helloworld/post/edit', ['id_column' => $item['id_column'], '_nosid' => true]),
                    'target' => '_blank',
                    'label' => __('ُPreview'),
                ];
                }
            }   
        return $result;
    }
}