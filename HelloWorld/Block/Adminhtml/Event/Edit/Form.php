<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Event\Edit;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;

/**
 * Class Form
 * @package Mageplaza\HelloWorld\Block\Adminhtml\Event\Edit
 */
class Form extends Generic
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
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
        $this->formFactory = $formFactory;
    }

    /**
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $form = $this->formFactory->create(
            [
                'data' => [
                        'id' => 'edit_form',
                    ]
            ]
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
        // $add = $this->employeeHelper->addEmployee($form['emp_no'],$fieldset['empName'],$form['contactNo'],$form['dob']);
    }
}
