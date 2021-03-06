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

namespace ProxyManagerTestAsset;

/**
 * Base test class to play around with mixed visibility properties
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 * @license MIT
 */
class ClassWithMixedProperties
{
    public static $publicStaticProperty       = 'publicStaticProperty';

    protected static $protectedStaticProperty = 'protectedStaticProperty';

    private static $privateStaticProperty     = 'privateStaticProperty';

    public $publicProperty0       = 'publicProperty0';

    public $publicProperty1       = 'publicProperty1';

    public $publicProperty2       = 'publicProperty2';

    protected $protectedProperty0 = 'protectedProperty0';

    protected $protectedProperty1 = 'protectedProperty1';

    protected $protectedProperty2 = 'protectedProperty2';

    private $privateProperty0     = 'privateProperty0';

    private $privateProperty1     = 'privateProperty1';

    private $privateProperty2     = 'privateProperty2';
}
