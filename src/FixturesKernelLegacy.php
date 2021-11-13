<?php

namespace Behat\Mink\Tests\Driver\Util;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class FixturesKernelLegacy extends AbstractFixturesKernel implements HttpKernelInterface
{
    # TODO remove if symfony 5 support is dropped
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true): Response
    {
        $this->prepareSession($request);

        $response = $this->handleFixtureRequest($request);

        $this->saveSession($request, $response);
        $response->prepare($request);

        return $response;
    }
}
