<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ProxyManagerTest\ProxyGenerator\AccessInterceptorScopeLocalizer\MethodGenerator;

use PHPUnit_Framework_TestCase;
use ProxyManager\ProxyGenerator\AccessInterceptorScopeLocalizer\MethodGenerator\BindProxyProperties;
use ReflectionClass;

/**
 * Tests for {@see \ProxyManager\ProxyGenerator\AccessInterceptorScopeLocalizer\MethodGenerator\BindProxyProperties}
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 * @license MIT
 *
 * @covers \ProxyManager\ProxyGenerator\AccessInterceptorScopeLocalizer\MethodGenerator\BindProxyProperties
 * @group Coverage
 */
class BindProxyPropertiesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\Code\Generator\PropertyGenerator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $prefixInterceptors;

    /**
     * @var \Zend\Code\Generator\PropertyGenerator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $suffixInterceptors;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->prefixInterceptors = $this->getMock(\Zend\Code\Generator\PropertyGenerator::class);
        $this->suffixInterceptors = $this->getMock(\Zend\Code\Generator\PropertyGenerator::class);

        $this->prefixInterceptors->expects($this->any())->method('getName')->will($this->returnValue('pre'));
        $this->suffixInterceptors->expects($this->any())->method('getName')->will($this->returnValue('post'));
    }

    public function testSignature()
    {
        $method = new BindProxyProperties(
            new ReflectionClass(\ProxyManagerTestAsset\ClassWithProtectedProperties::class),
            $this->prefixInterceptors,
            $this->suffixInterceptors
        );
        $this->assertSame('bindProxyProperties', $method->getName());
        $this->assertSame('private', $method->getVisibility());
        $this->assertFalse($method->isStatic());

        $parameters = $method->getParameters();

        $this->assertCount(3, $parameters);

        $this->assertSame(
            \ProxyManagerTestAsset\ClassWithProtectedProperties::class,
            $parameters['localizedObject']->getType()
        );
        $this->assertSame('array', $parameters['prefixInterceptors']->getType());
        $this->assertSame('array', $parameters['suffixInterceptors']->getType());
    }

    public function testBodyStructure()
    {
        $method = new BindProxyProperties(
            new ReflectionClass(\ProxyManagerTestAsset\ClassWithPublicProperties::class),
            $this->prefixInterceptors,
            $this->suffixInterceptors
        );

        $this->assertSame(
            '$this->property0 = & $localizedObject->property0;

$this->property1 = & $localizedObject->property1;

$this->property2 = & $localizedObject->property2;

$this->property3 = & $localizedObject->property3;

$this->property4 = & $localizedObject->property4;

$this->property5 = & $localizedObject->property5;

$this->property6 = & $localizedObject->property6;

$this->property7 = & $localizedObject->property7;

$this->property8 = & $localizedObject->property8;

$this->property9 = & $localizedObject->property9;

$this->pre = $prefixInterceptors;
$this->post = $suffixInterceptors;',
            $method->getBody()
        );
    }

    public function testBodyStructureWithProtectedProperties()
    {
        $method = new BindProxyProperties(
            new ReflectionClass(\ProxyManagerTestAsset\ClassWithProtectedProperties::class),
            $this->prefixInterceptors,
            $this->suffixInterceptors
        );

        $this->assertSame(
            '$this->property0 = & $localizedObject->property0;

$this->property1 = & $localizedObject->property1;

$this->property2 = & $localizedObject->property2;

$this->property3 = & $localizedObject->property3;

$this->property4 = & $localizedObject->property4;

$this->property5 = & $localizedObject->property5;

$this->property6 = & $localizedObject->property6;

$this->property7 = & $localizedObject->property7;

$this->property8 = & $localizedObject->property8;

$this->property9 = & $localizedObject->property9;

$this->pre = $prefixInterceptors;
$this->post = $suffixInterceptors;',
            $method->getBody()
        );
    }

    public function testBodyStructureWithPrivateProperties()
    {
        $method = new BindProxyProperties(
            new ReflectionClass(\ProxyManagerTestAsset\ClassWithPrivateProperties::class),
            $this->prefixInterceptors,
            $this->suffixInterceptors
        );

        $this->assertSame(
            '\Closure::bind(function () use ($localizedObject) {
    $this->property0 = & $localizedObject->property0;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property1 = & $localizedObject->property1;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property2 = & $localizedObject->property2;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property3 = & $localizedObject->property3;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property4 = & $localizedObject->property4;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property5 = & $localizedObject->property5;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property6 = & $localizedObject->property6;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property7 = & $localizedObject->property7;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property8 = & $localizedObject->property8;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

\Closure::bind(function () use ($localizedObject) {
    $this->property9 = & $localizedObject->property9;
}, $this, \'ProxyManagerTestAsset\\\\ClassWithPrivateProperties\')->__invoke();

$this->pre = $prefixInterceptors;
$this->post = $suffixInterceptors;',
            $method->getBody()
        );
    }
}
