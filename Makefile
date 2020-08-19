DOCKER ?= docker-compose exec php-service

quality:
	$(DOCKER) ./php-cs-fixer fix --rules=@Symfony src
	$(DOCKER) vendor/bin/phpstan --memory-limit=1G analyse -c phpstan.neon src

install:
	$(DOCKER) composer install

test:
	$(DOCKER) bin/phpunit