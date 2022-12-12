<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel;


class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('mp_post', 'id_column');
	}
	
	public function getCollection()
    {
        $viewCollection = $this->_viewCollectionFactory ->create();
        return $viewCollection->getItems();
    }
}