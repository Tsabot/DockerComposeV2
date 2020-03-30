FROM ubuntu

RUN apt-get update -y && apt-get install -y wget gnupg2
RUN apt-get install apt-transport-https -y
RUN apt-get install openjdk-8-jdk -y

RUN wget -qO - https://artifacts.elastic.co/GPG-KEY-elasticsearch | apt-key add -

RUN apt-get clean && apt-get update
RUN apt-get install -y elasticsearch

COPY ./docker/config/elasticsearch.yml /usr/share/elasticsearch/config/elasticsearch.yml
COPY ./docker/config/jvm.options /usr/share/elasticsearch/config/jvm.options

RUN systemctl start elasticsearch.service

ENTRYPOINT ["elasticsearch"]