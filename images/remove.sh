#!/bin/sh
set -e

curl --unix-socket /var/run/docker.sock \
	-X DELETE "http:/v1.39/images/test:knime_api"


