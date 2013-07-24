#!/bin/sh

java -jar selenium.jar -role hub&
java -jar selenium.jar -role node -hub http://127.0.0.1:4444/grid/register -browser browser=firefox,browserName=firefox,maxInstances=10&