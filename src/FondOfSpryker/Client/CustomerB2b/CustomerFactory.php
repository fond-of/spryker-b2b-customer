<?php

namespace FondOfSpryker\Client\CustomerB2b;

use FondOfSpryker\Client\CustomerB2b\Zed\CustomerStub;
use Spryker\Client\Customer\CustomerFactory as SprykerCustomerFactory;

class CustomerFactory extends SprykerCustomerFactory
{
    /**
     * @throws
     * @return \FondOfSpryker\Client\CustomerB2b\Zed\CustomerStubInterface
     */
    public function createZedCustomerStub()
    {
        return new CustomerStub($this->getProvidedDependency(CustomerDependencyProvider::SERVICE_ZED));
    }
}
