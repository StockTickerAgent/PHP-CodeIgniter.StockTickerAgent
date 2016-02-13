# Change Log
All notable changes to this project will be documented to this file.
Change Log history will be recorded in descending order

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
