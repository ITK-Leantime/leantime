<?php

namespace Acceptance;

use Codeception\Attribute\Depends;
use Codeception\Attribute\Group;
use Tests\Support\AcceptanceTester;
use Tests\Support\Helper\Helper;
use Tests\Support\Page\Acceptance\Login;

class TicketsCest
{
    public function _before(AcceptanceTester $I, Login $loginPage, Helper $helper)
    {
        $loginPage->login('test@leantime.io', 'test');
        if(!Helper::$ticketcreated){
            $helper->createTicket($I);
        }
    }

    #[Group('ticket')]
//    #[Depends('createTicket')] NEEDS TO POINT TO HELPER
    public function editTicket(AcceptanceTester $I)
    {
        $I->wantTo('Edit a ticket');

        $I->amOnPage('/tickets/showKanban#/tickets/showTicket/10');
        // Currently (and only in tests) the editor is not loaded when clicked on less the page is reloaded first.
        $I->reloadPage();
        $I->waitForElementVisible(".main-title-input", 20);
        $I->click('.mce-content-body');
        $I->waitForElementClickable('#ticketDescription_ifr', 20);
        $I->switchToIFrame('#ticketDescription_ifr');
        $I->waitForElementVisible("#tinymce", 20);
        $I->click("#tinymce");
        $I->type('Test Description Edited');
        $I->switchToIFrame();
        $I->waitForElementClickable('//*[@id="ticketdetails"]//input[@name="saveTicket"][@type="submit"]', 20);
        $I->click('//*[@id="ticketdetails"]//input[@name="saveTicket"][@type="submit"]');
        $I->wait(2);
        $I->seeInDatabase('zp_tickets', [
            'id' => 10,
            'headline' => 'Test Ticket',

            'description like' => '%Test Description Edited%',
        ]);
    }
}
