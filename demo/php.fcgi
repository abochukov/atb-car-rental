#!/bin/bash
DEFAULTPHPINI=/home/bgprvhqk/public_html/apps/sting/sting/php56-fcgi.ini
exec /usr/local/php5.6/bin/php-cgi -c ${DEFAULTPHPINI}
