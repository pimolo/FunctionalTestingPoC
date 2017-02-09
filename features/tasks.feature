Feature: As a standard user
  I should be able to manage my tasks

  Scenario: I list tasks
    Given I am on "?action=list"
    Then I should see "Faire les courses"

  Scenario: I add a task
    Given I am on "?action=list"
    When I follow "Ajouter une tâche"
    Then I should be on "?action=add"
    And I fill in "task" with "foo"
    And I press "Valider"
    Then I should see "foo"

  Scenario: I delete a task
    Given I am on "?action=list"
    Then I should see "foo"
    When I follow "Remove"
    Then I should not see "foo"
