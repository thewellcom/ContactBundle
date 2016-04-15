@contact
Feature:
    Test contact form

    @javascript
    Scenario: Test contact form with right values
        Given I am on contact page
        When I fill the contact form
        And I submit
        Then I should see the success message

    @javascript
    Scenario: Test contact form with wrong value
        Given I am on contact page
        When I fill the contact form with wrong value
        And I submit
        Then I should see error messages
