<?php
namespace mac\fillable\Tests;

use PHPUnit_Framework_TestCase;

class FillableTest extends PHPUnit_Framework_TestCase
{
    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function testCanInstantiateObject()
    {
        $this->assertEquals('foo bar remember', strval(Login::createFrom([
            'username' => 'foo',
            'password' => 'bar',
            'remember' => true
        ])));
    }

    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function testCanFillObject()
    {
        $login = new Login();
        $login->fill(['username' => 'foo', 'password' => 'bar', 'remember' => true]);
        $this->assertEquals('foo bar remember', strval($login));
    }

    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @dataProvider dataProvider
     */
    public function testUseCases($data, $strval)
    {
        $this->assertEquals($strval, strval(Login::createFrom($data)));
    }

    public function dataProvider()
    {
        return [
            [
                ['username' => 'foo', 'password' => 'bar', 'remember' => false],
                'foo bar'
            ],
            [
                ['username' => 'foo', 'password' => 'bar', 'remember' => true],
                'foo bar remember'
            ],
            [
                ['username' => 'foo', 'password' => 'bar'],
                'foo bar'
            ],
            [
                ['username' => 'foo'],
                'foo'
            ],
            [
                ['username' => 'foo', 'remember' => true],
                'foo remember'
            ],
            [
                ['remember' => true],
                'remember'
            ]
        ];
    }
}
