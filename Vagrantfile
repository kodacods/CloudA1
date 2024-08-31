# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile to set up 3 VMs, webservers and database servers,
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

  #Defining webserver
  config.vm.define "webserver" do |webserver|
 
    webserver.vm.hostname = "webserver"
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

    # private network that the VMs will use to communicate
    # using an specific ip .
    webserver.vm.network "private_network", ip: "192.168.2.11"

    # synced folder to share files between the host and the VM.
    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # webserver commands
    webserver.vm.provision "shell", path: "webserver.sh"

end


# Defining dbserver, similar to webserver
  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    dbserver.vm.network "private_network", ip: "192.168.2.13"
    
    # Did it in the labs so adding it here incase for marking
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # makes my files more organized to put it sep
    dbserver.vm.provision "shell", path: "dbserver.sh"

  end


end