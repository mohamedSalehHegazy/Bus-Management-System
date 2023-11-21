# Bus Management System 
## Installation
### Step 1: Clone the repository
```bash
$ git clone https://github.com/mohamedSalehHegazy/Bus-Management-System.git
```
### Step 2: Install dependencies
```bash
$ composer install
```
### Step 2: Config Project
- Create .env file 
```bash
$ cp .env.example .env
```
- Generate JWT secret key
```bash
$ php artisan jwt:secret
```
- Migrate database tables and seeders to fill tables with necessary data
```bash
$ php artisan migrate --seed
```
- Run Project
```bash
$ php artisan serve
```
- Import postman collection located at `/docs/PostmanCollection` folder

## Important Notes
- When Passenger `(User)` create a reservation for one seat or more , `Trip->available_seats` will be decreased using `UpdateTripAvailableSeatsWhenReservationCreatedListener` .
- If `Trip->available_seats` is equal to `0` it will not be shown in `passenger/trips` list API.
- Attached database `Relational Schema` located at `/docs/DatabaseDesign` folder.
- Every `API` in a postman collection have multi response examples for all possible cases.
- You Must create postman variable `url` => `http://127.0.0.1:8000/api/` port 8000 is a default you can change it.
- You Must create postman variable `token` it will be updated automatically after a Success Login.
- After Seeding data we have a test User `email => passenger@test.com` and `password => 12345678` you must login first to use other API's.