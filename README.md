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
- Migrate database table and seeders to fill tables with necessary data
```bash
$ php artisan migrate --seed
```
- Import postman collection located at `/docs/PostmanCollection` folder

## Important Notes
- When Passenger `(User)` create a reservation for one seat or more , `Trip->available_seats` will be decreased using `UpdateTripAvailableSeatsWhenReservationCreatedListener` 
- If `Trip->available_seats` is 0 it will not show on `trips` list API