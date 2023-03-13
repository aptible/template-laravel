#!/usr/bin/env bash

if [ -z ${DB_URL+x} ]; then (exit 0); else php artisan migrate --no-interaction --verbose; fi
