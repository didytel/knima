#!/bin/sh
set -e

curl --unix-socket /var/run/docker.sock -i \
	-H "Content-Type: application/json" \
	-X DELETE http/containers/test


