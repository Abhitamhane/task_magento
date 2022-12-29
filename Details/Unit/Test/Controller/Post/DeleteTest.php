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

        $this->messageManagerMock = $this->createMock(Manager::class);

        $this->contextMock = $this->createMock(Context::class);

        $this->postFactoryMock = $this->getMockBuilder(PostFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['create','delete','load'])
            ->getMock();

        $this->resultRedirectMock = $this->getMockBuilder(Redirect::class)
            ->disableOriginalConstructor()
            ->setMethods(['setPath','create'])
            ->getMock();
            
        $this->resultFactoryMock = $this->getMockBuilder(ResultFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
            
        $this->resultFactoryMock->expects($this->any())
            ->method('create')
            ->with(ResultFactory::TYPE_REDIRECT)
            ->willReturn($this->resultRedirectMock);

        $this->request = $this->getMockBuilder(\Magento\Framework\App\RequestInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['getPost'])
            ->getMockforAbstractClass();
        
        $this->contextMock
            ->expects($this->once())
            ->method('getRequest')
            ->willReturn($this->request);  
        
        $this->contextMock->expects($this->once())->method('getMessageManager')->willReturn($this->messageManagerMock);
        $this->contextMock->expects($this->any())->method('getResultFactory')->willReturn($this->resultFactoryMock);

        $this->objectManagerHelper = new ObjectManagerHelper($this);

        $this->deleteController = $this->objectManagerHelper->getObject(
        Delete::class,
            [
                'context' => $this->contextMock,
                '_viewCollectionFactory' => $this->postFactoryMock
            ]
        );

        $this->resultRedirectMock->expects($this->once())
        ->method('setPath')
        ->with('*/*/index')
        ->willReturnSelf();
    }

    public function testExecute(): void
    {

        $this->request->expects($this->any())->method('getParam')->willReturn(1);
        // $postData['general']['id_column'] = 123;

        $this->postFactoryMock->expects($this->any())->method('load')->with(1)->willReturnSelf();

        $this->postFactoryMock->expects($this->any())->method('delete')->willReturnSelf();

        $this->messageManagerMock->expects($this->any())
            ->method('addSuccess')
            ->with(__('Data Update Successfully !'));
            
        $this->messageManagerMock->expects($this->never())->method('addErrorMessage');

        $this->resultRedirectMock->expects($this->once())
        ->method('setPath')
        ->with('*/*/index')
        ->willReturnSelf();
        
              $this->deleteController->execute();
    }

}
