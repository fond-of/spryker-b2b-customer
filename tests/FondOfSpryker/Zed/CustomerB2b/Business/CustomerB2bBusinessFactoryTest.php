<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface;
use FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bEntityManager;
use FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bQueryContainer;
use FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepository;
use Spryker\Zed\Customer\Dependency\Facade\CustomerToCountryInterface;
use Spryker\Zed\Customer\Dependency\Facade\CustomerToLocaleInterface;
use Spryker\Zed\Customer\Dependency\Plugin\CustomerTransferExpanderPluginInterface;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CustomerB2bBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2bBusinessFactory
     */
    protected $customerB2bBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bEntityManager
     */
    protected $customerB2bEntityManagerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepository
     */
    protected $customerB2bRepositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bQueryContainer
     */
    protected $customerB2bQueryContainerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Customer\Dependency\Facade\CustomerToCountryInterface
     */
    protected $customerToCountryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Customer\Dependency\Facade\CustomerToLocaleInterface
     */
    protected $customerToLocaleInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Customer\Dependency\Plugin\CustomerTransferExpanderPluginInterface
     */
    protected $customerTransferExpanderPluginInterfaceMock;

    /**
     * @var \Spryker\Zed\Customer\Dependency\Plugin\CustomerTransferExpanderPluginInterface[]
     */
    protected $customerTransferExpanderPluginInterfaceMocks;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface
     */
    protected $customerB2bHydrationPluginInterfaceMock;

    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface[]
     */
    protected $customerB2bHydrationPluginInterfaceMocks;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerB2bEntityManagerMock = $this->getMockBuilder(CustomerB2bEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bRepositoryMock = $this->getMockBuilder(CustomerB2bRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bQueryContainerMock = $this->getMockBuilder(CustomerB2bQueryContainer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerToCountryInterfaceMock = $this->getMockBuilder(CustomerToCountryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerToLocaleInterfaceMock = $this->getMockBuilder(CustomerToLocaleInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferExpanderPluginInterfaceMock = $this->getMockBuilder(CustomerTransferExpanderPluginInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferExpanderPluginInterfaceMocks = [
            $this->customerTransferExpanderPluginInterfaceMock,
        ];

        $this->customerB2bHydrationPluginInterfaceMock = $this->getMockBuilder(CustomerB2bHydrationPluginInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bHydrationPluginInterfaceMocks = [
            $this->customerB2bHydrationPluginInterfaceMock,
        ];

        $this->localeFacadeInterfaceMock = $this->getMockBuilder(LocaleFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bBusinessFactory = new CustomerB2bBusinessFactory();
        $this->customerB2bBusinessFactory->setEntityManager($this->customerB2bEntityManagerMock);
        $this->customerB2bBusinessFactory->setRepository($this->customerB2bRepositoryMock);
        $this->customerB2bBusinessFactory->setQueryContainer($this->customerB2bQueryContainerMock);
        $this->customerB2bBusinessFactory->setContainer($this->containerMock);
    }
}
