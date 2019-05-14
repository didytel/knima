#!/bin/sh
set -e

curl --unix-socket /var/run/docker.sock \
	-H "Content-Type: application/tar" \
    --data-binary "@Dockerfile.tgz" \
	-X POST "http/build?t=test:knime_api&networkmode=cntlm-docker_default"


