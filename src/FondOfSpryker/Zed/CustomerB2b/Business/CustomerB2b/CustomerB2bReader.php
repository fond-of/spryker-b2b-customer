<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b;

use FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Customer\Business\Customer\AddressInterface;
use Spryker\Zed\Customer\Business\Customer\CustomerReader as SprykerCustomerReader;
use Spryker\Zed\Customer\Persistence\CustomerEntityManagerInterface;

class CustomerB2bReader extends SprykerCustomerReader implements CustomerB2bReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bPluginExecutorInterface
     */
    protected $customerB2bPluginExecutor;

    /**
     * @param \Spryker\Zed\Customer\Persistence\CustomerEntityManagerInterface $customerEntityManager
     * @param \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface $customerRepository
     * @param \Spryker\Zed\Customer\Business\Customer\AddressInterface $addressManager
     * @param \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bPluginExecutorInterface $customerB2bPluginExecutor
     */
    public function __construct(
        CustomerEntityManagerInterface $customerEntityManager,
        CustomerB2bRepositoryInterface $customerRepository,
        AddressInterface $addressManager,
        CustomerB2bPluginExecutorInterface $customerB2bPluginExecutor
    ) {
        parent::__construct($customerEntityManager, $customerRepository, $addressManager);
        $this->customerRepository = $customerRepository;
        $this->customerB2bPluginExecutor = $customerB2bPluginExecutor;
    }

    /**
     * @param string $customerReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByReference(string $customerReference): CustomerResponseTransfer
    {
        $customerTransfer = $this->customerRepository->findCustomerByReference($customerReference);

        $customerResponseTransfer = $this->createCustomerResponseTransfer();

        if ($customerTransfer) {
            $customerTransfer = $this->prepareCustomerTransferForResponse($customerTransfer);

            $customerResponseTransfer->setCustomerTransfer($customerTransfer);
            $customerResponseTransfer->setHasCustomer(true);
            $customerResponseTransfer->setIsSuccess(true);
        }

        return $customerResponseTransfer;
    }

    /**
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(string $customerExternalReference): CustomerResponseTransfer
    {
        $customerTransfer = $this->customerRepository->findCustomerByExternalReference($customerExternalReference);

        $customerResponseTransfer = $this->createCustomerResponseTransfer();

        if ($customerTransfer) {
            $customerTransfer = $this->prepareCustomerTransferForResponse($customerTransfer);

            $customerResponseTransfer->setCustomerTransfer($customerTransfer);
            $customerResponseTransfer->setHasCustomer(true);
            $customerResponseTransfer->setIsSuccess(true);
        }

        return $customerResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function prepareCustomerTransferForResponse(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $customerTransfer->setAddresses($this->addressManager->getAddresses($customerTransfer));

        $customerTransfer = $this->customerB2bPluginExecutor->executeCustomerHydrationPlugins($customerTransfer);

        return $customerTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    protected function createCustomerResponseTransfer(): CustomerResponseTransfer
    {
        return (new CustomerResponseTransfer())
            ->setIsSuccess(false)
            ->setHasCustomer(false);
    }
}
