infection:
	XDEBUG_MODE=coverage vendor/bin/infection
test:
	vendor/bin/phpunit
phpstan:
	vendor/bin/phpstan analyse --level max src tests
psalm:
	vendor/bin/psalm