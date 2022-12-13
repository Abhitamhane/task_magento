<?php

namespace Employee\Details\Controller\Adminhtml\Post;

use \Employee\Details\Model\PostFactory as ViewCollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
// use Employee\Details\Helper\Data as EmployeeHelper;

use Magento\Framework\Controller\ResultFactory;

class Update extends Action
{
    protected $_viewCollectionFactory;

    public function __construct(ViewCollectionFactory $viewCollectionFactory, Context $context)
    {
        $this->_viewCollectionFactory = $viewCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = (int)$this->getRequest()->getParam("id_column");  
        $data= $this->getRequest()->getPost();
        
        try {
        
                $model = $this->_viewCollectionFactory->create();
                $model->load($data['general']['id_column']);
                $model->setEmpNo($data['general']['emp_no']);
                $model->setEmpName($data['general']['emp_name']);
                $model->setContactNo($data['general']['contact_no']);
                $model->setDob($data['general']['dob']);
                $model->save();
            if($model)
                {
                $this->messageManager->addSuccess( __('Data Update Successfully !') );
                }
            }catch (\Exception $e) 
                {
                    $this->messageManager->addError(__($e->getMessage()));
                }
                    $this->_redirect('*/*/index');
    }
}