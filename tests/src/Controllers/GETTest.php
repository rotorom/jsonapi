<?php
/**
 * Copyright 2015 - 2016 Xenofon Spafaridis
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Phramework\JSONAPI\Controller;

use Phramework\JSONAPI\APP\Bootstrap;
use \Phramework\Phramework;

/**
 * @coversDefaultClass \Phramework\JSONAPI\Controller\GET
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 */
class GETTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Phramework
     */
    protected $phramework;

    /**
     * @var object
     */
    protected $parameters;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     * @todo update base
     */
    protected function setUp()
    {
    }

    protected function prepare()
    {
        $_SERVER['REQUEST_URI'] = '/article/';
        $_SERVER['REQUEST_METHOD'] = Phramework::METHOD_GET;

        $this->phramework = \Phramework\JSONAPI\APP\Bootstrap::prepare();

        Phramework::setViewer(
            \Phramework\JSONAPI\APP\Viewers\PHPUnit::class
        );

        $that = $this;

        \Phramework\JSONAPI\APP\Viewers\PHPUnit::setCallback(
            function (
                $parameters
            ) use (
                $that
            ) {
                $that->parameters = $parameters;
            }
        );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Phramework\JSONAPI\Controller\GET::handleGET
     */
    public function testHandleGet()
    {
        $this->prepare();

        $this->phramework->invoke();
    }
}
