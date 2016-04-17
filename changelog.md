# Change Log
All notable changes to this project will be documented to this file.
Change Log history will be recorded in descending order

## 2.0.2
** Changed Files**
- MY_Controller make sure that the BSX status is updated in the constructor and not just when render() is called

## 2.0.1
** Changed Files **
- Fix small game status bug that would always say "setup"

## 2.0
- Update website to register whenever the game state is 2 or 3

## 1.0.1
** Changed Files **
- Updated footer to stay at the bottom of the page instead of floating at the bottom of the screen

## 1.0
- Fully function way of viewing stocks and player portfolio data from a database

** Changed Files **
- Update all controllers to show an updated html title based on the page info

## 0.9.0
** Changed Files **
- Updated the look of the error page for stocks and portfolios
- Changed the default 404 page for any other invalid pages

## 0.2.9
** Changed Files **
- Modified the Portfolio and Stock views to bold the title

## 0.2.8
** Added Files **
- Added an Error view
** Changed Files **
- When looking for a player or stock it will provide an error page saying it is not found

## 0.2.7
** Changed Files **
- Changed both Stocks_Single and Portfolio_Single views to display the selection form better
- Modified main stylesheet to reflect changes made to the views

## 0.2.6
** Changed Files **
- Changed the model to get all the recent movements of the stocks 
- Changed the stock controllers index function get all the movements and gets information about the stock

## 0.2.6
** Changed Files **
- Modified the look of Single stock view to match the style of the rest of the site

## 0.2.5
** Changed Files **
- Modified the look of both Single and All portfolio views to match the style of the rest of the site

## 0.2.4
** Changed Files **
- Modified how the footer was pinned to the bottom of the page.
- Added some space at the bottom of the page so that the content isn't stuck behind the footer when the user scrolls to the bottom

## 0.2.3
** Changed Files **
- Footer is now pinned to bottom of page.

## 0.2.2
** Changed Files **
- If a user is authenticated, the portfolio link the header takes them to their page
** Added Files **
- Included a helper class that allows the currently page's link to be highlighted in the header bar

## 0.2.1
** Changed Files **
- Fixed the routing I redirected it to /portfolio/(whatever the stock or name is)
- added functions in the controller to handle it

## 0.2.0
- Update the header to change depending on whether a user is logged in or not

## 0.1.10
** Changed Files **
- Added table striped-style to Stock and Portfolio views

## 0.1.9
** Changed Files **
- Update the header styling in main.css
- Change the layout of the header in the _header.php template
- Modified the Stock(s) route to make it plural

## 0.1.8
** Changed Files **
- Added logout controller
- modified header to add logout button

## 0.1.7
** Changed Files **
- Added the beginning of major styling to the main.css stylesheet
- Moved some elements around in the template file

## 0.1.6
** Changed Files **
- Login controller redirects to a different url that works with better routing
- Portfolio controller getSpecificPortfolio takes in the name of a person as the parameter

## 0.1.5
** Added Files **
- ADDED SQL FILE MUST USE FOR WEBSITE TO WORK

## 0.1.4
** Changed Files **
- Created a link between Home page to the portfolio page of the person
- Changed the portfolio_all to link to the portfolio page of the person

## 0.1.4
** Changed Files **
- MY_Controller to pass playerlist to data to all pages.
- when clicking submit on the header it redirects to the portfolio page

## 0.1.3
** Changed Files **
- autoload, config, login to accept redirect

## 0.1.2
** Added Session variable **
-Created LoginModel, Login Controller

## 0.1.1
** Changed Files **
-Added login content to the header template view

## 0.1.0
** Changed Files **
- Added three menu buttons to header template view

## 0.0.9
** Added Files **
- Stocks Controller & Stocks View
- Get data from database to the Stocks View.
- Populated the stocks select list

## 0.0.8
** Changed Files **
- Updated _template file to include header and footer views.
- Replace remote bootstrap and jquery loading with local files
- Update MY_Controller to load in header and footer into _template file

## 0.0.7
** Changed Files **
- Updated the Portfolio_Single, Portfolio Controller to show the current holdings of the specific user.
- Changed function name in Portfolio Controller to be more specific. From getPortfolio($person) to getSpecificPortfolio($person)
- Added functionality to the index method of Portfolio Controller to pass the list of players

## 0.0.6
** Changed Files **
- Updated the Portfolio controller so that it passes data correctly to the view
- Removed page specific code from the _template to increase modularity

## 0.0.5
** Changed Files **
- Changed the Home, Portfolio, _template so you can pass variables from controller to the view

## 0.0.4
** Added Files **
- Created a base controller for parsing the template file
** Changed Files **
- Made the Home controller the new default route
- Removed unused code
- Changed name of Portfolio and Stock view to remove the word 'temp' from infront
- Updated autoload config file to load the database and parser module

## 0.0.3
** Changed Files **
- Added Home Controller
- Added Stock Model
- Loaded Stocks Database for the Homepage

## 0.0.2
** Changed Files **
- Added Controller, View for Portfolio and Stock
- Added Portfolio Model
- Added Routes for Portfolio

## 0.0.1
** Added Files **
- Added CodeIgniter Library, initial project established
- project is now ready to be started
