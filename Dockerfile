FROM docksal/cli:1.2-php7

LABEL maintainer "Sean Dietrich <sean.dietrich@inresonance.com>"

# Install the PHP extensions we need
RUN DEBIAN_FRONTEND=noninteractive apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get -y --force-yes --no-install-recommends install \
    php7.0-dev \
    bzip2 \
    libbz2-dev \
    libc-client2007e-dev \
    libjpeg-dev \
    libkrb5-dev \
    libldap2-dev \
    libmagickwand-dev \
    libmcrypt-dev \
    libpng12-dev \
    libpq-dev \
    libxml2-dev \
    xfonts-base \
    xfonts-75dpi \
    wkhtmltopdf \
  && pecl install imagick \
  && pecl install oauth-2.0.2 \
  && pecl install redis-3.0.0 \
  && mkdir -p /srv/bin \
  && cd /srv/bin \
  && curl -fsSL "https://github.com/Medium/phantomjs/releases/download/v2.1.1/phantomjs-2.1.1-linux-x86_64.tar.bz2" | tar -xjv \
  && mv phantomjs-2.1.1-linux-x86_64/bin/phantomjs /srv/bin/phantomjs \
  && rm -rf phantomjs-2.1.1-linux-x86_64 && rm -f phantomjs-2.1.1-linux-x86_64.tar.bz2 \
  && chmod +x /srv/bin/phantomjs \
  && apt-get -y clean \
  && apt-get -y autoclean \
  && apt-get -y autoremove \
  && rm -rf /var/lib/apt/lists/* && rm -rf && rm -rf /var/lib/cache/* && rm -rf /var/lib/log/* && rm -rf /tmp/*

RUN \
  composer global require consolidation/cgr && \
  cgr terminus


ENV FRAMEWORK=drupal \
    PANTHEON_SITE=docksal \
    PANTHEON_ENVIRONMENT=docksal \
    PANTHEON_BINDING=docksal \
    PANTHEON_DATABASE_HOST=db \
    PANTHEON_DATABASE_PORT=3306 \
    PANTHEON_DATABASE_USERNAME=user \
    PANTHEON_DATABASE_PASSWORD=user \
    PANTHEON_DATABASE_DATABASE=default \
    DRUPAL_HASH_SALT="some random salt"

COPY config/php/php.ini 
COPY config/php/php-cli.ini

RUN mkdir -p /opt/php
COPY config/php/prepend.php /opt/php/prepend.php

COPY startup.sh /opt/startup_terminus.sh

ENTRYPOINT ["/opt/startup_terminus.sh"]
