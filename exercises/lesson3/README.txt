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

3.) When saving the game there should be two json files that end up being saved. One will be players.json and it will
hold a reference to the file names of the games. The other will <player_name>.json. So the players.json would look like:

{"players":[{"player":"Eric Barnes","filename":"eric_barnes.json"},{"player":"Chad Peppers","filename":"chad_peppers.json"}]}

The players.json should not create a new file if it exists but instead load the existing file, json_decode it and then
add the new player information in there. The file name should lowercase the players name and replace spaces with
an underscore. Look at the strtolower() and str_replace() function to do this.

The <player_name>.json will store all the information about the player.

3.) When clicking 2 to continue the adventure you should load up the players.json file into a list that will allow
the player to select which game to continue. From there it will load up the correct player json file and save it
into the $_SESSION variable similar to how we did with the bank progrm.

4) During the character creation allow the player to add 10 additional attributes to the main attributes (str, wis).
If they type str then it will take str+1 and then remove 1 from the points. So it would look something like this:

Choose which attribute to add a point to (10 remaining):

Strength: 10
Wisdom: 10
Intelligence: 10
etc etc

When a player types Strength then it will display the menu again:

Choose which attribute to add a point to (9 remaining):

Strength: 11
Wisdom: 10
Intelligence: 10
etc etc

Choose which attribute to add a point to (8 remaining):

Strength: 12
Wisdom: 10
Intelligence: 10
etc etc

And so forth. These should be stored to the global player stats as well. When all 8 are finished it then the player
will begin the game

5.) After player creation we will present the player with things they can do in the game:

1.) Look for something to fight
2.) Visit the General Store
3.) View Stats & Inventory
4.) Save & Quit

5.) When choosing view stats and inventory lets display a pretty menu that will display the stats of the player.
Alter the global player object to include an array of inventory that will show inventory items. Also make an array of
equipment that will show the items a plyayer is equipped with (Weapon, Body). Also make another array for Skills that
the player will end up acquiring during the game. The array should end up looking like:

[
    'Stats' => ['str' => 10, 'dex' => 10, 'con' => 10, 'int' => 10, 'wis' => 10],
    'name' => 'Eric Barnes',
    'class' => 'Warrior'
    'Inventory' => [],
    'Equipped' => ['Weapon' => '', 'Body' => ''],
    'Skills' => []
]

6.) Save and quit should save all the information to the json files
