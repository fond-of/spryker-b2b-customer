<?php

namespace FondOfSpryker\Client\CustomerB2b;

use FondOfSpryker\Client\CustomerB2b\Zed\CustomerB2BStub;
use Spryker\Client\Customer\CustomerFactory as SprykerCustomerFactory;

class CustomerB2bFactory extends SprykerCustomerFactory
{
    /**
     * @throws
     * @return \FondOfSpryker\Client\CustomerB2b\Zed\CustomerB2bStubInterface
     */
    public function createZedCustomerStub()
    {
        return new CustomerB2BStub($this->getProvidedDependency(CustomerB2bDependencyProvider::SERVICE_ZED));
    }
}
