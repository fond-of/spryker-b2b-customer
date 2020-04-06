<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bReaderInterface;
use Generated\Shared\Transfer\CustomerResponseTransfer;

class CustomerB2bFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2bFacade
     */
    protected $customerB2bFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2bBusinessFactory
     */
    protected $customerB2bBusinessFactoryMock;

    /**
     * @var string
     */
    protected $customerExternalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bReaderInterface
     */
    protected $customerB2bReaderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerResponseTransfer
     */
    protected $customerResponseTransferMock;

    /**
     * @var string
     */
    protected $customerReference;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerB2bBusinessFactoryMock = $this->getMockBuilder(CustomerB2bBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bReaderInterfaceMock = $this->getMockBuilder(CustomerB2bReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExternalReference = 'customer-external-reference';

        $this->customerResponseTransferMock = $this->getMockBuilder(CustomerResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerReference = 'customer-reference';

        $this->customerB2bFacade = new CustomerB2bFacade();
        $this->customerB2bFacade->setFactory($this->customerB2bBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindCustomerByExternalReference(): void
    {
        $this->customerB2bBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createFondOfCustomerReader')
            ->willReturn($this->customerB2bReaderInterfaceMock);

        $this->customerB2bReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCustomerByExternalReference')
            ->with($this->customerExternalReference)
            ->willReturn($this->customerResponseTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bFacade->findCustomerByExternalReference(
                $this->customerExternalReference
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCustomerByReference(): void
    {
        $this->customerB2bBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createFondOfCustomerReader')
            ->willReturn($this->customerB2bReaderInterfaceMock);

        $this->customerB2bReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCustomerByReference')
            ->with($this->customerReference)
            ->willReturn($this->customerResponseTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bFacade->findCustomerByReference(
                $this->customerReference
            )
        );
    }
}
