

/* Database 'els'*/
/* Table structure for table 'apprenants' */
DROP TABLE IF EXISTS `apprenants`;
CREATE TABLE IF NOT EXISTS `apprenants` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`utilisateur` varchar(50) NOT NULL,
  	`nom` varchar(50) NOT NULL,
  	`prenom` varchar(50) NOT NULL,
  	`motpasse` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `apprenants`(`id`, `utilisateur`, `nom`, `prenom`, `motpasse`, `email`) 
VALUES ('1','raounek.arif','arif','raounek','$2y$10$aDTV1YcxLUvTxDU.RYqnKeAPMmGshPec4MwGpc08dbYomg7ns.C0u','raounekarif@gmail.com'),
  ('2','roubila.khaldi','khaldi','roubila','$2y$10$/5wEl6N8gyajTYKEONXpMeetLRPtnPhBpUDat8DALwUoQqp4I3k5W','roubila110@gmail.com'),
  ('3','ranime.bmd','Bmd','ranime','$2y$10$/5wEl6N8gyajTYKEONXpMeetLRPtnPhBpUDat8DALwUoQqp4I3k5W','ranime.bmd@gmail.com'),
  ('4','oumaima.bmz','Boumaza','Oumaima','$2y$10$aDTV1YcxLUvTxDU.RYqnKeAPMmGshPec4MwGpc08dbYomg7ns.C0u','oumaimabmz@gmail.com'),
  ('5','wail.snn','snani','wail','$2y$10$aDTV1YcxLUvTxDU.RYqnKeAPMmGshPec4MwGpc08dbYomg7ns.C0u','wail.snn@gmail.com');

/* Table structure for table 'enseignant' */

CREATE TABLE IF NOT EXISTS `enseignant` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`utilisateur` varchar(50) NOT NULL,
  	`nom` varchar(50) NOT NULL,
  	`prenom` varchar(50) NOT NULL,
  	`motpasse` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `enseignant`(`id`, `utilisateur`, `nom`, `prenom`, `motpasse`, `email`) 
VALUES ('1','boudjedir','boudjedir','amina','$2y$10$x/MyTLXqQUXQHCnUEx6NWeIECncpfxWs4s.u7p0mTtLD.0d.KAArS','a.boudjedir@hotmail.fr');

/* Table structure for table 'administrateur' */

CREATE TABLE IF NOT EXISTS `administrateur` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`utilisateur` varchar(50) NOT NULL,
  	`prenom` varchar(50) NOT NULL,
  	`motpasse` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `administrateur` (`id`, `utilisateur`,`prenom`, `motpasse`, `email`) 
VALUES ('1', 'admin',  'Admin' , '$2y$10$UYFwHmiB5O3j8iJG/xade.bjXC/i4vuVi3DgnIu67IxhIWCPIQx2y', 'admin@gmail.com');

/* Table structure for table 'cours' */

CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nom_module` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/* Table structure for table 'devoirs' */

CREATE TABLE IF NOT EXISTS `devoir` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nom_module` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `utilisateur` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


/*table de contact*/

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*table de contact teacher*/
DROP TABLE IF EXISTS `contactTS`;
CREATE TABLE IF NOT EXISTS `contactTS` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,

 PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
