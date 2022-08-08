# LA SOLARITÉ

La Solarité est un jeu de rôle de Dark Fantasy dans un multivers ou la magie et la science se mêlent dans une parfaite alchimie. Les frontières des différents univers sont fragiles et afin d'éviter des catastrophes, une poignée d'aventuriers anthropomorphiques va devoir risquer sa vie afin d'en protéger le seuil.

## Une documentation en ligne

L'objectif est développer un site qui ressenssera toutes la documentation concernant l'univers de la Solarité. (les légendes, les races, les classes, les faits historiques ...)

### Liste des pages :

- page d'accueil
- page d'actualités
- page de campagne
- page des races
- page des classes
- page des divinités
- page de magies
- page de boutique

### Une base de données :

Afin de factoriser au maximum l'affichage des pages, il nous faudra construire une base de données.

### Un back office :

Afin de pouvoir développer le lore de l'univers, il nous faudra construire un back office permettant de gérer les différents items affiché sur le site.

### Wireframe :

![Wireframe Solarité](./docs/Wireframe%20la%20Solarit%C3%A9.png)

### Thème :

Défault:
- blanc et doré

Autre:
- Noir et doré

Sobre et épuré

## User stories

### En tant qu'utilisateur :

- je veux pouvoir afficher le sous menu déroulant
- je veux pouvoir consulter les différents articles d'actualités
- je veux pouvoir consulter les différentes campagnes
- je veux pouvoir consulter les différentes races
- je veux pouvoir consulter les différentes classes
- je veux pouvoir consulter les différentes divinités
- je veux pouvoir consulter les différentes magies
- je veux pouvoir naviguer dans la section suivante et précédente de ma       catégorie en cours.
- je veux pouvoir accéder au liens des réseaux sociaux
- je veux pouvoir acheter les différents guides
- je veux pouvoir alterner entre thème standard et sombre

### En tant qu'administrateur :

- je veux pouvoir ajouter/editer/supprimer un article
- je veux pouvoir ajouter/editer/supprimer une campagne
- je veux pouvoir ajouter/editer/supprimer une race
- je veux pouvoir ajouter/editer/supprimer une classe
- je veux pouvoir ajouter/editer/supprimer une divinité
- je veux pouvoir ajouter/editer/supprimer une magie
- je veux pouvoir ajouter/editer/supprimer un article de la boutique
- je veux pouvoir accéder à l'historique des commandes/paiement et téléchargement
  
## Structure de la base de données

### Table principale :

| id | img | title | article  | catégory | updated at | created at |
| :- |:---:|:-----:|:--------:|:--------:|:----------:| ----------:|
| smallint - not null - auto incrément | varchar - not null | varchar - not null | texte - not null | varchar - not null | date - not null | date - not null |
