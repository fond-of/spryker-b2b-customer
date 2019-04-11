<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Persistence;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Customer\Persistence\CustomerRepository as SprykerCustomerRepository;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bPersistenceFactory getFactory()
 */
class CustomerB2bRepository extends SprykerCustomerRepository implements CustomerB2bRepositoryInterface
{
    /**
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer|null
     */
    public function findCustomerByExternalReference(string $customerExternalReference): ?CustomerTransfer
    {
        $customerEntity = $this->getFactory()->createSpyCustomerQuery()->findOneByExternalReference($customerExternalReference);


        if ($customerEntity === null) {
            return null;
        }

        return $this->getFactory()
            ->createCustomerMapper()
            ->mapCustomerEntityToCustomer($customerEntity->toArray());
    }
}
