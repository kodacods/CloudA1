# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile to set up 3 VMs - client, admin and database servers:
Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/xenial64"

  #Client VM
  config.vm.define "publicserver" do |publicserver|
    publicserver.vm.hostname = "publicserver"
    
    config.vm.boot_timeout = 3200
    
    publicserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    
    publicserver.vm.network "private_network", ip: "192.168.2.11"
    
    publicserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    publicserver.vm.provision "shell", path: "publicserver.sh"

  end

  #Staff VM
  config.vm.define "staffserver" do |staffserver|
    staffserver.vm.hostname = "staffserver"
  
    staffserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
     
    staffserver.vm.network "private_network", ip: "192.168.2.12"
      
    staffserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
  
    staffserver.vm.provision "shell", path: "staffserver.sh"
  
    end

  #Database VM
  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    
    dbserver.vm.network "private_network", ip: "192.168.2.13"
    
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    dbserver.vm.provision "shell", path: "dbserver.sh"
  
  end


end