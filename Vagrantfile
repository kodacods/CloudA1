# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile to set up 3 VMs - client, admin and database servers:
Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/xenial64"

  #Client VM
  config.vm.define "webserver" do |webserver|
    webserver.vm.hostname = "webserver"
    
    config.vm.boot_timeout = 3200
    
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    
    webserver.vm.network "private_network", ip: "192.168.2.11"
    
    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    webserver.vm.provision "shell", path: "webserver.sh"

  end

  #Staff VM
  config.vm.define "adminserver" do |adminserver|
    adminserver.vm.hostname = "adminserver"
  
    adminserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
     
    adminserver.vm.network "private_network", ip: "192.168.2.12"
      
    adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
  
    adminserver.vm.provision "shell", path: "staffserver.sh"
  
    end

  #Database VM
  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    
    dbserver.vm.network "private_network", ip: "192.168.2.13"
    
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    dbserver.vm.provision "shell", path: "dbserver.sh"
  
  end


end