Task
We need to create a simple CRM application with auth!

Requirements
Use Laravel 7.x
Basic Laravel Auth: ability to log in as administrator
Use database seeds to create first user with email admin@admin.com and password “password”
Implement CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
Use database migrations to create those schemas above
Store companies logos in storage/app/public folder and make them accessible from public
Use basic Laravel resource controllers with default methods – index, create, store etc.
Use Laravel’s validation function, using Request classes
Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register
Additional options (big plus):

Add API routes to view and add companies
Add authorization token to API
Add Seeding to fill the db with initial data (companies and employees)
Use Tailwind instead of Bootstrap
Rules & Hints
Pay attention to code quality, formatting, conventions etc. (Your code is your business card)
Try to optimize images :)
Send us access to your repo to check out your work!
Don't worry about the front end, just make it look 'ok' with Tailwind or Bootstrap

![2021-04-28 22_06_07-Postman](https://user-images.githubusercontent.com/75178474/116578494-c5066180-a911-11eb-9200-56736bfd3823.png)
![2021-04-28 22_05_31-Postman](https://user-images.githubusercontent.com/75178474/116578499-c59ef800-a911-11eb-8711-cb7622b6a055.png)

API TEST
