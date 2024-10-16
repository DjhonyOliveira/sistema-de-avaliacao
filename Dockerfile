FROM ubuntu:22.04

ENV timezone=America/Sao_Paulo

RUN apt-get update && \
    ln -snf /usr/share/zoneinfo/${timezone} /etc/localtime && echo ${timezone} > /etc/timezone && \
    apt-get install -y apache2 git curl postgresql php8.1 php8.1-cli php8.1-xdebug php8.1-pgsql libapache2-mod-php8.1 openssl && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    rm composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && chmod a+x /usr/local/bin/composer && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN echo "zend_extension=$(find /usr/lib/php/ -name xdebug.so)" > /etc/php/8.1/apache2/conf.d/20-xdebug.ini && \
    echo "xdebug.mode=debug" >> /etc/php/8.1/apache2/conf.d/20-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /etc/php/8.1/apache2/conf.d/20-xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /etc/php/8.1/apache2/conf.d/20-xdebug.ini && \
    echo "xdebug.client_port=9003" >> /etc/php/8.1/apache2/conf.d/20-xdebug.ini && \
    echo "xdebug.log=/var/log/xdebug.log" >> /etc/php/8.1/apache2/conf.d/20-xdebug.ini

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/selfsigned.key -out /etc/ssl/certs/selfsigned.crt -subj "/C=BR/ST=SaoPaulo/L=SaoPaulo/O=MyCompany/CN=localhost"

RUN a2enmod ssl && a2ensite default-ssl.conf

RUN sed -i 's|SSLCertificateFile.*|SSLCertificateFile /etc/ssl/certs/selfsigned.crt|' /etc/apache2/sites-available/default-ssl.conf && \
    sed -i 's|SSLCertificateKeyFile.*|SSLCertificateKeyFile /etc/ssl/private/selfsigned.key|' /etc/apache2/sites-available/default-ssl.conf

EXPOSE 80 443 5432 9003

WORKDIR /var/www/html

CMD ["apachectl", "-D", "FOREGROUND"]
