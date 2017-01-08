FROM php:7.0-apache

ENV USER_OWNER "www-data"
ENV INSTALL_HOME "/var/www"

RUN apt-get update
RUN apt-get install -y zip vim locate iputils-ping curl wget net-tools psmisc screen dstat traceroute whois
RUN curl -sS https://getcomposer.org/installer \
      | php -- --install-dir=/usr/local/bin --filename=composer \
     && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf \
     && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
     && a2enmod rewrite

# Apache
RUN userdel www-data
RUN groupadd www-data
RUN useradd -ms /bin/bash -g www-data www-data

COPY run.sh /tmp/run.sh
RUN chmod +x /tmp/run.sh

WORKDIR "/var/www"
CMD ["/tmp/run.sh"]
