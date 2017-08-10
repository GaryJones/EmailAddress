<?php
/**
 * Email address value object
 *
 * @package   Gamajo\EmailAddress
 * @author    Gary Jones
 * @copyright 2015 Gamajo
 * @license   MIT
 */

declare(strict_types=1);

namespace Gamajo\EmailAddress;

/**
 * Value object that represents an email address.
 */
final class EmailAddress
{
    /**
     * @var string
     */
    private $localpart;

    /**
     * @var string
     */
    private $domain;

    /**
     * Receive email address.
     *
     * @param string $address Full email address.
     */
    public function __construct($address)
    {
        $this->localpart = implode(explode('@', $address, -1), '@');
        $this->domain    = str_replace($this->localpart.'@', '', $address);
    }

    /**
     * Convenience function to get full email address.
     *
     * @return string Full email address
     */
    public function __toString(): string
    {
        return $this->localpart . '@' . $this->domain;
    }

    /**
     * Get local-part of email address.
     *
     * @return string Local-part of email address.
     */
    public function getLocalPart(): string
    {
        return $this->localpart;
    }

    /**
     * Get domain of email address.
     *
     * @return string Domain of email address.
     */
    public function getDomain(): string
    {
        return $this->domain;
    }
}
