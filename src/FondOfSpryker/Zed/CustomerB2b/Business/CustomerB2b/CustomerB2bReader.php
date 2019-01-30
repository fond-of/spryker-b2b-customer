<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b;

use FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface;
use Generated\Shared\Transfer\CustomerResponseTransfer;
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
     * @param \Spryker\Zed\Customer\Persistence\CustomerEntityManagerInterface $customerEntityManager
     * @param \FondOfSpryker\Zed\CustomerB2B\Persistence\CustomerB2bRepositoryInterface $customerRepository
     * @param \Spryker\Zed\Customer\Business\Customer\AddressInterface $addressManager
     */
    public function __construct(
        CustomerEntityManagerInterface $customerEntityManager,
        CustomerB2bRepositoryInterface $customerRepository,
        AddressInterface $addressManager
    ) {
        parent::__construct($customerEntityManager, $customerRepository, $addressManager);
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(string $customerExternalReference): CustomerResponseTransfer
    {
        $customerTransfer = $this->customerRepository->findCustomerByExternalReference($customerExternalReference);

        $customerResponseTransfer = (new CustomerResponseTransfer())
            ->setIsSuccess(false)
            ->setHasCustomer(false);

        if ($customerTransfer) {
            $customerTransfer->setAddresses($this->addressManager->getAddresses($customerTransfer));
            $customerResponseTransfer->setCustomerTransfer($customerTransfer)
                ->setHasCustomer(true)
                ->setIsSuccess(true);
        }

        return $customerResponseTransfer;
    }
}
