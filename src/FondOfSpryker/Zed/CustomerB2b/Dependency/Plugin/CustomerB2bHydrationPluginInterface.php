<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerB2bHydrationPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function hydrate(CustomerTransfer $customerTransfer): CustomerTransfer;
}
