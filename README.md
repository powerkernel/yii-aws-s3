Yii AWS S3
===========
Yii AWS S3

[![Latest Stable Version](https://img.shields.io/github/tag/powerkernel/yii-aws-s3.svg)](https://github.com/powerkernel/yii-aws-s3/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/powerkernel/yii-aws-s3.svg)](https://packagist.org/packages/powerkernel/yii-aws-s3)
[![GitHub license](https://img.shields.io/github/license/powerkernel/yii-aws-s3.svg)](https://github.com/powerkernel/yii-aws-s3/blob/master/LICENSE)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist powerkernel/yii-aws-s3 "*"
```

or add

```
"powerkernel/yii-aws-s3": "*"
```

to the require section of your `composer.json` file.    


Usage
-----

To use this extension, simply add the following code in your application configuration:
```
'components' => [
// ...
's3' => [
            '__class' => powerkernel\s3\AwsS3::class,
            'key' => 'your aws sns key',
            'secret' => 'your aws sns secret',
            'region' => 'us-west-2',
            // 'endpoint' => '', // for digital ocean spaces https://sfo2.digitaloceanspaces.com
        ],
// ...        
], 
```
You can then call AWS S3 functions as follows:
```
Yii::$app->s3->client->put($arg);
// ...
```
For further instructions refer to the [AWS Documentation page](https://aws.amazon.com/s3/)
