<?php

class Token {

    /**
     * @var
     */
    public $prefix;

    /**
     * @var
     */
    protected $token;

    /**
     * @param string $prefix
     * @param bool $entropy
     */
    public function __construct($prefix = 'token_', $limit = 20)
    {
        $this->token = $prefix.str_random($limit);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->token;
    }
}