<?php

namespace Mageplaza\HelloWorld\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\HelloWorld\Helper\Data as EmployeeHelper;
use Magento\Review\Model\ResourceModel\Review\CollectionFactory as ReviewCollectionFactory;

class EmployeeById implements ResolverInterface
{
    /** @var EmployeeHelper $employeeHelper*/
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
        if (empty($args['idColumn'])) {
            throw new GraphQlInputException(__('Id No should be specified'));
        }
        try {
            $collect = $this->employeeHelper->getEmployeeByID($args['idColumn']);
            return $collect->getData();
        
        } catch (NoSuchEntityException $exception) {
            throw  new NoSuchEntityException(__($exception->getMessage()));
        }
    }
}
