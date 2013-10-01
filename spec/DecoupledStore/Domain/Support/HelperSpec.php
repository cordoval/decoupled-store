<?php

namespace spec\DecoupledStore\Domain\Support;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HelperSpec extends ObjectBehavior
{
    function let()
    {
        $this->loadUseCases();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DecoupledStore\Domain\Support\Helper');
    }

    function it_creates_a_request_for_a_specific_book()
    {
        $this->createTheRequestForTheSpecificBook()->shouldHaveKey('bookId');
    }

    function it_creates_book_with_id()
    {
        $this->persistBookSampleOnInventoryWithId(123);
    }

    function it_redirectsCustomerToThirdPartyForPayment()
    {
        $params = [
            'id' => 123,
            'amount' => 12,
            'quantity' => 1
        ];

        $this->redirectsCustomerToThirdPartyForPayment()
            ->shouldBeAnInstanceOf('Symfony\Component\HttpFoundation\RedirectResponse')
        ;
    }

    function it_receives_confirmation_payment_from_thirdparty()
    {
        $this->waitsForResponseFromThirdPartyAfterPaymentIsDone()
            ->shouldReturn(['confirmed' => true])
        ;
    }

    function it_sends_book_to_customer_after_confirmation()
    {
        $this->issueOrderAndSendBookToCustomerUponConfirmation()
            ->shouldReturn(true)
        ;
    }
}