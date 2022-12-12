<?php
namespace Mageplaza\HelloWorld\Model;
class Edit extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'mp_post';

	protected $_cacheTag = 'mp_post';

	protected $_eventPrefix = 'mp_post';

	protected function _construct()
	{
		$this->_init('Mageplaza\HelloWorld\Model\ResourceModel\Edit');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}