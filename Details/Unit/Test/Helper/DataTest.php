<?php
namespace Employee\Details\Unit\Test\Helper;

use Employee\Details\Helper\Data;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class DataTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\App\Helper\Context
     */
    protected $context;

    /**
     * Set up
     *
     * @return void
     */
    protected function setUp(): void
    {
        $objectManager = new ObjectManager($this);

        /* Mock Class Object With Constructor Args*/
        $this->helper = $objectManager->getObject(
            Data::class,
            [
               "context" => $this->context,
            ]
        );

    }

    /**
     * Test unitTest function
     */
    public function testUnitTest()
    {
        $this->expectedMessage = __("This is Test");
        $this->assertEquals($this->expectedMessage, $this->helper->unitTest());
    
    }

  
}