drop database if exists Palmiste;
create database Palmiste;
use Palmiste;

# Role
create table Role
(
    id_role     int primary key auto_increment not null,
    description varchar(30)
);
# Adresse
create table Adresse
(
    id_adresse  int primary key auto_increment not null,
    rue         int                            not null,
    code_postal varchar(10)                    not null,
    ville       varchar(50)                    not null,
    numero      varchar(10),
    province    varchar(20)                    not null
);

# Utilisateur
create table Utilisateur
(
    id_utilisateur   int primary key auto_increment not null,
    nom              varchar(50)                    not null,
    prenom           varchar(50),
    email            varchar(100)                   not null,
    mot_de_passe     varchar(255)                   not null,
    id_role          int
);
# UtilisateurAdresse
create table UtilisateurAdresse
(
    id_utilisateur int,
    id_adresse     int
);
# Image
create table Image
(
    id_sac  int primary key auto_increment not null,
    path    varchar(255)                   not null,
    id_produit  int

);
# Sac
create table Sac
(
    id_sac            int primary key auto_increment not null,
    nom                varchar(255)                   not null,
    description        text,
    quantite           int                            not null,
    prix               varchar(7)                     not null
);

# Commande
create table Commande
(
    id_commande    int primary key auto_increment not null,
    quantite       int                            not null,
    prix           varchar(10)                    not null,
    date_creation  date                           not null,
    status         varchar(50)                    not null,
    id_utilisateur int
);
# ProduitCommande
create table ProduitCommande
(
    id_commande int,
    id_sac     int
);


# modification des tables
# Utilisateur
alter table Utilisateur
    add constraint fk_utilisateur_role
        foreign key (id_role) references Role (id_role);
# UtilisateurAdresse
alter table UtilisateurAdresse
    add constraint fk_utilisateur_adresse
        foreign key (id_utilisateur) references Utilisateur (id_utilisateur),
    add constraint fk_adresse_utilisateur
        foreign key (id_adresse) references Adresse (id_adresse);
# ImageProduit
alter table Sac
    add constraint fk_image_produit
        foreign key (id_produit) references Sac (id_sac) on delete cascade on update cascade;

# CommandeSac
alter table Commande
    add constraint fk_commande_sac
        foreign key (id_utilisateur) references Utilisateur (id_utilisateur);

# ProduitCommande
alter table ProduitCommande
    add constraint fk_produit_commande
        foreign key (id_commande) references Commande (id_commande),
    add constraint fk_commande_produit
        foreign key (id_sac) references Sac (id_sac);



-- Add role super admin
INSERT INTO `role` (`id_role`, `description`) VALUES ('001', 'Superadmin');

-- Insert super admin with password '1234567'
INSERT INTO `Utilisateur` (`Id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `id_role`)
VALUES ( '001', 'Boss', 'Michel', 'superadmin@gmail.com', '1234567' (SELECT `id_role` FROM `Role` WHERE `name` = 'superadmin'));

-- Add role Utilisateur
INSERT INTO `Role` (`id_role`, `description`) VALUES (`001`, 'Utilisateur');

-- Insert utilisateur
INSERT INTO `Utilisateur` (`Id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `id_role`)
VALUES ('002', 'Ross', 'Brant', 'brant@gmail.com', '1234568' (SELECT `id_role` FROM `Role` WHERE `name` = 'utilisateur'));

-- Insert items by default
INSERT INTO `Sac` (`id_sac`,`nom`, `description`,`quantite`, `prix`)
VALUES 
  (01,'produit 1','solide', 20, 49.99),
  (02,'Produit 2','tres solide', 10, 39.99),
  (03,'Produit 3','extremement solide', 40, 59.99);
