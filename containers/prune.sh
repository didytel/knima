#!/bin/sh

set -e


curl --unix-socket /var/run/docker.sock -X POST http/containers/prune
