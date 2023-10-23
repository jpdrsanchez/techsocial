build: ## Build our development environment
	if ! [ -f .env ];then cp .env.example .env;fi
	composer install
	./vendor/bin/sail up -d
	./vendor/bin/sail yarn
	./vendor/bin/sail yarn build
	./vendor/bin/sail artisan migrate:refresh --seed
