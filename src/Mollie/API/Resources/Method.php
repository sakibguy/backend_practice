<?php

namespace Mollie\Api\Resources;

class Method
{
    /**
     * Id of the payment method.
     *
     * @var string
     */
    public $id;

    /**
     * More legible description of the payment method.
     *
     * @var string
     */
    public $description;

    /**
     * The $image->size1x and $image->size2x to display the payment method logo.
     *
     * @var object
     */
    public $image;

    /**
     * The issuers available for this payment method. Only for the methods iDEAL, KBC/CBC and gift cards.
     * Will only be filled when explicitly requested using the query string `include` parameter.
     *
     * @var array|Issuer[]
     */
    public $issuers;

    /**
     * @var object[]
     */
    public $_links;
}
