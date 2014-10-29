<?php
/**
 * Pomm authentication adapter
 *
 * @package    SlimAuthHmac
 * @copyright  Copyright (c) 2014 Ilan Cohen <ilanco@gmail.com>
 * @license    https://raw.githubusercontent.com/ilanco/slim-auth-hmac/master/LICENSE   MIT License
 * @link       https://github.com/ilanco/slim-auth-hmac
 */

namespace IC\SlimAuthHmac\Adapter;

class PommAdapter extends AbstractAdapter
{
    protected $connection = null;

    public function __construct(\Pomm\Connection\Connection $connection, $tableName, $identityColumn, $credentialColumn)
    {
        $this->connection = $connection;
    }

    public function authenticate()
    {
    }
}

