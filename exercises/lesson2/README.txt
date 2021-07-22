Bank Teller Program

You are a developer for the local bank and have been tasked with creating a command line PHP program to handle banking functions.

Create the following:

- When the program runs it should display a intro message as follows:
"Welcome to the Super Bank Program. Please log in to continue.
Login:"
Hint: An example on how to ask and get command line is in the index.php folder.

The passwords are located in the bank_accounts.json file. You will need to open the program (file_get_contents()) and then
use json_decode() to decode the json to an array. There you will have a list of all the accounts in an array with username,
password, and bank account.

- After the user logs in show a balance of 100 and then prompt him to pick a either:
1.) Withdraw
2.) Deposit
3.) Check Balance
4.) Change Password
5.) Log out

If the user does not choose a valid command it should tell them that their command did not work and ask again. Hint: Use a do loop to accomplish this.
- For answer 1 ask the user how much money they wish to withdrawal. They cannot withdraw more than the money they have in the bank. When they withdraw it should subtract that from a variable that is holding that value in real time. After they withdraw it should tell them what action they did and bring them back to the main screen where you can see their balance again.
  Hint: For this you could use a global variable of some sort? This should update the json file with the new balance.
- Deposit should do what you would expect a deposit to do. Asking for how much to deposit and increment. Should echo back what they did and back to the main screen where you can see the balance.
- The check balance should just echo their balance and send them back to the main menu. This should update the json file with the new balance.
- The change password should prompt the user for a new password and then save the json file.
- Logging out will ask them if they are sure they want to log out and then tell them goodbye to exit the program.

Other considerations:

- Use functions when possible. You shouldn't have a big long program of only logic. In the functions.php file there is
a list of functions stubbed out.

Tasks:
- When the program runs open the json file and set it as a global array so you can access it anywhere.
- Create the main into program that presents a login (do-while)
- Create a log in function that figures out a username and password (do-while)
- Create a menu function that accepts a menu item as an option and then executes a function by chosen (think switch here)
- Withdraw function
- Deposit function
- Check balance function
- Create a change password function.
- Log out function.