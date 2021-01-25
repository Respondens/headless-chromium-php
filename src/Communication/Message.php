<?php

/*
 * This file is part of Chrome PHP.
 *
 * (c) Soufiane Ghzal <sghzal@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HeadlessChromium\Communication;

class Message
{
    /**
     * global message id auto incremented for each message sent.
     * @var int
     */
    private static $messageId = 0;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var array
     */
    protected $params;

    /**
     * get the last generated message id
     * @return int
     */
    public static function getLastMessageId()
    {
        return self::$messageId;
    }

    /**
     * @param string $method
     * @param array $params
     */
    public function __construct($method, array $params = [])
    {
        $this->id = ++self::$messageId;
        $this->method = $method;
        $this->params = $params;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return json_encode([
            'id'        => $this->getId(),
            'method'    => $this->getMethod(),
            'params'    => (object) $this->getParams()
        ]);
    }
}
