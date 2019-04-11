<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerB2bPluginExecutorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function executeCustomerHydrationPlugins(CustomerTransfer $customerTransfer): CustomerTransfer;
}
