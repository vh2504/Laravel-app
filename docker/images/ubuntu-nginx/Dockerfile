FROM nginx:latest AS nginx

#### PM2 + NGINX
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update
RUN yes | apt-get install vim
RUN apt-get clean
RUN apt-get update

RUN apt-get install -y \
    curl \
    sudo \
    g++

#### Clear apt-get
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#### config
#WORKDIR /var/www/

COPY ./etc/dhparam.pem /etc/nginx/dhparam.pem
COPY ./etc/snippets/self-signed.conf /etc/nginx/snippets/self-signed.conf
COPY ./etc/snippets/ssl-params.conf /etc/nginx/snippets/ssl-params.conf
COPY ./etc/certs/nginx-selfsigned.key /etc/ssl/private/nginx-selfsigned.key
COPY ./etc/certs/nginx-selfsigned.crt /etc/ssl/certs/nginx-selfsigned.crt

COPY ./nginx/app.conf  /etc/nginx/sites-enabled/default

#### RUNING
EXPOSE 80

RUN mkdir -p /var/log/initial
RUN touch /var/log/initial/log
RUN chmod -R 775 /var/log/initial/log

CMD ["nginx", "-g", "daemon off;"]
