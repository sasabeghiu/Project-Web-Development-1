# Web Development 1 Project - UNIT240

## URL: [UNIT240](https://646415.000webhostapp.com)
### Localhost: http://localhost/home
(Database query is included in the project and runs on first docker-compose up)

## URL Endpoint: [API](https://646415.000webhostapp.com/api/resident)
### Local Endpoint: http://localhost/api/resident

### Login Details:
```
User with role User:
- Username = user
- Password = user

User with role Admin:
- Username = admin
- Password = admin

You can either use the provided test account or create your own account.
You can not create an account with the role admin, only user.

NOTE: Email does not actually have to exist.
```

#### Project proposal
```
The subject of my application will be a music event company that is organizing Techno events. 
I want to create a website for this company that will help both the customers and the company. 
For customers it will be possible to browse through events, residents, merchandise 
and possibly photo albums from previous events, as well as adding items to shopping cart and placing an order. 
For the company itself, it will be possible to add, update or delete an event, resident, or merchandise, 
as well as view all the orders from customers in the CMS.
```

#### To improve
```
1. Ask for login when placing an order instead of beggining.
2. Change quantity and totalprice when adding to shopping cart/placing an order.
!3. Decrease quantity from products table when placing an order.
4. Add an if-else statement in dbconfig to use the credentials depending on localhost/hosted
5. Display order_items inside an order (list of order items in order class?)
```
