<?php

declare(strict_types=1);

namespace Tests\Support\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\Attribute\Depends;
use Codeception\Attribute\Group;
use Tests\Support\AcceptanceTester;

class Helper extends \Codeception\Module
{
    public static bool $ticketcreated = false;
    public static bool $usercreated = false;
    #[Group('timesheet', 'ticket')]
    #[Depends('Acceptance\InstallCest:createDBSuccessfully')]


    // create extra users
    #[Group('user')]
    #[Depends('Acceptance\LoginCest:loginSuccessfully')]
    public function createAUser(AcceptanceTester $I): void
    {
        $I->wantTo('Create a user');
        $I->amOnPage('/users/showAll');
        $I->click('Add User');
        $I->waitForElement('#firstname', 120);
        $I->fillField('#firstname', 'John');
        $I->fillField('#lastname', 'Doe');
        $I->selectOption('#role', 'Read Only');
        $I->selectOption('#client', 'Not assigned to a client');
        $I->fillField('#user', 'john@doe.com');
        $I->fillField('#phone', '1234567890');
        $I->fillField('#jobTitle', 'Testing');
        $I->fillField('#jobLevel', 'Testing');
        $I->fillField('#department', 'Testing');
        $I->click('Invite User');
        $I->waitForElement('.growl', 120);

        $I->seeInDatabase('zp_user', [
            'username' => 'john@doe.com'
        ]);
        self::$usercreated = true;
    }


    // create extra tickets
    public function createTicket(AcceptanceTester $I)
    {
        $I->wantTo('Create a ticket');

        $I->amOnPage('/tickets/showKanban#/tickets/newTicket');
        $I->reloadPage();
        $I->waitForElementVisible('.main-title-input', 20);
        $I->fillField(["class" => "main-title-input"], 'Test Ticket');
        $I->click('.tagsinput');
        $I->type('test-tag,');
        $I->click('.mce-content-body');
        $I->waitForElementClickable('#ticketDescription_ifr', 20);
        $I->switchToIFrame('#ticketDescription_ifr');
        $I->waitForElementVisible("#tinymce", 20);
        $I->click("#tinymce");
        $I->type('Test Description');
        $I->switchToIFrame();
        $I->waitForElementClickable('//*[@id="ticketdetails"]//input[@name="saveTicket"][@type="submit"]', 20);
        $I->click('//*[@id="ticketdetails"]//input[@name="saveTicket"][@type="submit"]');
        $I->waitForElement('.growl', 120);
        $I->seeInDatabase('zp_tickets', [
            'id' => 10,
            'headline' => 'Test Ticket',
            'description like' => '%<p>Test Description</p>%',
        ]);
        self::$ticketcreated = true;
    }



}
