#!/bin/bash

############
# SET MDNS #
############
hostnamectl set-hostname apeaj
echo "127.0.0.1 apeaj" >> /etc/hosts
apt install -y avahi-daemon libnss-mdns avahi-utils
if ! grep -q "mdns4_minimal \[NOTFOUND=return\] dns myhostname" /etc/nsswitch.conf; then
    new_line="hosts: files mdns4_minimal [NOTFOUND=return] dns myhostname"
    sed -i "s/^hosts:.*$/$new_line/" /etc/nsswitch.conf
    echo "modif"
    sleep 1
fi
echo "non modif"
sleep 1
systemctl restart avahi-daemon
if avahi-resolve -n -4 apeaj.local | grep -q "127.0.0.1"; then
    echo "Mdns configuration successful"
else
    echo "Mdns configuration failed"
fi
sleep 1

#######################
# DOCKER COMPOSE #
#######################
mkdir dbapeaj-data
docker-compose -f docker-compose.yaml up -d

############
# COMPOSER #
############
apt install -y composer
cd apeaj
composer install --no-interaction --no-dev
cd ..
chown -R root:www-data apeaj
chmod -R 770 apeaj

###############
# SET IPTABLE #
###############

###########
# HOTSPOT #
###########
