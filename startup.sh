#!/bin/bash

TERMINUS_TOKEN=${TERMINUS_TOKEN:=} 


if [ ! -z $TERMINUS_TOKEN ]; then

  terminus auth:login --machine-token=$TERMINUS_TOKEN

fi
