Legend of the Blue Dragon

We are going to create a game in PHP that is entirely text based adventure. Here are the requirements:

1.)  Create a welcome message that uses some sweet ascii art from here: https://www.asciiart.eu/mythology/dragons
2.) Menu should have:
       1). Create new adventure
       2.) Continue adventure
       3.) Quit
When choosing 1 there should be a function that will create a new hero and save to a json file. It will ask the player
for a name and option of a class (Wizard, Warrior, Thief). The function should create a new array with the name, class,
and then base stats. The array would end up looking like:
['Stats' => ['str' => 10, 'dex' => 10, 'con' => 10, 'int' => 10, 'wis' => 10], ['name' => '', 'class' => '']]
