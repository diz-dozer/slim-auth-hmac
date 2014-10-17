<?php

/**
 * This file is part of the SlimAuthHmac package.
 *
 * (c) Ilan Cohen <ilanco@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IC\SlimAuthHmac\Auth;

/**
 * HMAC Manager computes the HMAC and validates the payload.
 *
 * @author Ilan Cohen <ilanco@gmail.com>
 */
class HmacManager
{
    const DEFAULT_ALGORITHM = 'sha256';

    private $algorithm;

    private $publicKey;

    private $privateKey;

    private $ttl;

    private $timestamp;

    private $hmacHash;

    private $payload;

    /**
     * Constructor.
     *
     * @param string $algorithm  The algorithm used to compute the HMAC
     * @param string $privateKey The private key
     */
    public function __construct($algorithm = self::DEFAULT_ALGORITHM, $privateKey = null)
    {
        $this->setAlgorithm($algorithm);
        $this->setPrivateKey($privateKey);
    }

    /**
     * Sets the algorithm.
     *
     * @param string $algorithm The algorithm used to compute the HMAC
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    }

    /**
     * Gets the algorithm.
     *
     * @return string $algorithm The algorithm used to compute the HMAC
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Sets the public key.
     *
     * @param string $publicKey The public key to identify the client
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    }

    /**
     * Gets the public key.
     *
     * @return string $publicKey The public key to identify the client
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function setTtl($ttl)
    {
        $this->ttl = intval($ttl);
    }

    public function getTtl()
    {
        return $this->ttl;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = intval($timestamp);
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function setHmacHash($hmacHash)
    {
        $this->hmacHash = $hmacHash;
    }

    public function getHmacHash()
    {
        return $this->hmacHash;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function generateHmac()
    {
        $hash = hash_hmac($this->algorithm, $this->payload, $this->privateKey, false);

        return $hash;
    }

    public function isValid($hash1, $hash2)
    {
        return ($hash1 === $hash2);
    }
}
