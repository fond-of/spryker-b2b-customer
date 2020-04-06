<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerB2bPluginExecutorTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bPluginExecutor
     */
    protected $customerB2bPluginExecutor;

    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface[]
     */
    protected $customerHydrationPlugins;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface
     */
    protected $customerB2bHydrationPluginInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerB2bHydrationPluginInterfaceMock = $this->getMockBuilder(CustomerB2bHydrationPluginInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerHydrationPlugins = [
            $this->customerB2bHydrationPluginInterfaceMock,
        ];

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bPluginExecutor = new CustomerB2bPluginExecutor($this->customerHydrationPlugins);
    }

    /**
     * @return void
     */
    public function testExecuteCustomerHydrationPlugins(): void
    {
        $this->customerB2bHydrationPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('hydrate')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerB2bPluginExecutor->executeCustomerHydrationPlugins(
                $this->customerTransferMock
            )
        );
    }
}
