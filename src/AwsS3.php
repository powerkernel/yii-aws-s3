<?php

/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */


namespace powerkernel\s3;


use Aws\Credentials\Credentials;
use yii\base\InvalidConfigException;

/**
 * Class AwsS3
 * @package powerkernel\s3
 */
class AwsS3 extends \yii\base\Component
{

    public $key;
    public $secret;
    public $region;
    public $endpoint;

    private $_client;
    private $_credentials;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->key)) {
            throw new InvalidConfigException(get_class($this) . '::key cannot be empty.');
        }
        if (empty($this->secret)) {
            throw new InvalidConfigException(get_class($this) . '::secret cannot be empty.');
        }
        if (empty($this->region)) {
            throw new InvalidConfigException(get_class($this) . '::region cannot be empty.');
        }
        $this->_credentials = new Credentials($this->key, $this->secret);
        parent::init();
    }

    /**
     * Get Client
     */
    public function getClient()
    {
        if (!$this->_client) {
            $opts = [
                'version' => 'latest',
                'region' => $this->region,
                'endpoint' => $this->endpoint,
                'credentials' => $this->_credentials,
            ];


            if (!empty($this->endpoint)) {
                $opts['endpoint'] = $this->endpoint;
            }

            $this->_client  = new \Aws\S3\S3Client($opts);
        }
        return $this->_client;
    }
}

