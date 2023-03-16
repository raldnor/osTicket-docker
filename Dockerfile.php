FROM php:fpm

RUN apt-get update && \
	apt-get install -y git && \
	apt-get install -y libc-client-dev libkrb5-dev && \
	apt-get install -y zlib1g-dev libpng-dev libjpeg-dev && \
	apt-get install -y libicu-dev g++ && \
	rm -r /var/lib/apt/lists/* 

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install pdo pdo_mysql && \
	docker-php-ext-install mysqli mysqli && \
	docker-php-ext-configure gd --with-jpeg=/usr/include && \
	docker-php-ext-install gd && \
	docker-php-ext-configure imap --with-kerberos --with-imap-ssl && \
	docker-php-ext-install imap && \
	docker-php-ext-configure intl && \
	docker-php-ext-install intl && \
	docker-php-ext-install opcache && \
	pecl install apcu && \
	docker-php-ext-enable apcu && \
	pecl clear-cache

RUN   apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/* && docker-php-ext-configure imap --with-kerberos --with-imap-ssl && docker-php-ext-install imap
