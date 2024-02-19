#!/usr/bin/env bash

ssh rodovayakniga << EOF
    cd /var/www/rodovayakniga.ru
    git pull
EOF
