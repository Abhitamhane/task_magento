<?php

namespace Mageplaza\HelloWorld\Setup\Patch\Data;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class TestInfo implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
       ModuleDataSetupInterface $moduleDataSetup

     ) {

        $this->moduleDataSetup = $moduleDataSetup;

    }
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $setup = $this->moduleDataSetup;

        $data[] = ['emp_no' => '1001', 'emp_name' => 'Abhishek', 'dob' => '11032000', 'contact_no' => '9762523445'];
        $data[] = ['emp_no' => '1002', 'emp_name' => 'Abhi', 'dob' => '12122000', 'contact_no' => '1111111111'];
        $data[] = ['emp_no' => '1003', 'emp_name' => 'QPR', 'dob' => '14112000', 'contact_no' => '1234567890'];
        $data[] = ['emp_no' => '1004', 'emp_name' => 'PQR', 'dob' => '18092000', 'contact_no' => '1123456789'];
        $data[] = ['emp_no' => '1005', 'emp_name' => 'ABC', 'dob' => '23022000', 'contact_no' => '1112345678'];
        $data[] = ['emp_no' => '1006', 'emp_name' => 'XYZ', 'dob' => '22032000', 'contact_no' => '1111234567'];
        $data[] = ['emp_no' => '1007', 'emp_name' => 'WXY', 'dob' => '26062000', 'contact_no' => '1111123456'];
        $data[] = ['emp_no' => '1008', 'emp_name' => 'DEF', 'dob' => '30042000', 'contact_no' => '1111112345'];
        $data[] = ['emp_no' => '1009', 'emp_name' => 'GHI', 'dob' => '02052000', 'contact_no' => '1111111234'];
        $data[] = ['emp_no' => '1010', 'emp_name' => 'RTA', 'dob' => '09072000', 'contact_no' => '1111111123'];


         $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('mp_post'),
            ['emp_No', 'emp_name', 'dob', 'contact_no'],
      
            $data
        );     
        $this->moduleDataSetup->endSetup();
    }

    
    public function getAliases()
    {
        return [];
    }
    public static function getDependencies()
    {
        return [];
    }
}