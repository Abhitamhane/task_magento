<?php
namespace Employee\Details\Block\Adminhtml\Employee\Agents;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{

    protected function _construct()
    {
        parent::_construct();
        $this->setId('_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Agent Information'));
    }

    protected function _prepareLayout()
    {
        $this->addTab(
            'main_section',
            [
                'label' => __('Employee Information'),
                'title' => __('Employee Information'),
            ]
            
        );
    }
}