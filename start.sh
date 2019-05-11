#!/bin/sh

set -e


curl --unix-socket /var/run/docker.sock -i \
	-X POST http/containers/test/start
