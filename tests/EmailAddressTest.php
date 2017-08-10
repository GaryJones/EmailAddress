<?php
/**
 * Email address value object tests.
 *
 * @package   Gamajo\EmailAddress
 * @author    Gary Jones
 * @copyright 2015 Gamajo
 * @license   MIT
 */

declare(strict_types=1);

namespace Gamajo\EmailAddress\Tests;

use Gamajo\EmailAddress\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailAddressTest.
 *
 * @package Gamajo\EmailAddress
 * @covers \Gamajo\EmailAddress\EmailAddress
 */
class EmailAddressTest extends TestCase
{
    /**
     * @dataProvider validEmailAddresses
     * @dataProvider unusualButValidEmailAddresses
     *
     * @param string $address Full email address.
     */
    public function testCanBeConstructedFromValidEmailAddress(string $address)
    {
        $emailAddress = new EmailAddress($address);

        static::assertInstanceOf(EmailAddress::class, $emailAddress);
    }

    /**
     * @dataProvider validEmailAddresses
     * @dataProvider unusualButValidEmailAddresses
     *
     * @param string $address   Full email address.
     * @param string $localpart Localpart of email address.
     */
    public function testEmailAddressLocalPartIsRetrieved(string $address, string $localpart)
    {
        $emailAddress = new EmailAddress($address);

        static::assertEquals(
            $localpart,
            $emailAddress->getLocalPart()
        );
    }

    /**
     * Test email address domain is correctly retrieved.
     *
     * @dataProvider validEmailAddresses
     * @dataProvider unusualButValidEmailAddresses
     * @noinspection PhpUnusedParameterInspection
     *
     * @param string $address   Full email address.
     * @param string $localpart Localpart of email address.
     * @param string $domain    Domain of email address.
     */
    public function testEmailAddressDomainIsRetrieved(
        string $address,
        /** @noinspection PhpUnusedParameterInspection */ string $localpart,
        string $domain
    ) {
        $emailAddress = new EmailAddress($address);

        static::assertEquals(
            $domain,
            $emailAddress->getDomain()
        );
    }

    /**
     * Data provider for tests.
     *
     * See https://blogs.msdn.microsoft.com/testing123/2009/02/06/email-address-test-cases/.
     *
     * @return array
     */
    public function validEmailAddresses(): array
    {
        return [
            // Full email address, localpart of email address, domain of email address.
            ['me@example.com', 'me', 'example.com'],
            ['"S@m"@example.com', '"S@m"', 'example.com'],
            ['email@domain.com', 'email', 'domain.com'],
            ['firstname.lastname@domain.com', 'firstname.lastname', 'domain.com'],
            ['email@subdomain.domain.com', 'email', 'subdomain.domain.com'],
            ['firstname+lastname@domain.com', 'firstname+lastname', 'domain.com'],
            ['email@123.123.123.123', 'email', '123.123.123.123'],
            ['email@[123.123.123.123]', 'email', '[123.123.123.123]'],
            ['"email"@domain.com', '"email"', 'domain.com'],
            ['1234567890@domain.com', '1234567890', 'domain.com'],
            ['email@domain-one.com', 'email', 'domain-one.com'],
            ['_______@domain.com', '_______', 'domain.com'],
            ['email@domain.name', 'email', 'domain.name'],
            ['email@domain.co.jp', 'email', 'domain.co.jp'],
            ['firstname-lastname@domain.com', 'firstname-lastname', 'domain.com'],
        ];
    }

    /**
     * Data provider for tests.
     *
     * See http://codefool.tumblr.com/post/15288874550/list-of-valid-and-invalid-email-addresses.
     *
     * @return array
     */
    public function unusualButValidEmailAddresses(): array
    {
        return [
            // Full email address, localpart of email address, domain of email address.
            ['much."more\ unusual"@example.com', 'much."more\ unusual"', 'example.com'],
            ['very.unusual."@".unusual.com@example.com', 'very.unusual."@".unusual.com', 'example.com'],
            [
                'very."(),:;<>[]".VERY."very@\\ "very".unusual@strange.example.com',
                'very."(),:;<>[]".VERY."very@\\ "very".unusual',
                'strange.example.com'
            ],
        ];
    }
}
