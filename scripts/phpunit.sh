#!/bin/bash

php vendor/bin/phpunit -d xdebug.profiler_enable=off -d memory_limit=1G --colors=never -c phpunit.tenant.xml --testsuite=tenant
