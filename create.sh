#!/bin/sh
set -e

curl --unix-socket /var/run/docker.sock \
	-H "Content-Type: application/json" \
	-d '{"Image": "alpine", "CMD": ["echo", "hello world"], "AttachStdin":true, "OpenStdin":true}' \
	-X POST http/containers/create?name=test


