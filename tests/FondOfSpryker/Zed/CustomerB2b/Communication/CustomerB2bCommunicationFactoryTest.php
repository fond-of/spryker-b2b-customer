<?php

namespace FondOfSpryker\Zed\CustomerB2b\Communication;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CustomerB2bCommunicationFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Communication\CustomerB2bCommunicationFactory
     */
    protected $customerB2bCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->localeFacadeInterfaceMock = $this->getMockBuilder(LocaleFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bCommunicationFactory = new CustomerB2bCommunicationFactory();
        $this->customerB2bCommunicationFactory->setContainer($this->containerMock);
    }
}
