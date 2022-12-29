<?php

namespace Employee\Details\Model;

use Employee\Details\Model\ResourceModel\Agent\CollectionFactory as CollectionFactory;

class AgentDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create()->load();
    }

    public function getData()
    
    {
        // print_r("heyyyy");
        $data = parent::getData();
        $items = $this->collection->getData();
        // echo "<pre>"; 
    print_r($this->_loadedData[$items->getId()]['general'] = $items->getData());
    exit;
        // print_r($value);
        // exit;
        return $data;

    }

}