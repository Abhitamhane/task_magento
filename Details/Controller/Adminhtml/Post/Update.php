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
       
        // echo "<pre>";
         print_r($id);exit;
        try {
        
                $model = $this->_viewCollectionFactory->create();
                $model->load($id)->setData($data)->save();

        
            //   print_r($data['general']['id_column']);exit;

           
            // print_r($addData);exit;
            // $model->setData($data);
            // $model->save();

            if($model)
                {
                $this->messageManager->addSuccess( __('Data Insert Successfully !') );
                }
            }catch (\Exception $e) 
                {
                    $this->messageManager->addError(__($e->getMessage()));
                }
                    $this->_redirect('*/*/index');
    }
}