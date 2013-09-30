<?php

namespace Domain\Support;

use Domain\Model\Book;
use Domain\Model\InMemoryBookInventory;
use Dough\Money\Money;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Helper
{
    protected $bookInventory;

    public function loadUseCases()
    {
        $this->bookInventory = new InMemoryBookInventory();
    }

    public function createTheRequestForTheSpecificBook()
    {
        $bookRequest = ['bookId' => 123];

        return $bookRequest;
    }

    public function findBookInformation($bookRequest)
    {
        $id = $bookRequest['bookId'];
        $books = $this->bookInventory->findBy(['id' => $id]);

        return [
            'id' => $id,
            'amount' => reset($books)->getPrice(),
            'quantity' => 1
        ];
    }

    public function persistBookSampleOnInventoryWithId($id)
    {
        $book = new Book();
        $book->setId($id);
        $book->setPrice(new Money(12));
        $this->bookInventory->save($book);
    }

    public function redirectsCustomerToThirdPartyForPayment()
    {
        return new RedirectResponse('https://sandbox.paypal.com');
    }

    public function waitsForResponseFromThirdPartyAfterPaymentIsDone()
    {
        return [
            'confirmed' => true
        ];
    }

    public function issueOrderAndSendBookToCustomerUponConfirmation()
    {
        return true;
    }
}
