CREATE TABLE `hardware` (
  `id_hardware` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_supplier` int(11),
  `id_staff` int(11),
  `category` varchar(255),
  `name` varchar(255),
  `label` varchar(255),
  `manufacturer` varchar(255),
  `series` varchar(255),
  `price` int(11),
  `purchase_date` date,
  `warranty` varchar(255),  
  `image` varchar(255),
  `condition` varchar(255),
  `location` varchar(255),  
  `description` text,
  `create_date` date,
  `cpu` varchar(255),
  `memory` varchar(255),
  `vga` varchar(255),
  `storage` varchar(255),
  `lan_port` varchar(255),
  `wireless_adapter` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_supplier` int(11),
  `category` varchar(255),
  `name` varchar(255),
  `manufacturer` varchar(255),
  `version` varchar(255),
  `price` int(11),
  `purchase_date` date,
  `license` varchar(255),  
  `license_qty` varchar(255),  
  `license_start_date` date,
  `license_end_date` date,
  `condition` varchar(255),  
  `description` text,
  `create_date` date
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL PRIMARY KEY,
  `name` varchar(255),
  `position` varchar(255),
  `email` varchar(255),
  `phone` varchar(30),
  `status` varchar(255),
  `create_date` date
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255),
  `address` varchar(255),
  `email` varchar(255),
  `phone` varchar(30),
  `fax` varchar(30),
  `city` varchar(255),
  `country` varchar(255),
  `create_date` date
) ENGINE=InnoDB DEFAULT CHARSET=latin1;