<?php


namespace Tests\Acceptance;

use Codeception\Attribute\Depends;
use Codeception\Attribute\Group;
use Codeception\Util\Locator;
use PHPUnit\Framework\Assert;
use Tests\Support\AcceptanceTester;
use Tests\Support\Page\Acceptance\Login;

class bigProjectCest
{
    public function _before(AcceptanceTester $I, login $loginPage)
    {
        $loginPage->login('test@leantime.io', 'test');
    }

    // tests
    // please use css selector
    #[Group('projects')]
    public function projectStartSomethingNew(AcceptanceTester $I)
    {
        $I->wantTo('click menu: project > then click on and fill project CreateSomethingNew ');
        $I->amOnPage('/');
        $I->click('.bigProjectSelector');
        $I->wait(2);
        $I->click('.fancyLink');
        $I->waitForElementVisible('.nyroModalBg .profileBox a.btn.btn-primary' , 2);
        $I->click('div.col-md-4:nth-child(3) > div:nth-child(1) > a:nth-child(7)');
        $I->fillField('//*[@id="name"]', 'This is my title');
        $I->click('.tox-edit-area');
        $I->type('Hello World !');
        $I->click('//*[@id="save"]');
    }

    #[Group('projects')]
    #[Depends('projectStartSomethingNew')]
    public function duplicateProject(AcceptanceTester $I)
    {
        $I->wantTo('duplicate a single project');
        $I->amOnPage('/projects/showProject/4');
        $I->seeElement('.duplicateProjectModal');
        $I->click('.duplicateProjectModal');
        $I->waitForElementVisible('div.nyroModalCont:nth-child(1)',2);
        $I->fillField('.formModal > input:nth-child(2)', 'I am a copy');
        $I->click('/html/body/div[3]/div/div[1]/div[1]/div/form/div/div[1]/input'); // xpath submit
        $I->wait(2);
        $I->click('.nyroModalClose');
        $I->waitForElementVisible('.header .headerinner ul.headmenu li a.dropdown-toggle.bigProjectSelector ', 2);
        $I->click('.header .headerinner ul.headmenu li a.dropdown-toggle.bigProjectSelector ', );
        $I->see('I am a copy');
    }

    #[Group('projects')]
    public function editTestAUser(AcceptanceTester $I): void
    {
        $I->wantTo('Edit a user');
        $I->amOnPage('/users/editUser/2/');
        $I->see('Edit User');
        $I->selectOption('#status', 'a');
        $I->selectOption('#project_4', '4');
        $I->click('Save');
        $I->waitForElement('.growl', 120);
        $I->see('User edited successfully');
        $I->wait(2);
    }
    #[Group('projects')]
    public function CreateTodo(AcceptanceTester $I)
    {
        $I->wantTo('create a todo in a project');
        $I->amOnPage('/dashboard/show');
        $I->click('#submenu-materialize > li:nth-child(1) > a:nth-child(1)');
        $I->see('To-dos //');
        $I->click('button.btn-primary');
        $I->waitForElementVisible('.ticketModal' , 2);
        $I->click('.ticketModal');
        $I->click('#status_select_chosen'); # status
        $I->click('li.active-result:nth-child(3)');
        $I->click('.main-title-input');# title
        $I->type('Say hello');
        $I->click('.viewDescription'); #contentarea event
        $I->wait(1);
        $I->click('#ticketDescription_ifr'); #contentarea
        $I->type('Hello World');
        $I->click('.col-md-9 > div:nth-child(2) > div:nth-child(1) > input:nth-child(4)'); #save and close
        $I->seeElement('div.contentInner.status_4.ui-sortable div.ticketBox'); #check container in progress
        $I->see('Say hello'); #check
    }
    #[Group('projects')]
    #[Depends('editTestAUser')]
    public function subtaskAsignUser(AcceptanceTester $I)
    {
        $I->wantTo('create a subtask and asign a user');
        $I->amOnPage('tickets/showKanban');
        $I->click('#userDropdownMenuLink11');
        $I->click('#userStatusChange112');#change user
        $I->Wait(2);
        $imgSrc = $I->grabAttributeFrom('html body div.mainwrapper.menuopen div div.rightpanel.project div.primaryContent div.maincontent div.maincontentinner div#kanboard-all.sortableTicketList.kanbanBoard div.row-fluid div.column div.contentInner.status_4.ui-sortable div#ticket_11.ticketBox.moveable.container.priority-border-.ui-sortable-handle div#timerContainer-11.timerContainer div.dropdown.ticketDropdown.userDropdown.noBg.show.right.lastDropdown.dropRight a#userDropdownMenuLink11.dropdown-toggle.f-left span.text span#userImage11 img', 'src');
        $contains2 = str_contains($imgSrc, 'api/users?profileImage=2');
        Assert::assertTrue($contains2 ,"The string 'api/users?profileImage=2'  should be present in the src attribute value. The name should be John Doe");

        $I->click('.kanbanCardContent > h4:nth-child(1) > a:nth-child(1)'); ## click the todo on the kanban board
        $I->waitForElementVisible('.nyroModalBg', 5);
        $I->click('#subticket_new_link');
        $I->fillField('form.form-group > input:nth-child(3)' , 'something new'); #fill sub ticket
        $I->click('form.form-group > input:nth-child(4)'); #save
        $I->wait(2);
        $I->seeElement('.fixed > div:nth-child(1) > div:nth-child(1)');
        $I->wait(2);
        $I->click('#editorId_chosen > a:nth-child(1) > span:nth-child(1)');
        $I->click('#editorId_chosen > a:nth-child(1) > span:nth-child(1)'); # need to click twice on the asigned to button, but why ?
        $I->click('li.active-result:nth-child(3)'); # Select John Smith
        $I->seeElement('//span[contains(., "John Smith")]');
    }
}
