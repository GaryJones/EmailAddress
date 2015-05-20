<?php
/**
 * Email address value object.
 *
 * @package   Gamajo\EmailAddress
 * @author    Gary Jones
 * @link      http://github.com/GaryJones/EmailAddress
 * @copyright 2015 Gary Jones, Gamajo Tech
 * @license   MIT
 */

namespace Gamajo\EmailAddress;

/**
 * Value Object that represents an email address.
 */
final class EmailAddress
{
    /**
     * @var string
     */
    private $address;

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
     * @throws \InvalidArgumentException Thrown if email address is not valid.
     *
     * @param string $address Full email address.
     */
    public function __construct($address)
    {
        if (! filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(
                sprintf('"%s" is not a valid email', $address)
            );
        }

        $this->address    = $address;
        $this->localpart = implode(explode('@', $this->address, -1), '@');
        $this->domain    = str_replace($this->localpart.'@', '', $this->address);
    }

    /**
     * Convenience function to get full email address.
     *
     * @return string Full email address
     */
    public function __toString()
    {
        return $this->address;
    }

    /**
     * Get local-part of email address.
     *
     * @return string Local-part of email address.
     */
    public function getLocalPart()
    {
        return $this->localpart;
    }

    /**
     * Get domain of email address.
     *
     * @return string Domain of email address.
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
