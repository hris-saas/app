#!/bin/bash

php artisan migrate:fresh
php artisan tenancy:create-tenant tenant1
