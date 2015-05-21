<?php

namespace Gamajo\EmailAddress;

class EmailAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers            \Gamajo\EmailAddress\EmailAddress::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testCannotBeConstructedFromInvalidEmailAddress()
    {
        new EmailAddress('abc.example.com');
    }

    /**
     * @covers \Gamajo\EmailAddress\EmailAddress::__construct
     * @dataProvider emailAddresses
     */
    public function testCanBeConstructedFromValidEmailAddress($address)
    {
        $e = new EmailAddress($address);

        $this->assertInstanceOf('Gamajo\\EmailAddress\\EmailAddress', $e);
    }

    /**
     * @covers \Gamajo\EmailAddress\EmailAddress::__construct
     * @covers \Gamajo\EmailAddress\EmailAddress::getLocalPart
     * @dataProvider emailAddresses
     */
    public function testEmailAddressLocalPart($address, $localpart, $domain)
    {
        $a = new EmailAddress($address);

        $this->assertEquals(
            $localpart,
            $a->getLocalPart()
        );
    }

    /**
     * @covers \Gamajo\EmailAddress\EmailAddress::__construct
     * @covers \Gamajo\EmailAddress\EmailAddress::getDomain
     * @dataProvider emailAddresses
     */
    public function testEmailAddressDomain($address, $localpart, $domain)
    {
        $a = new EmailAddress($address);

        $this->assertEquals(
            $domain,
            $a->getDomain()
        );
    }

    public function emailAddresses()
    {
        return [
            ['me@example.com', 'me', 'example.com'],
            ['"S@m"@example.com', '"S@m"', 'example.com'],
        ];
    }
}
