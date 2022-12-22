<?php
namespace Employee\Details\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Employee\Details\Model\PostFactory $postFactory
		)
	{
		
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}
	public function execute()
	{
		$post = $this->_postFactory->create();
		$collection = $post->getCollection();
		foreach($collection as $item){
			echo "<pre><h3>";
			print_r($item->getData());
			echo "</h3></pre>";
		}
		exit();
	
	}
}