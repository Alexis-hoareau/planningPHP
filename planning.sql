-- phpMyAdmin SQL Dump
--
-- Structure de la table `activite`
--

CREATE TABLE IF NOT EXISTS `activite` (
  `nomActivite` varchar(20) NOT NULL,
  PRIMARY KEY (`nomActivite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activite`
--


-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `login` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participant`
--


-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE IF NOT EXISTS `participe` (
  `login` varchar(20) NOT NULL,
  `nomActivite` varchar(20) NOT NULL,
  `jour` date NOT NULL,
  `heure` int(2) NOT NULL,
  PRIMARY KEY (`login`,`jour`,`heure`),
  FOREIGN KEY(login) REFERENCES participant(login),
  FOREIGN KEY(nomActivite) REFERENCES activite(nomActivite)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

