#!/bin/sh
set -e

curl --unix-socket /var/run/docker.sock \
	-H "Content-Type: application/json" \
	-X DELETE http/containers/test


