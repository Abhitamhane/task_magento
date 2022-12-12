<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Event\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{

    protected function _construct()
    {
        parent::_construct();
        $this->setId('event_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Information'));
    }

    protected function _prepareLayout()
    {
        $this->addTab(
            'main_section',
            [
                'label' => __('Employee Information'),
                'title' => __('Employee Information'),
                'content' => $this->getLayout()
                    ->createBlock(\Mageplaza\HelloWorld\Block\Adminhtml\Event\Edit\Tab\General::Class)->toHtml(),
                'active' => true
            ]
        );
    }
}
