<?php

namespace FondOfSpryker\Client\CustomerB2b\Zed;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\ZedRequest\ZedRequestClient;

class CustomerB2bStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CustomerB2b\Zed\CustomerB2bStub
     */
    protected $customerB2bStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\ZedRequest\ZedRequestClient
     */
    protected $zedRequestClientMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerResponseTransfer
     */
    protected $customerResponseTransferMock;

    /**
     * @var string
     */
    protected $externalReferenceUrl;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->zedRequestClientMock = $this->getMockBuilder(ZedRequestClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerResponseTransferMock = $this->getMockBuilder(CustomerResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReferenceUrl = '/customer-b2b/gateway/find-customer-by-external-reference';

        $this->reference = '/customer-b2b/gateway/find-customer-by-reference';

        $this->customerB2bStub = new CustomerB2bStub($this->zedRequestClientMock);
    }

    /**
     * @return void
     */
    public function testFindCustomerByExternalReference(): void
    {
        $this->zedRequestClientMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->externalReferenceUrl, $this->customerTransferMock)
            ->willReturn($this->customerResponseTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bStub->findCustomerByExternalReference(
                $this->customerTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCustomerByReference(): void
    {
        $this->zedRequestClientMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->reference, $this->customerTransferMock)
            ->willReturn($this->customerResponseTransferMock);

        $this->assertInstanceOf(
            CustomerResponseTransfer::class,
            $this->customerB2bStub->findCustomerByReference(
                $this->customerTransferMock
            )
        );
    }
}
