<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

use \Mageplaza\HelloWorld\Model\PostFactory as ViewCollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
// use Mageplaza\HelloWorld\Helper\Data as EmployeeHelper;

use Magento\Framework\Controller\ResultFactory;

class Save extends Action
{
    protected $_viewCollectionFactory;

    public function __construct(ViewCollectionFactory $viewCollectionFactory, Context $context)
    {
        $this->_viewCollectionFactory = $viewCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data= $this->getRequest()->getPost();
        // $id = (int)$this->getRequest()->getParam('entity_id');
        try {
            $model = $this->_viewCollectionFactory->create();
            $model->addData([
                "empNo" => $data['emp_no'],
                "empName" => $data['emp_name'],
                "contactNo" => $data['contact_no'],
                "dob" => $data['dob'],
            ]);
            $saveData = $model->save();

            if($saveData){
 
                $this->messageManager->addSuccess( __('Insert data Successfully !') );
             
            }
                    }catch (\Exception $e) {

                        $this->messageManager->addError(__($e->getMessage()));

                    }
             
                    $this->_redirect('*/*/index');
             
                }
           
            
    

            // $model->setData($data)->save();
            
    
}