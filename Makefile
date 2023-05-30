# Base
VERSION=1.0.0
PROJECT_NAME=askpd
GIT_BRANCH_PROD=master
GIT_BRANCH_DEV=dev

# Colors
RED=\033[0;31m
GREEN=\033[0;32m
ORANGE=\033[0;33m
BLUE=\033[0;34m
RED_B=\033[1;31m
GREEN_B=\033[1;32m
ORANGE_B=\033[1;33m
BLUE_B=\033[1;34m
RED_UL=\033[4;31m
GREEN_UL=\033[4;32m
ORANGE_UL=\033[4;33m
BLUE_UL=\033[4;34m
NC=\033[0m

# Content
LINE=------------------------------------------------------

help:
	@echo "$(LINE)"
	@echo "$(ORANGE_UL)Application name: $(PROJECT_NAME)"
	@echo "$(GREEN_B)Makefile version: $(VERSION)"
	@echo "$(NC)"
	@echo "$(BLUE_B)Production git branch:$(NC)  $(BLUE_UL)$(GIT_BRANCH_PROD)$(NC)"
	@echo "$(BLUE_B)Development git branch:$(NC) $(BLUE_UL)$(GIT_BRANCH_DEV)$(NC)"
	@echo "$(NC)$(LINE)"
	@echo "$(ORANGE_UL)$(GREEN_B)Makefile commands:$(NC)"
	@echo "$(GREEN_B)env$(NC)...............$(ORANGE)Create ENV files$(NC)"
	@echo "$(GREEN_B)network$(NC)...........$(ORANGE)Create docker network$(NC)"
	@echo "$(GREEN_B)build$(NC).............$(ORANGE)Build docker containers by docker-compose$(NC)"
	@echo "$(GREEN_B)build-no-cache$(NC)....$(ORANGE)Build docker containers by docker-compose (without cache)$(NC)"
	@echo "$(GREEN_B)up$(NC)................$(ORANGE)Up docker containers$(NC)"
	@echo "$(GREEN_B)stop$(NC)..............$(ORANGE)Stop docker containers$(NC)"
	@echo "$(GREEN_B)restart$(NC)...........$(ORANGE)Restart docker containers$(NC)"
	@echo "$(GREEN_B)php$(NC)...............$(ORANGE)Show terminal of PHP container$(NC)"
	@echo "$(GREEN_B)deploy-backend$(NC)....$(ORANGE)Deploy backend$(NC)"
	@echo "$(GREEN_B)deploy-frontend$(NC)...$(ORANGE)Deploy frontend(NC)"
	@echo "$(GREEN_B)dev$(NC)...............$(ORANGE)Run dev mode$(NC)"
	@echo "$(GREEN_B)init$(NC)..............$(ORANGE)Init (install) application$(NC)"
	@echo "$(GREEN_B)deploy$(NC)............$(ORANGE)Deploy application on production server$(NC)"

env:
	@cp .env.example .env

network:
	@docker network create $(PROJECT_NAME)-network

build:
	@docker-compose build

build-no-cache:
	@docker-compose build --no-cache

up:
	@docker-compose up -d

stop:
	@docker-compose stop

restart:
	make stop
	make up

php:
	@docker exec -it "$(PROJECT_NAME)-php" bash

deploy-backend:
	@docker exec -it "$(PROJECT_NAME)-php" composer install
	@docker exec -it "$(PROJECT_NAME)-php" composer dump-autoload
	@docker exec -it "$(PROJECT_NAME)-php" php artisan route:clear
	@docker exec -it "$(PROJECT_NAME)-php" php artisan view:clear
	@docker exec -it "$(PROJECT_NAME)-php" php artisan route:cache
	@docker exec -it "$(PROJECT_NAME)-php" php artisan view:cache
	@docker exec -it "$(PROJECT_NAME)-php" php artisan migrate

deploy-frontend:
	@npm install
	@npm run build

dev:
	@docker exec -it "$(PROJECT_NAME)-php" composer install
	@docker exec -it "$(PROJECT_NAME)-php" composer dump-autoload
	@docker exec -it "$(PROJECT_NAME)-php" php artisan route:clear
	@docker exec -it "$(PROJECT_NAME)-php" php artisan view:clear
	@npm run dev

init:
	make build
	make up
	make deploy-frontend
	make deploy-backend
	@docker exec -it "$(PROJECT_NAME)-php" php artisan key:generate

deploy:
	@git checkout $(GIT_BRANCH_PROD)
	@git pull
	make deploy-backend
	make deploy-frontend
	make restart

