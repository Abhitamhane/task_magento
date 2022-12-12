<?php

namespace Mageplaza\HelloWorld\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Mageplaza\HelloWorld\Model\ResourceModel\Post\CollectionFactory as ViewCollectionFactory;
use \Mageplaza\HelloWorld\Model\PostFactory as employeeTable;

/***
 *  Hellper class to  get emmployee detaiils
 */
class Data extends AbstractHelper
{
    /** @var  ViewCollectionFactory $_viewCollectionFactory*/
    protected $_viewCollectionFactory;

    /** @var employeeTable */
    protected $employeeTable;

    /**
     * Class constructor
     *
     * @param ViewCollectionFactory $viewCollectionFactory
     * @param employeeTable $employeeTable
     */
    public function __construct(ViewCollectionFactory $viewCollectionFactory, employeeTable $employeeTable)
    {
        $this->_viewCollectionFactory = $viewCollectionFactory;
        $this->employeeTable = $employeeTable;
    }

    /**
     * Get employee list
     *
     * @return ViewCollectionFactory $viewCollection
     */
    public function getCollection()
    {
        /** @var ViewCollection $viewCollection */
        $viewCollection = $this->_viewCollectionFactory->create();
        return $viewCollection;
    }

    /**
     * Get employee ddetails by is
     *
     * @param int $idColumn
     *
     *
     * @return Mageplaza\HelloWorld\Model\Post $post
     */
    public function getEmployeeByID($idColumn)
    {
        $post = $this->employeeTable->create()->load($idColumn);
        return $post;
    }

    public function addEmployee($empNo, $empName, $contactNo, $dob)
    {
      
        $addData =  array(
            'emp_no' => $empNo,
            'emp_name' => $empName,
            'contact_no' => $contactNo,
            'dob' => $dob,
           );

        $employee =  $this->employeeTable->create();
        $employee->setData($addData);
        $employee->save();
    }

    public function getData()
    {
     return [];
    }
}
