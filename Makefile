ifneq (,$(wildcard ./.env))
    include .env
    export
endif

DOCKER_COMPOSE := docker-compose
DOCKER_COMPOSE_EXEC := $(DOCKER_COMPOSE) exec
WORKSPACE := workspace
DOCKER_COMPOSE_EXEC_BACKEND =  $(DOCKER_COMPOSE_EXEC) $(WORKSPACE) 
COMPOSER := composer 
COMPOSER_RUN_SCRIPT := composer run-script

.PHONY: all

all: env init  migrate seed clear-cache

init: up timeout composer-install

env:
	cp .env.example .env; 
	
ps:
	$(DOCKER_COMPOSE) ps

up:
	$(DOCKER_COMPOSE) up -d

stop:
	$(DOCKER_COMPOSE) stop 

down: 
	$(DOCKER_COMPOSE) down 

clean:
	$(DOCKER_COMPOSE) down -v

delete:
	$(DOCKER_COMPOSE) down -v --rmi all

ssh:
	$(DOCKER_COMPOSE_EXEC) $(WORKSPACE) bash 

composer-install:
	$(DOCKER_COMPOSE_EXEC_BACKEND) composer install

timeout:
	sleep 5

bet:
	$(DOCKER_COMPOSE_EXEC_BACKEND) php artisan slot:run

# phpstan:
# 	$(DOCKER_COMPOSE_EXEC_BACKEND) $(COMPOSER_RUN_SCRIPT) php-stan

# csfixer:
# 	$(DOCKER_COMPOSE_EXEC_BACKEND) $(COMPOSER_RUN_SCRIPT) cs-fixer

