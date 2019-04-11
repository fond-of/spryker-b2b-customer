<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b;

use Generated\Shared\Transfer\CustomerTransfer;

class CustomerB2bPluginExecutor implements CustomerB2bPluginExecutorInterface
{
    /**
     * @var \FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface[]
     */
    protected $customerHydrationPlugins;

    /**
     * @param \FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface[] $customerHydrationPlugins
     */
    public function __construct(array $customerHydrationPlugins)
    {
        $this->customerHydrationPlugins = $customerHydrationPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function executeCustomerHydrationPlugins(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        foreach ($this->customerHydrationPlugins as $customerHydrationPlugin) {
            $customerTransfer = $customerHydrationPlugin->hydrate($customerTransfer);
        }

        return $customerTransfer;
    }
}
