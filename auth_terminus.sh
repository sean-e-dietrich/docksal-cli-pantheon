#!/usr/bin/env bash

TERMINUS_TOKEN=${TERMINUS_TOKEN:=} 

if [ ! -d /home/docker/.terminus ]; then
  sudo mkdir /home/docker/.terminus
fi
chown -R "$HOST_UID:$HOST_GID" /home/docker/.terminus

if [ ! -d /home/docker.drush ]; then
  sudo mkdir /home/docker/.drush
fi
chown -R "$HOST_UID:$HOST_GID" /home/docker/.drush

if [ ! -z $TERMINUS_TOKEN ]; then
  sudo -u $HOST_UID -g $HOST_GID /opt/terminus/bin/terminus auth:login --machine-token=$TERMINUS_TOKEN
  sudo -u $HOST_UID -g $HOST_GID /opt/terminus/bin/terminus auth:whoami
fi
