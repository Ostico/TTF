#!/usr/bin/env bash

# set working dir
cd ${INSTALL_HOME}
chown -R ${USER_OWNER} .

## Aache/PHPConfigurations
# Configure XDebug
if [[ -n "${XDEBUG_CONFIG}" ]]; then
    pushd /tmp
    wget http://xdebug.org/files/xdebug-2.5.0.tgz
    tar -xvzf xdebug-2.5.0.tgz
    cd xdebug-2.5.0
    phpize
    ./configure
    make
    cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20151012

    XDEBUG='zend_extension='$(find /usr/local/lib/php/ -name xdebug.so)'
    xdebug.remote_enable=1
    xdebug.remote_autostart=1
    xdebug.remote_host="'${XDEBUG_CONFIG}'"
    xdebug.remote_port=9000
    xdebug.idekey="PHPSTORM"'

    printf "${XDEBUG}\n\n"
    printf "${XDEBUG}\n" > /usr/local/etc/php/php.ini

    popd
fi
## Install dependencies
composer install
composer development-enable

## Apache/PHP Configurations

echo "Starting Apache..."
/etc/init.d/apache2 restart
echo "Apache Started"

while true; do
#    echo date " => Waiting for an infinite loop. More or less..."
    sleep 5
done
