<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Event\Edit\Tab;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;
use Mageplaza\HelloWorld\Helper\Data as EmployeeHelper;

/**
 * Class General
 * @package Mageplaza\HelloWorld\Block\Adminhtml\Event\Edit\Tab
 */
class General extends Generic
{
    /**
     * General constructor.
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        EmployeeHelper $employeeHelper,
        array $data = []
    ) {

        parent::__construct($context, $registry, $formFactory, $data);
        $this->coreRegistry = $registry;
        $this->formFactory = $formFactory;
        $this->employeeHelper = $employeeHelper;
    }

    /**
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    Public function _prepareForm()
    {
      
        $form = $this->formFactory->create();
        $form->setHtmlIdPrefix('page_');
        $fieldset = $form
            ->addFieldset(
                'base_fieldset',
                ['legend' => __('General Information')]
            );

        $fieldset->addField(
            'emp_no',
            'text',
            [
                'label' => __('Employee No'),
                'title' => __('Emp_NO'),
                'required' => true,
                'name' => 'emp_no',
            ]
        );

        $fieldset->addField(
            'emp_name',
            'text',
            [
                'label' => __('Employee Name'),
                'title' => __('Emp_Name'),
                'required' => true,
                'name' => 'emp_name',
            ]
        );

        $fieldset->addField(
            'contact_No',
            'text',
            [
                'label' => __('Contact No'),
                'title' => __('Contact_No'),
                'required' => true,
                'name' => 'contact_no',
            ]
        );

        $fieldset->addField(
            'dob',
            'text',
            [
                'label' => __('DOB'),
                'title' => __('DOB'),
                'required' => true,
                'name' => 'dob',
            ]
        );
        $this->setForm($form);
        // $add = $this->employeeHelper->addEmployee($form['emp_no'],$fieldset['empName'],$form['contactNo'],$form['dob']);
        return parent::_prepareForm();
       
    }
   
}
