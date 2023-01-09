<?php

namespace Employee\Details\Unit\Test\Controller\Post;

use PHPUnit\Framework\TestCase;
use Magento\Backend\App\Action\Context;
use \Employee\Details\Model\PostFactory;
use PHPUnit\Framework\MockObject\MockObject;
use Employee\Details\Controller\Adminhtml\Post\Delete;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;
use Magento\Framework\Message\Manager;
use Magento\Framework\Controller\ResultFactory;



Class DeleteTest extends TestCase
{
    protected $contextMock;
    protected $objectManagerHelper;
    protected $postFactoryMock;
    protected $resultFactoryMock;
    protected $resultRedirectMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManagerHelper = new ObjectManagerHelper($this);

        $this->contextMock = $this->createMock(Context::class);

        $this->postFactoryMock = $this->getMockBuilder(PostFactory::class)
        ->disableOriginalConstructor()
        ->setMethods(['create','setData','save','load'])
        ->getMock();

        $this->request = $this->getMockBuilder(\Magento\Framework\App\RequestInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['getPost','load'])
            ->getMockforAbstractClass();

        $this->contextMock
            ->expects($this->once())
            ->method('getRequest')
            ->willReturn($this->request);

        $this->deleteController = $this->objectManagerHelper->getObject(
        Delete::class,
            [
                'context' => $this->contextMock,
                '_viewCollectionFactory' => $this->postFactoryMock
            ]
        );



        $this->request->expects($this->any())->method('getParam')->willReturn(1);

        $this->postFactoryMock->expects($this->any())->method('load')->with($this->request)->willReturn($this->postFactoryMock);

    }

    public function testExecute(): void
    {
              $this->deleteController->execute();
    }

}
