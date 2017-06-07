#!/usr/bin/env bash

TERMINUS_TOKEN=${TERMINUS_TOKEN:=} 

if [ ! -z $TERMINUS_TOKEN ]; then
  sudo -u docker /opt/terminus/bin/terminus auth:login --machine-token=$TERMINUS_TOKEN
  sudo -u docker /opt/terminus/bin/terminus auth:whoami
fi
