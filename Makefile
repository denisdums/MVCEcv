SELF_DIR := $(dir $(lastword $(MAKEFILE_LIST)))
include $(SELF_DIR)/docker/Makefile.mk
include $(SELF_DIR)/.env

DC=docker-compose -p $(APP_TD) -f docker/build/docker-compose.yml --env-file .env
