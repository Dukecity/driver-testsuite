<?php

namespace Behat\Mink\Tests\Driver\Util;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Kernel;

if(Kernel::VERSION_ID < 50000)
{
    // Symfony < 5
    class FixturesKernel extends FixturesKernelLegacy implements HttpKernelInterface
    {}
}
else
{
    // Symfony >= 5
    class FixturesKernel extends FixturesKernelSymfony5 implements HttpKernelInterface
    {}
}
