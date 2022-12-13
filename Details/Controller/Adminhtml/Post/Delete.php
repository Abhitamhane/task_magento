<?php


namespace Employee\Details\Controller\Adminhtml\post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Employee\Details\Model\Post;



class Delete extends Action {
     
    public function execute() {
        $id = $this->getRequest()->getParam('id_column');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            $title = "";
            try {
               $model = $this->_objectManager->create('Yournamespace\Brand\Model\Branddetails');
               $model->load($id);
               $model->delete();
               $this->messageManager->addSuccess(__('The brand has been deleted.'));
               return $resultRedirect->setPath('*/*/index');
           } catch (\Exception $e) {
               $this->messageManager->addError($e->getMessage());
               return $resultRedirect->setPath('employee_details/post/edit', ['entity_id' => $id]);
           }
       }
   }
}