#!/bin/bash

SELENIUM_PROCESSES=$(ps -ef|grep selenium|grep -v grep | grep -v $0)

if [ -n "$SELENIUM_PROCESSES" ]
then
    kill $(echo "$SELENIUM_PROCESSES" | awk '{print $2}')
else
    echo "No selenium is running"
fi

# wait for selenium to exit
sleep 1