<?php

namespace FondOfSpryker\Client\CustomerB2b;

use FondOfSpryker\Client\CustomerB2b\Zed\CustomerB2bStub;
use Spryker\Client\Customer\CustomerFactory as SprykerCustomerFactory;

class CustomerB2bFactory extends SprykerCustomerFactory
{
    /**
     * @throws
     * @return \FondOfSpryker\Client\CustomerB2b\Zed\CustomerB2bStubInterface
     */
    public function createZedCustomerStub()
    {
        return new CustomerB2bStub($this->getProvidedDependency(CustomerB2bDependencyProvider::SERVICE_ZED));
    }
}
