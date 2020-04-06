<?php

namespace FondOfSpryker\Zed\CustomerB2b\Communication\Plugin\CustomerB2b;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerB2b\Communication\CustomerB2bCommunicationFactory;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CustomerB2bLocaleHydrationPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Communication\Plugin\CustomerB2b\CustomerB2bLocaleHydrationPlugin
     */
    protected $customerB2bLocaleHydrationPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var int
     */
    protected $idLocale;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerB2b\Communication\CustomerB2bCommunicationFactory
     */
    protected $customerB2bCommunicationFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\LocaleTransfer
     */
    protected $localeTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerB2bCommunicationFactoryMock = $this->getMockBuilder(CustomerB2bCommunicationFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idLocale = 1;

        $this->localeFacadeInterfaceMock = $this->getMockBuilder(LocaleFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->localeTransferMock = $this->getMockBuilder(LocaleTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerB2bLocaleHydrationPlugin = new CustomerB2bLocaleHydrationPlugin();
        $this->customerB2bLocaleHydrationPlugin->setFactory($this->customerB2bCommunicationFactoryMock);
    }

    /**
     * @return void
     */
    public function testHydrate(): void
    {
        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getFkLocale')
            ->willReturn($this->idLocale);

        $this->customerB2bCommunicationFactoryMock->expects($this->atLeastOnce())
            ->method('getOriginalLocaleFacade')
            ->willReturn($this->localeFacadeInterfaceMock);

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getFkLocale')
            ->willReturn($this->idLocale);

        $this->localeFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('getLocaleById')
            ->with($this->idLocale)
            ->willReturn($this->localeTransferMock);

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('setLocale')
            ->with($this->localeTransferMock)
            ->willReturnSelf();

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerB2bLocaleHydrationPlugin->hydrate(
                $this->customerTransferMock
            )
        );
    }
}
