#!/bin/sh
set -e

curl --unix-socket /var/run/docker.sock "http/containers/test/logs?stdout=1"