#!/usr/bin/bash



if [ $# -eq 0 ]; then
    echo "Usage: $0 <archive_name>"
    exit 1
fi

archive_name="$1"

tar -xvzf "$archive_name.tar.gz"

chown -R builtfront:builtfront ../public_html
/usr/bin/php8.2 application/artisan view:clear
/usr/bin/php8.2 application/artisan cache:clear
/usr/bin/php8.2 application/artisan config:clear
