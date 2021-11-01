dev:
	- vendor/bin/sail down
	- vendor/bin/sail up -d
	- vendor/bin/sail npm run watch

up:
	- vendor/bin/sail up -d

down:
	- vendor/bin/sail down

migrate:
	- vendor/bin/sail artisan migrate
