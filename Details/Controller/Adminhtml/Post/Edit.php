<?php

namespace Employee\Details\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		
		$this->resultPageFactory = $resultPageFactory;
     parent::__construct($context);
	}

	public function execute()
	{ 
        $this->_view->getPage()->getConfig()->getTitle()->prepend( __('Edit Employee Details'));
        $resultPage = $this->resultPageFactory->create();
        $this->_setActiveMenu('Employee_Details::employeedetails');
        return $resultPage;
	}
}

// class Edit extends \Magento\Backend\App\Action
// {
//     /**
//      * @return \Magento\Backend\Model\View\Result\Page
//      */
//     public function execute()
//     {
//         $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
// 		$resultPage->getConfig()->getTitle()->prepend((__('Employee Details Edit')));		
//         return $resultPage;
//     }
// }