<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface;
use Generated\Shared\Transfer\AddressesTransfer;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Customer\Business\Customer\AddressInterface;
use Spryker\Zed\Customer\Persistence\CustomerEntityManagerInterface;

class CustomerB2bReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bReader
     */
    protected $customerB2bReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Customer\Persistence\CustomerEntityManagerInterface
     */
    protected $customerEntityManagerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface
     */
    protected $customerB2bRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Customer\Business\Customer\AddressInterface
     */
    protected $addressInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bPluginExecutorInterface
     */
    protected $customerB2bPluginExecutorInterfaceMock;

    /**
     * @var string
     */
    protected $customerReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\AddressesTransfer
     */
    protected $addressesTransferMock;

    /**
     * @var string
     */
    protected $customerExternalReference;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerEntityManagerInterfaceMock = $this->getMockBuilder(CustomerEntityManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bRepositoryInterfaceMock = $this->getMockBuilder(CustomerB2bRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->addressInterfaceMock = $this->getMockBuilder(AddressInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bPluginExecutorInterfaceMock = $this->getMockBuilder(CustomerB2bPluginExecutorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerReference = 'customer-reference';

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->addressesTransferMock = $this->getMockBuilder(AddressesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExternalReference = 'customer-external-reference';

        $this->customerB2bReader = new CustomerB2bReader(
            $this->customerEntityManagerInterfaceMock,
            $this->customerB2bRepositoryInterfaceMock,
            $this->addressInterfaceMock,
            $this->customerB2bPluginExecutorInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCustomerByReference(): void
    {
        $this->customerB2bRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCustomerByReference')
            ->with($this->customerReference)
            ->willReturn($this->customerTransferMock);

        $this->addressInterfaceMock->expects($this->atLeastOnce())
            ->method('getAddresses')
            ->with($this->customerTransferMock)
            ->willReturn($this->addressesTransferMock);

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('setAddresses')
            ->with($this->addressesTransferMock)
            ->willReturnSelf();

        $this->customerB2bPluginExecutorInterfaceMock->expects($this->atLeastOnce())
            ->method('executeCustomerHydrationPlugins')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bReader->findCustomerByReference(
                $this->customerReference
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCustomerByExternalReference(): void
    {
        $this->customerB2bRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCustomerByExternalReference')
            ->with($this->customerExternalReference)
            ->willReturn($this->customerTransferMock);

        $this->addressInterfaceMock->expects($this->atLeastOnce())
            ->method('getAddresses')
            ->with($this->customerTransferMock)
            ->willReturn($this->addressesTransferMock);

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('setAddresses')
            ->with($this->addressesTransferMock)
            ->willReturnSelf();

        $this->customerB2bPluginExecutorInterfaceMock->expects($this->atLeastOnce())
            ->method('executeCustomerHydrationPlugins')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bReader->findCustomerByExternalReference(
                $this->customerExternalReference
            )
        );
    }
}
