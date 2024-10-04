FROM tmvdl/php-composer

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.0/install.sh | bash

RUN nvm install 22

WORKDIR /app

COPY . .

RUN composer update

RUN npm install

RUN npm run production

RUN php artisan key:generate

CMD sh run.sh
