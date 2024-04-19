#!/bin/bash

##################
# INSTALL DOCKER #
##################
apt update && apt upgrade -y
apt install -y \
        apt-transport-https \
        ca-certificates \
        curl \
        gnupg \
        lsb-release
mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/debian/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null
apt update
apt install -y docker-ce docker-ce-cli containerd.io docker-compose
echo "Docker install successful"

###############
# SOURCE CODE #
###############
apt install -y unzip
wget https://github.com/Arthur-Bourgoin/apeaj/archive/refs/heads/main.zip
unzip main.zip
mv apeaj-main apeaj && mv apeaj/docker-compose.yaml .
rm apeaj/install.sh main.zip

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
echo "test mdns"
avahi-resolve -n -4 apeaj.local
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
DEBIAN_FRONTEND=noninteractive apt install -y iptables iptables-persistent
iptables -P INPUT DROP
iptables -P OUTPUT DROP
iptables -A INPUT -i lo -j ACCEPT
iptables -A OUTPUT -o lo -j ACCEPT
iptables -A INPUT -p tcp --dport 80 -m state --state NEW,ESTABLISHED -j ACCEPT
iptables -A OUTPUT -p tcp --sport 80 -m state --state ESTABLISHED -j ACCEPT
iptables -A INPUT -p tcp --dport 443 -m state --state NEW,ESTABLISHED -j ACCEPT
iptables -A OUTPUT -p tcp --sport 443 -m state --state ESTABLISHED -j ACCEPT
iptables -A INPUT --dport 5353 -j ACCEPT
iptables -A OUTPUT --sport 5353 -j ACCEPT
iptables-save > /etc/iptables/rules.v4
systemctl enable netfilter-persistent.service

###########
# HOTSPOT #
###########
