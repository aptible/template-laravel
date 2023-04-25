#!/usr/bin/env bash

if [ -z ${DATABASE_URL+x} ]; then (exit 0); else php artisan migrate --force --verbose; fi
