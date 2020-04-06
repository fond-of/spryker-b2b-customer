<?php

namespace FondOfSpryker\Client\CustomerB2b;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CustomerB2b\Zed\CustomerB2bStubInterface;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerB2bClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CustomerB2b\CustomerB2bClient
     */
    protected $customerB2bClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CustomerB2b\CustomerB2bFactory
     */
    protected $customerB2bFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CustomerB2b\Zed\CustomerB2bStubInterface
     */
    protected $customerB2bStubInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerResponseTransfer
     */
    protected $customerResponseTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerB2bFactoryMock = $this->getMockBuilder(CustomerB2bFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bStubInterfaceMock = $this->getMockBuilder(CustomerB2bStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerResponseTransferMock = $this->getMockBuilder(CustomerResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bClient = new CustomerB2bClient();
        $this->customerB2bClient->setFactory($this->customerB2bFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindCustomerByExternalReference(): void
    {
        $this->customerB2bFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCustomerStub')
            ->willReturn($this->customerB2bStubInterfaceMock);

        $this->customerB2bStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCustomerByExternalReference')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerResponseTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bClient->findCustomerByExternalReference(
                $this->customerTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCustomerByReference(): void
    {
        $this->customerB2bFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCustomerStub')
            ->willReturn($this->customerB2bStubInterfaceMock);

        $this->customerB2bStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCustomerByReference')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerResponseTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bClient->findCustomerByReference(
                $this->customerTransferMock
            )
        );
    }
}
