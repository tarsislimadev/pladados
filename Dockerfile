FROM tmvdl/php-composer

RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash -

RUN curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /usr/share/keyrings/yarnkey.gpg >/dev/null

RUN echo "deb [signed-by=/usr/share/keyrings/yarnkey.gpg] https://dl.yarnpkg.com/debian stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt update \
  && apt install -y nodejs yarn

RUN apt update \
  && apt install -y libfreetype6-dev libjpeg-dev libpng-dev libwebp-dev libgmp-dev libpq-dev libzip-dev \
  && docker-php-ext-enable opcache \
  && docker-php-ext-configure gd \
  && docker-php-ext-install gd gmp pdo pdo_pgsql zip \
  && apt autoclean -y \
  && rm -rf /var/lib/apt/lists/* \
  && rm -rf /tmp/pear/

WORKDIR /app

COPY . .

RUN composer update

RUN npm install

RUN npm run production

RUN php artisan key:generate

CMD sh run.sh
