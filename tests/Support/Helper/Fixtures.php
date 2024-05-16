<?php

declare(strict_types=1);

namespace Tests\Support\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use DateTime;
use Leantime\Domain\Widgets\Hxcontrollers\Welcome;
use Tests\Support\AcceptanceTester;

class Fixtures extends \Codeception\Module
{
    # All Fixtures in correct loading order
    public function callAllFixtures(AcceptanceTester $I){
        $this->upLoadClients($I);
        $this->upLoadUsers($I);
        $this->uploadUserProjectRelations($I);
        $this->upLoadProjects($I);
        $this->uploadTickets($I);
        $this->upLoadCanvas($I);
        $this->uploadCanvasItems($I);
        $this->uploadTimesheet($I);
    }

    public function upLoadUsers( AcceptanceTester $I)
    {
        $users = [
            ['username' => 'user1@example.com', 'password' => 'pass1', 'firstname' => 'John', 'lastname' => 'Doe', 'role' => 50, 'phone' => rand(10000000, 99999999), 'clientId' => 2,],
            ['username' => 'user2@example.com', 'password' => 'pass2', 'firstname' => 'Jane', 'lastname' => 'Doe', 'role' => 50, 'phone' => rand(10000000, 99999999), 'clientId' => 3,],
            ['username' => 'user3@example.com', 'password' => 'pass3', 'firstname' => 'Bob', 'lastname' => 'Smith', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user4@example.com', 'password' => 'pass4', 'firstname' => 'Alice', 'lastname' => 'Johnson', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user5@example.com', 'password' => 'pass5', 'firstname' => 'Charlie', 'lastname' => 'Brown', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user6@example.com', 'password' => 'pass6', 'firstname' => 'Emily', 'lastname' => 'Davis', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user7@example.com', 'password' => 'pass7', 'firstname' => 'Frank', 'lastname' => 'Miller', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user8@example.com', 'password' => 'pass8', 'firstname' => 'Grace', 'lastname' => 'Wilson', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user9@example.com', 'password' => 'pass9', 'firstname' => 'Harry', 'lastname' => 'Moore', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user10@example.com', 'password' => 'pass10', 'firstname' => 'Ivy', 'lastname' => 'Taylor', 'role' => 50, 'phone' => rand(10000000, 99999999)]
        ];



        foreach ($users as $user) {
            $I->haveInDatabase('zp_user', $user);
        }
    }

    public function upLoadClients( AcceptanceTester $I)
    {
        $firms = [
            ['name' => 'Quantum Quirks'],
            ['name' => 'Nebula Networks'],
            ['name' => 'Galactic Grids'],
            ['name' => 'Cosmic Coders'],
            ['name' => 'Stellar Systems'],
            ['name' => 'Astro Architects'],
            ['name' => 'Pulsar Programmers'],
            ['name' => 'Orbit Optimizers'],
            ['name' => 'Meteor Makers'],
            ['name' => 'Comet Creators']
        ];




        foreach ($firms as $firm) {
            $I->haveInDatabase('zp_clients', $firm);
        }
    }
    // Load Fixtures
    public function upLoadProjects(AcceptanceTester $I)
    {
        $projects = [
            ['name' => 'Innovative Solutions', 'clientId' => 2, 'details' => 'A deep dive into the world of cutting-edge ideas and groundbreaking solutions.', 'hourBudget' => 0],
            ['name' => 'The Power of Creativity', 'clientId' => 3, 'details' => 'An exploration of how creativity can reshape the world and drive progress.', 'hourBudget' => 0],
            ['name' => 'Exploring the Future', 'clientId' => 4, 'details' => 'A forward-looking perspective on the trends and technologies that will shape our future.', 'hourBudget' => 0],
            ['name' => 'Embracing Change', 'clientId' => 5, 'details' => 'A guide to understanding and navigating the rapid changes happening in our world.', 'hourBudget' => 0],
            ['name' => 'The Journey of Discovery', 'clientId' => 6, 'details' => 'An exciting journey through new ideas, discoveries, and breakthroughs.', 'hourBudget' => 0],
            ['name' => 'Unleashing Potential', 'clientId' => 7, 'details' => 'A look at how we can unlock our potential and achieve great things.', 'hourBudget' => 0],
            ['name' => 'The Art of Possibility', 'clientId' => 8, 'details' => 'An inspiring exploration of the possibilities that lie ahead of us.', 'hourBudget' => 0],
            ['name' => 'Navigating Progress', 'clientId' => 9, 'details' => 'A roadmap for navigating the path of progress and innovation.', 'hourBudget' => 0],
            ['name' => 'The Pulse of Transformation', 'clientId' => 10, 'details' => 'A pulse on the transformative changes reshaping our world.', 'hourBudget' => 0],
            ['name' => 'Catalyst for Success', 'clientId' => 11, 'details' => '<p> A catalyst for sparking success and achieving our goals. </p>', 'hourBudget' => 0]
        ];

        foreach ($projects as $project) {
            $I->haveInDatabase('zp_projects', $project);
        }
    }

    public function uploadUserProjectRelations(AcceptanceTester $I)
    {
        $relations = [
            ['userId' => 1, 'projectId' => 12],
            ['userId' => 2, 'projectId' => 3],
            ['userId' => 3, 'projectId' => 4],
            ['userId' => 4, 'projectId' => 5],
            ['userId' => 5, 'projectId' => 6],
            ['userId' => 6, 'projectId' => 7],
            ['userId' => 7, 'projectId' => 8],
            ['userId' => 8, 'projectId' => 9],
            ['userId' => 9, 'projectId' => 10],
            ['userId' => 10, 'projectId' => 11],
            ['userId' => 11, 'projectId' => 12, 'wage' => 100, 'projectRole' => 'test dummy'],

        ];

        foreach ($relations as $relation) {
            $I->haveInDatabase('zp_relationuserproject', $relation);
        }
    }

    public function upLoadCanvas(AcceptanceTester $I)
    {

        $now = date("Y/m/d/h/m/s");
        $goals = [
            ['author' => 11, 'projectId' => 12, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Improve Physical Health' ],
            ['author' => 11, 'projectId' => 12, 'title' => 'Lean Canvas', 'type' => 'leancanvas', 'created' => $now, 'description' => 'Improve lean Physical Health' ],
            ['author' => 11, 'projectId' => 12, 'title' => 'Default', 'type' => 'wiki', 'created' => $now, 'description' => 'Health wiki' ],
            ['author' => 11, 'projectId' => 12, 'title' => 'Board', 'type' => 'idea', 'created' => $now, 'description' => 'Health idea' ],
            ['author' => 11, 'projectId' => 12, 'title' => 'Board', 'type' => 'valuecanvas', 'created' => $now, 'description' => 'Health value' ],

            ['author' => 10, 'projectId' => 11, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Learn a New Language' ],
            ['author' => 9, 'projectId' => 10, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Advance Career' ],
            ['author' => 8, 'projectId' => 9, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Read More Books' ],
            ['author' => 7, 'projectId' => 8, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Reduce Screen Time' ],
            ['author' => 6, 'projectId' => 7, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Travel to a New Country' ],
            ['author' => 5, 'projectId' => 6, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Volunteer Regularly' ],
            ['author' => 4, 'projectId' => 5, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Improve Physical Health' ],
            ['author' => 3, 'projectId' => 4, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Learn a New Skill' ],
            ['author' => 2, 'projectId' => 3, 'title' => 'Board', 'type' => 'goalcanvas', 'created' => $now, 'description' => 'Improve Physical Health' ],

        ];

        foreach ($goals as $goal) {
            $I->haveInDatabase('zp_canvas', $goal);
        }
    }

    public function uploadCanvasItems(AcceptanceTester $I)
    {

        $now = date("Y/m/d/h/m/s");
        $goals = [
            ['author' => 11,  'assignedTo' => 11, 'canvasId' => 2, 'description' => 'myAwesomeGoal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something awesome', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10, 'milestoneId' => 10, ],
            ['author' => 11,   'canvasId' => 16, 'data' => '<p>My awesome Idea</p>', 'box' => 'idea', 'created' => $now, 'modified' => $now, 'status' => 'idea', 'title' => 'do something idea', 'startDate' => $now, 'endDate' => $now, ],

            ['author' => 10, 'assignedTo' => 10, 'canvasId' => 3, 'description' => 'My first Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 3', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 9, 'assignedTo' => 9, 'canvasId' => 4, 'description' => 'My second Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 4', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 8, 'assignedTo' => 8, 'canvasId' => 5, 'description' => 'My third Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 5', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 7, 'assignedTo' => 7, 'canvasId' => 6, 'description' => 'My fourth Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 6', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 6, 'assignedTo' => 6, 'canvasId' => 7, 'description' => 'My fifth Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 7', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 5, 'assignedTo' => 5, 'canvasId' => 8, 'description' => 'My sixth Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 8', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 4, 'assignedTo' => 4, 'canvasId' => 9, 'description' => 'My seventh Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 9', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 3, 'assignedTo' => 3, 'canvasId' => 10, 'description' => 'My eight Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 10', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],
            ['author' => 2, 'assignedTo' => 2, 'canvasId' => 11, 'description' => 'My ninth Goal', 'box' => 'goal', 'created' => $now, 'modified' => $now, 'status' => 'status_ontrack', 'title' => 'do something 11', 'startDate' => $now, 'endDate' => $now, 'metricType' => 'number', 'startValue' => 1, 'currentValue' => 1, 'endValue' => 10 ],

        ];

        foreach ($goals as $goal) {
            $I->haveInDatabase('zp_canvas_items', $goal);
        }
    }

    public function uploadTickets(AcceptanceTester $I)
    {
        $now = date("Y/m/d/h/m/s");
        $tickets = [
            // milestones
            ['type' => 'milestone', 'projectId' => 12, 'userId' => 11, 'status' => 3,  'tags' => '#821219',
                'headline' => 'Fitness', 'description' => 'run a marathon',
                'date' => $now, 'dateToFinish' => $now, ],
            // Story
            ['type' => 'Story', 'projectId' => 12, 'userId' => 11, 'status' => 3,  'tags' => 0,
                'headline' => 'Getting started with improving Physical Health', 'description' => '<h2>Story time !</h2>',
                'date' => $now, 'dateToFinish' => $now, ],
            // Tasks
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 1,  'tags' => 0,
                'headline' => 'Create a ticket', 'description' => 'right now',
                'date' => $now, 'dateToFinish' => $now, ],

            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => 'Block a ticket', 'description' => 'Ban me',
                'date' => $now, 'dateToFinish' => $now, ],

            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "Unlocking Creativity: How AI Title Generators Revolutionize Content Creation",
                'description' => "Discover how AI-powered title generators can transform your content strategy, providing fresh ideas and unique headlines.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "Mastering SEO: Leverage AI-Generated Titles for Optimal Search Visibility",
                'description' => "Learn how AI-generated titles enhance your SEO efforts, driving organic traffic and improving your content's reach.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "Breaking the Mold: How AI Title Generators Disrupt Traditional Blogging",
                'description' => "Explore how AI technology challenges conventional approaches to headline writing, sparking creativity and engagement.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "Crafting Irresistible Blog Post Titles: Unleashing the Power of AI",
                'description' => "Dive into the game-changing impact of AI title generators on the content creation industry.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "10 Mind-Blowing Headlines Created by the AI Title Generator",
                'description' => "Get inspired by a list of attention-grabbing headlines generated by AI, perfect for your next blog post.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "The Future of Headline Writing: Meet the AI Title Generator",
                'description' => "Discover how AI-driven tools shape the future of captivating headlines and storytelling.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "Writing Eye-Catching Headlines: 5 Secrets Unveiled by AI",
                'description' => "Uncover the hidden techniques behind crafting headlines that keep readers hooked.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 4,
                'headline' => "AI Title Generator: Your Content Marketing Ally",
                'description' => "Explore the potential of AI-generated titles in enhancing your overall content strategy.",
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 2,
                'headline' => 'Waiting', 'description' => 'zZzzZ',
                'date' => $now, 'dateToFinish' => $now, ],
            ['type' => 'Task', 'projectId' => 12, 'userId' => 11, 'status' => 0,
                'headline' => 'Done', 'description' => 'Done',
                'date' => $now, 'dateToFinish' => $now, 'milestoneid' => 10],
        ];

        foreach ($tickets as $ticket) {
            $I->haveInDatabase('zp_tickets', $ticket);
        }
    }

    public function uploadTimesheet(AcceptanceTester $I)
    {
        date_default_timezone_set('Europe/Copenhagen');


        $day = date('N');

        $timesheetdata = function ($mon , $tue, $wed, $thu, $fri) {
            return [
                ['ticketId' => 19,
                    'userId' => 1,
                    'hours' => 3,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($mon . 'days')),
                    ],
                ['ticketId' => 16,
                    'userId' => 1,
                    'hours' => 2,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($mon . 'days')),
                ],
                ['ticketId' => 19,
                    'userId' => 1,
                    'hours' => 3,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($tue . 'days')),
                ],
                ['ticketId' => 16,
                    'userId' => 1,
                    'hours' => 4,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($tue . 'days')),
                ],
                ['ticketId' => 19,
                    'userId' => 1,
                    'hours' => 3,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($wed . 'days')),
                ],
                ['ticketId' => 16,
                    'userId' => 1,
                    'hours' => 1,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($wed . 'days')),
                ],
                ['ticketId' => 19,
                    'userId' => 1,
                    'hours' => 3,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($thu . 'days')),
                ],
                ['ticketId' => 16,
                    'userId' => 1,
                    'hours' => 2.5,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($thu . 'days')),
                ],
                ['ticketId' => 19,
                    'userId' => 1,
                    'hours' => 3,
                    'kind' => 'GENERAL_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($fri . 'days')),
                ],
                ['ticketId' => 16,
                    'userId' => 1,
                    'hours' => 0.17,
                    'kind' => 'GENERAL_NOT_BILLABLE',
                    'workDate' => date("Y/m/d/h/m/s", strtotime($fri . 'days')),
                ],
            ];
        };



        switch ($day) {
            case '1':
                echo "It's Monday!";
                  $timesheets = $timesheetdata('0','1','2', '3','4') ;
                break;
            case '2':
                echo "It's Tuesday!";
                $timesheets = $timesheetdata('-1','0','1', '2','3') ;
                break;
            case '3':
                echo "It's Wednesday!";
                $timesheets = $timesheetdata('-2','-1','0', '1','2') ;
                break;
            case '4':
                echo "It's Thursday!";
                $timesheets = $timesheetdata('-3','-2','-1', '0','1') ;
                break;
            case '5':
                echo "It's Friday!";
                $timesheets = $timesheetdata('-4','-3','-2', '-1','0') ;
                break;
            case '6':
                echo "It's Saturday!";
                $timesheets = $timesheetdata('-5','-4','-3', '-2','-1') ;
                break;
            case '7':
                echo "It's Sunday!";
                $timesheets = $timesheetdata('-6','-5','-4', '-3','-2') ;
                break;
            default:
                break;
        }



            foreach ($timesheets as $timesheet) {
                $I->haveInDatabase('zp_timesheets', $timesheet);
            }
        }
        }










