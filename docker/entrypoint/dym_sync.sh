#!/usr/bin/env bash

# redirect stdout and stderr to files
##
# Ensure /.composer exists and is writable
#
if [ ! -d /.composer ]; then
    mkdir /.composer
fi

chmod -R ugo+rw /.composer

##
# Run a command or start supervisord
#
if [ $# -gt 0 ];then
    # If we passed a command, run it
    echo "If we passed a command, run it"
    exec "$@"
else
    echo "Otherwise start cron + supervisord"
    parallel ::: \
        "crontab -l" \
        "supervisord --nodaemon" \
        "cd /var/www && chown -R www-data:www-data storage/"
#        "cd /var/www && php artisan redis:set-active-groups --all"
fi
