## BIZLISTR
> A classic business listing application built with PHP/Laravel, MySQL & Vue

### Setup
- Clone the repository
- Copy contents of `.env.example` to `.env` and set up the database credentials
- Run `composer install` to install dependencies
- You may use the sql dump that is in the root of this project for easy setup
- Generate app key: `php artisan key:generate`
- Run `php artisan storage:link` for uploaded images
- Serve the app using: `php artisan serve`

### Test Login
- [Click here to login](http://localhost:8000/login)
- Email: admin@bizlistr.com
- Password: initsng

### Reports a platform owner should see
- Total categories
- Total listings
- Total reviews
- Total signed up users

### Additional features to make app more relevant
- Showing listings by categories
- Maps to show the accurate location of the a single business listing
- Internal messaging system between users and admin (as a means of contact to ask more details about a listing)
- Favorite/Like a listing
