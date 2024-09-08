#!/bin/bash

echo "Cleaning environment..."
vagrant destroy -f
vagrant box prune -f

echo "Setting up verbose logging..."
export VAGRANT_LOG=info

echo "Starting initial build..."
time vagrant up > vagrant_build.log 2>&1

echo "Checking installed packages and disk usage..."
for vm in publicserver staffserver dbserver
do
    echo "Checking $vm..."
    vagrant ssh $vm -c "dpkg-query -W -f='\${Package} \${Version} \${Installed-Size}\n' | sort -n -k 3 > /vagrant/${vm}_packages.txt"
    vagrant ssh $vm -c "df -h > /vagrant/${vm}_disk_usage.txt"
done

echo "Destroying and rebuilding for redeployment check..."
vagrant destroy -f
time vagrant up > vagrant_rebuild.log 2>&1

echo "Build process complete. Check the log files for details."