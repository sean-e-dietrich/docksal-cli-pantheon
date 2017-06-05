#!/usr/bin/env bash

TERMINUS_TOKEN=${TERMINUS_TOKEN:=} 

if [ ! -d /home/docker/.terminus ]; then
  sudo mkdir /home/docker/.terminus
fi
chown -R docker:100 /home/docker/.terminus

if [ ! -d /home/docker.drush ]; then
  sudo mkdir /home/docker/.drush
fi
chown -R docker:100 /home/docker/.drush

if [ ! -z $TERMINUS_TOKEN ]; then
  sudo -u docker -g 100 /opt/terminus/bin/terminus auth:login --machine-token=$TERMINUS_TOKEN
  sudo -u docker -g 100 /opt/terminus/bin/terminus auth:whoami
fi
