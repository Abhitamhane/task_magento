<?php

namespace Employee\Details\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Employee\Details\Helper\Data as EmployeeHelper;

class Employee implements ResolverInterface
{
    /** @var EmployeeHelper */
    private $employeeHelper;
   
    /**
     * Class Constructor
     *
     * @param EmployeeHelper $employeeHelper
     */
    public function __construct(EmployeeHelper $employeeHelper)
    {
        $this->employeeHelper = $employeeHelper;
    }
    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $collect = $this->employeeHelper->getCollection();
        $result = [];
        foreach ($collect as $key => $employee) {
            $result[] = [
                'emp_name' => $employee->getEmpName(),
                'emp_no' => $employee->getEmpNo(),
                'id_column' => $employee->getIdColumn(),
                'contact_no' => $employee->getContactNo(),
                'dob' => $employee->getDob()
            ];
        }
        return $result;
    }
}
