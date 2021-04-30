-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Novembre 2017 à 16:23
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `centro`
--

-- --------------------------------------------------------

--
-- Structure de la table `besoin`
--

CREATE TABLE `besoin` (
  `ID_BESOIN` int(11) NOT NULL,
  `DESIGNATION_BESOIN` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bon_de_commandes`
--

CREATE TABLE `bon_de_commandes` (
  `NUMERO_BON_COMMANDE` int(11) NOT NULL,
  `ID_UTILISATEUR` int(5) NOT NULL,
  `ID_TYPE_COMMANDE` smallint(6) NOT NULL,
  `ID_LIEU` smallint(6) NOT NULL,
  `MATRICULE_FRS` char(8) NOT NULL,
  `ID_BESOIN` int(11) NOT NULL,
  `ID_PROJET` int(11) NOT NULL,
  `OBJET` varchar(30) NOT NULL,
  `MONTANT_TOTAL` bigint(20) NOT NULL,
  `DELAIS` int(11) NOT NULL,
  `TAUX_AVANCE` int(11) NOT NULL,
  `DATE_COMMANDE` date DEFAULT NULL,
  `COMMENTAIRE` text,
  `AVANCE_FAIT` tinyint(1) NOT NULL,
  `TOTAL_FAIT` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bon_de_transferts`
--

CREATE TABLE `bon_de_transferts` (
  `NUMERO_BON_TRANSFERT` int(11) NOT NULL,
  `ID_UTILISATEUR` int(5) NOT NULL,
  `ID_LIEU` smallint(6) NOT NULL,
  `ID_BESOIN` int(11) NOT NULL,
  `ID_PROJET` int(11) NOT NULL,
  `OBJET` varchar(30) NOT NULL,
  `PROVENANCE_BON_TRANSFERT` char(75) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_engins`
--

CREATE TABLE `categorie_engins` (
  `MATRICULE_CATEGORIE` char(8) NOT NULL,
  `MATRICULE_TYPE_ENGIN` char(8) NOT NULL,
  `DESIGNATION_CATEGORIE` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_factures`
--

CREATE TABLE `categorie_factures` (
  `ID_CATEGORIE_FACTURE` int(11) NOT NULL,
  `DESIGNATION_CATEGORIE_FACTURE` char(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `centres`
--

CREATE TABLE `centres` (
  `MATRICULE_CENTRE` char(8) NOT NULL,
  `NOM_CENTRE` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `choisir_pours`
--

CREATE TABLE `choisir_pours` (
  `NUMERO_BON_TRANSFERT` int(11) NOT NULL,
  `ID_DESIGNATION_OBJET` int(11) NOT NULL,
  `QTE_TRANSFERT` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commanders`
--

CREATE TABLE `commanders` (
  `NUMERO_BON_COMMANDE` int(11) NOT NULL,
  `ID_DESIGNATION_OBJET` int(11) NOT NULL,
  `QTE_COMMANDE` int(11) NOT NULL,
  `PRIX_UNIT` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `designations`
--

CREATE TABLE `designations` (
  `ID_DESIGNATION_OBJET` int(11) NOT NULL,
  `ID_UTE` smallint(6) NOT NULL,
  `NOM_DESIGNATION_OBJET` char(50) NOT NULL,
  `estSupprimer` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `divisions`
--

CREATE TABLE `divisions` (
  `ID_DIVISION` int(11) NOT NULL,
  `DESIGNATION_DIVISION` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `engins`
--

CREATE TABLE `engins` (
  `ID_ENGIN` smallint(6) NOT NULL,
  `MATRICULE_CATEGORIE` char(8) NOT NULL,
  `ID_ETAT` smallint(6) NOT NULL,
  `ID_MARQUE` smallint(6) NOT NULL,
  `MATRICULE_POSITION` char(8) NOT NULL,
  `MATRICULE_PROJET` char(8) NOT NULL,
  `ID_BESOIN` int(11) NOT NULL,
  `MATRICULE_ENGIN` varchar(10) NOT NULL,
  `NOM_ENGIN` char(25) NOT NULL,
  `DESIGNATION_ENGIN` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_engins`
--

CREATE TABLE `etat_engins` (
  `ID_ETAT` smallint(6) NOT NULL,
  `DESIGNATION_ETAT` char(50) NOT NULL,
  `DESCRIPTION_ETAT` char(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_projets`
--

CREATE TABLE `etat_projets` (
  `ID_ETAT_PROJET` smallint(6) NOT NULL,
  `DESIGNATION_ETAT_PROJET` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `ID_FACTURE` int(11) NOT NULL,
  `ID_TYPE_FACTURE` int(11) NOT NULL,
  `ID_CATEGORIE_FACTURE` int(11) NOT NULL,
  `NUMERO_BON_COMMANDE` int(11) NOT NULL,
  `NUMERO_FACTURE` int(11) NOT NULL,
  `OBJET_FACTURE` char(30) NOT NULL,
  `DATE_FACTURE` date NOT NULL,
  `DATE_RECEPTION_FACTURE` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `MATRICULE_FRS` char(8) NOT NULL,
  `NOM_FRS` char(50) NOT NULL,
  `TEL_FRS` decimal(8,0) NOT NULL,
  `estSupprimer` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lieu_ou_a_lieu_bon_commandes`
--

CREATE TABLE `lieu_ou_a_lieu_bon_commandes` (
  `ID_LIEU` smallint(6) NOT NULL,
  `DESIGNATION_LIEU` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `ID_MARQUE` smallint(6) NOT NULL,
  `DESIGNATION_MARQUE` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE `objets` (
  `ID_OBJET` int(11) NOT NULL,
  `NOM_OBJET` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions` (
  `MATRICULE_POSITION` char(8) NOT NULL,
  `DESIGNATION_POSITION` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `ID_PROJET` int(8) NOT NULL,
  `DESIGNATION_PROJET` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `ID_ROLE` int(11) NOT NULL,
  `DESIGNATION_ROLE` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `se_trouver`
--

CREATE TABLE `se_trouver` (
  `MATRICULE_CENTRE` char(8) NOT NULL,
  `MATRICULE_TYPE_ENGIN` char(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_bon_de_commandes`
--

CREATE TABLE `type_bon_de_commandes` (
  `ID_TYPE_COMMANDE` smallint(6) NOT NULL,
  `DESIGNATION_TYPE_COMMANDE` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_engins`
--

CREATE TABLE `type_engins` (
  `MATRICULE_TYPE_ENGIN` char(8) NOT NULL,
  `DESIGNATION_TYPE_ENGIN` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_factures`
--

CREATE TABLE `type_factures` (
  `ID_TYPE_FACTURE` int(11) NOT NULL,
  `DESIGNATION_TYPE_FACTURE` char(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_ROLE` int(11) DEFAULT '0',
  `ID_DIVISION` int(11) DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estSupprimer` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ID_ROLE`, `ID_DIVISION`, `name`, `password`, `estSupprimer`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 'BISSARI', '$2y$10$mzhdSFsOjlLhgzJ8l2TvOuo0x0m5lfc0vV.WpPouKjlHYdNZl7r4C', 0, NULL, '2017-10-27 13:13:27', '2017-10-27 13:13:27');

-- --------------------------------------------------------

--
-- Structure de la table `utes`
--

CREATE TABLE `utes` (
  `ID_UTE` smallint(6) NOT NULL,
  `DESIGNATION_UTE` char(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_UTILISATEUR` int(5) NOT NULL,
  `NOM_UTILISATEUR` char(50) NOT NULL,
  `MOTDEPASSE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `besoin`
--
ALTER TABLE `besoin`
  ADD PRIMARY KEY (`ID_BESOIN`);

--
-- Index pour la table `bon_de_commandes`
--
ALTER TABLE `bon_de_commandes`
  ADD PRIMARY KEY (`NUMERO_BON_COMMANDE`),
  ADD KEY `FK_CONCERNER` (`MATRICULE_FRS`),
  ADD KEY `FK_CREER_A` (`ID_LIEU`),
  ADD KEY `FK_ETABLIR` (`ID_UTILISATEUR`),
  ADD KEY `FK_ETRE_DE` (`ID_TYPE_COMMANDE`),
  ADD KEY `FK_PORTER_SUR` (`ID_BESOIN`),
  ADD KEY `FK_DESTINER_A` (`ID_PROJET`);

--
-- Index pour la table `bon_de_transferts`
--
ALTER TABLE `bon_de_transferts`
  ADD PRIMARY KEY (`NUMERO_BON_TRANSFERT`),
  ADD KEY `FK_AVOIR_LIEU_A` (`ID_LIEU`),
  ADD KEY `FK_FAIRE` (`ID_UTILISATEUR`),
  ADD KEY `FK_TOUCHER` (`ID_BESOIN`),
  ADD KEY `FK_ASSIGNER` (`ID_PROJET`);

--
-- Index pour la table `categorie_engins`
--
ALTER TABLE `categorie_engins`
  ADD PRIMARY KEY (`MATRICULE_CATEGORIE`),
  ADD KEY `FK_CONTENIR` (`MATRICULE_TYPE_ENGIN`);

--
-- Index pour la table `categorie_factures`
--
ALTER TABLE `categorie_factures`
  ADD PRIMARY KEY (`ID_CATEGORIE_FACTURE`);

--
-- Index pour la table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`MATRICULE_CENTRE`);

--
-- Index pour la table `choisir_pours`
--
ALTER TABLE `choisir_pours`
  ADD PRIMARY KEY (`NUMERO_BON_TRANSFERT`,`ID_DESIGNATION_OBJET`),
  ADD KEY `FK_CHOISIR_POUR` (`ID_DESIGNATION_OBJET`);

--
-- Index pour la table `commanders`
--
ALTER TABLE `commanders`
  ADD PRIMARY KEY (`NUMERO_BON_COMMANDE`,`ID_DESIGNATION_OBJET`),
  ADD KEY `FK_COMMANDER` (`ID_DESIGNATION_OBJET`);

--
-- Index pour la table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`ID_DESIGNATION_OBJET`),
  ADD KEY `FK_POSSEDER` (`ID_UTE`);

--
-- Index pour la table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`ID_DIVISION`);

--
-- Index pour la table `engins`
--
ALTER TABLE `engins`
  ADD PRIMARY KEY (`ID_ENGIN`),
  ADD KEY `FK_AFFECTER` (`MATRICULE_PROJET`),
  ADD KEY `FK_AVOIR` (`ID_MARQUE`),
  ADD KEY `FK_CONSTITUER_DE` (`MATRICULE_CATEGORIE`),
  ADD KEY `FK_EST_SITUER_A` (`MATRICULE_POSITION`),
  ADD KEY `FK_SE_RAPPORTER` (`ID_BESOIN`),
  ADD KEY `FK_SE_TROUVER_DANS` (`ID_ETAT`);

--
-- Index pour la table `etat_engins`
--
ALTER TABLE `etat_engins`
  ADD PRIMARY KEY (`ID_ETAT`);

--
-- Index pour la table `etat_projets`
--
ALTER TABLE `etat_projets`
  ADD PRIMARY KEY (`ID_ETAT_PROJET`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`ID_FACTURE`),
  ADD KEY `FK_CONCERNER_` (`ID_CATEGORIE_FACTURE`),
  ADD KEY `FK_ENTRAINER` (`NUMERO_BON_COMMANDE`),
  ADD KEY `FK_ETRE__DE` (`ID_TYPE_FACTURE`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`MATRICULE_FRS`);

--
-- Index pour la table `lieu_ou_a_lieu_bon_commandes`
--
ALTER TABLE `lieu_ou_a_lieu_bon_commandes`
  ADD PRIMARY KEY (`ID_LIEU`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`ID_MARQUE`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`ID_OBJET`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`MATRICULE_POSITION`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`ID_PROJET`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Index pour la table `se_trouver`
--
ALTER TABLE `se_trouver`
  ADD PRIMARY KEY (`MATRICULE_CENTRE`,`MATRICULE_TYPE_ENGIN`),
  ADD KEY `FK_SE_TROUVER` (`MATRICULE_TYPE_ENGIN`);

--
-- Index pour la table `type_bon_de_commandes`
--
ALTER TABLE `type_bon_de_commandes`
  ADD PRIMARY KEY (`ID_TYPE_COMMANDE`);

--
-- Index pour la table `type_engins`
--
ALTER TABLE `type_engins`
  ADD PRIMARY KEY (`MATRICULE_TYPE_ENGIN`);

--
-- Index pour la table `type_factures`
--
ALTER TABLE `type_factures`
  ADD PRIMARY KEY (`ID_TYPE_FACTURE`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AVOIR_DROIT` (`ID_ROLE`),
  ADD KEY `FK_TRAVAILLER` (`ID_DIVISION`);

--
-- Index pour la table `utes`
--
ALTER TABLE `utes`
  ADD PRIMARY KEY (`ID_UTE`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_UTILISATEUR`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `designations`
--
ALTER TABLE `designations`
  MODIFY `ID_DESIGNATION_OBJET` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `ID_FACTURE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lieu_ou_a_lieu_bon_commandes`
--
ALTER TABLE `lieu_ou_a_lieu_bon_commandes`
  MODIFY `ID_LIEU` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `objets`
--
ALTER TABLE `objets`
  MODIFY `ID_OBJET` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `ID_PROJET` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utes`
--
ALTER TABLE `utes`
  MODIFY `ID_UTE` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_UTILISATEUR` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
