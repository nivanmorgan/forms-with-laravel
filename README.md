#### Creative Market - Full Stack Engineer Technical Assessment

## Seller Application Form

### Background

I simply created  vue components with a multistep form on the front end, a controller to save sellers and their profiles on the backend. I only have 2 models (tables) : sellers with sellers with unique values and info and profiles with related info. Considering the data stored was not going to make for unique profiles I chose first, last, portfolio link and has store answers as a group as a unique identifiers and created a index in the database table. 

I most tables I didn't allow for null fields, except for store urls. I chose datatypes based on the form fields so they varied. I wanted to showcase the different datatypes that can be used so I used text, string, boolen, array, int and so on.

Form submission and validation are both on front end and backend. I didn't get backend perfected was working a lot on frontend. 

The project was setup on laravel 7 repo, to install 
1- download the repo
2- run commands to install composer &  npm
3- change env file, migrate db tables, config cache
4- compile assets with npm run dev
5- no seeders, auth , or factories created. 


