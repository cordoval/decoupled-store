<?php

namespace Domain\Model;

use Vespolina\Entity\Payment\PaymentToken;
use Payum\Security\TokenInterface;

class PayumPaymentToken extends PaymentToken implements TokenInterface
{
    /**
     * @return string
     */
    public function getHash()
    {

    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {

    }

    /**
     * @return string
     */
    public function getTargetUrl()
    {

    }

    /**
     * @param string $targetUrl
     */
    public function setTargetUrl($targetUrl)
    {

    }

    /**
     * @return string
     */
    public function getAfterUrl()
    {

    }

    /**
     * @param string $afterUrl
     */
    public function setAfterUrl($afterUrl)
    {

    }

    /**
     * @return string
     */
    public function getPaymentName()
    {

    }

    /**
     * @param string $paymentName
     */
    public function setPaymentName($paymentName)
    {

    }

    public function getDetails()
    {

    }

    public function setDetails($details)
    {

    }
}
