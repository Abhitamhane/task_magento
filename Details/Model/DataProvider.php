<?php

namespace Employee\Details\Model;

use Employee\Details\Model\ResourceModel\Post\CollectionFactory as CollectionFactory;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $employeeCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $employeeCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        $data = parent::getData();
        //  print_r($data);exit;
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        
        $items = $this->collection->getFirstItem();
        $this->_loadedData = array();
        //print_r($items->getData());exit;
        //foreach ($items as $employee)
        //{
            //$this->_loadedData['employee'][$employee->getData('id_column')] = $employee->getData();
        //}
        $this->_loadedData[$items->getId()]['general'] = $items->getData();
        //echo "<pre>";
        //print_r($this->_loadedData);exit;
        // echo "hyyyyy";exit;
        return $this->_loadedData;
    }
}