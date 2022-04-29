FROM ubuntu:latest
FROM ubuntu:latest
RUN apt -y update

ARG DEBIAN_FRONTEND=noninteractive

RUN apt install curl -y

RUN apt install apache2 -y

RUN apt install apt-utils -y

RUN apt-get clean

#RUN  apt -y install software-properties-common

#RUN  add-apt-repository ppa:ondrej/php

RUN  apt install php -y

RUN  apt install libapache2-mod-php -y

RUN rm -rf /var/www/html/index.html

RUN service apache2 start

WORKDIR /var/www/html
COPY index.php /var/www/html

EXPOSE 80

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

#CMD [“apache2”, “-D”, “FOREGROUND”]
