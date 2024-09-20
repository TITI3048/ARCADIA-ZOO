# Arcadia Zoo

Bienvenue sur le site web d'Arcadia Zoo. Ce projet est une interface utilisateur pour un zoo fictif, présentant différentes sections comme les services, la jungle, la savane et le marais. Il comprend également une page de connexion en PHP et une partie administrateur pour gérer les employés, les animaux et les services.

## Description

Ce projet contient les fichiers HTML, CSS, JavaScript et PHP nécessaires pour afficher et gérer les différentes pages du site web d'Arcadia Zoo. Les principales fonctionnalités incluent :
- Page d'accueil
- Page des services
- Pages des habitats (Jungle, Savane, Marais)
- Page de connexion
- Partie administrateur avec gestion des employés, des animaux et des services
- Système de likes pour les cartes des animaux
- Page d'inscription des employés avec validation par l'administrateur

## Installation

Pour installer et exécuter ce projet localement, suivez les étapes ci-dessous :

1. Clonez le dépôt :

    git clone https://github.com/votre-utilisateur/arcadia-zoo.git
  
2. Accédez au répertoire du projet :

    cd arcadia-zoo
 
3. Configurez votre serveur web pour pointer vers le répertoire du projet.
4. Assurez-vous que PHP est installé et configuré sur votre serveur.
5. Importez la base de données fournie dans le fichier `database.sql`.

## Utilisation

- La page d'accueil (`accueil.html`) contient des liens vers différentes sections du zoo :
  - Services
  - Jungle
  - Savane
  - Marais
- La page de connexion (`connexion.php`) permet aux utilisateurs de se connecter.
- La partie administrateur permet de gérer les employés, les animaux et les services via les pages `employe.php`, `animaux.php` et `services.php`.
- Les utilisateurs peuvent liker les cartes des animaux et les administrateurs peuvent voir ces likes.


## Contributeurs

- [TITI3048](https://github.com/TITI3048/ARCADIA-ZOO)

## Contact

Pour toute question ou suggestion, veuillez contacter [rouvierethibaudpro@ga=mail.com].

## Fonctionnalités supplémentaires

- Système de likes pour les cartes des animaux.
- Page d'inscription des employés avec validation par l'administrateur.
- Gestion complète des employés, des animaux et des services via la partie administrateur.

## Technologies utilisées

- HTML, CSS, JavaScript pour le front-end.
- PHP pour le back-end.
- MySQL pour la base de données.

# STRUCTURE DE MON SITE

└── ARCADIA-ZOO/
    ├── Readme.md
    ├── accueil.html
    ├── animaux.php
    ├── avis.html
    ├── connexion.php
    ├── css
    │   ├── accueil.css
    │   ├── avis.css
    │   ├── connexion.css
    │   ├── index.css
    │   ├── jungle.css
    │   ├── reserve-africaine.css
    │   ├── services.css
    │   └── voliere.css
    ├── dashboard.php
    ├── employes.php
    ├── image
    │   ├── LOGO RINO 3.png
    │   ├── illustration-nature-motifs-feuilles-conception-plantes-abstraites-ia-generative_188544-12678.jpg
    │   ├── image footer
    │   ├── image-accueil
    │   ├── image-jungle
    │   ├── image-reptile
    │   ├── image-reserve-africaine
    │   ├── image-services
    │   ├── image-voliere
    │   ├── like.png
    │   ├── list_12713145.png
    │   ├── logo1.png
    │   ├── logo2.png
    │   ├── logo3.png
    │   ├── logo4.png
    │   ├── pexels-photo-27282678.webp
    │   └── vidéo
    ├── index.js
    ├── index.php
    ├── inscription.php
    ├── js
    │   ├── accueil.js
    │   ├── avis.js
    │   ├── like.js
    │   └── script.js
    ├── jungle.html
    ├── q
    │   ├── allroutes.js
    │   ├── route.js
    │   └── router.js
    ├── reserve-africaine.html
    ├── services.html
    ├── services.php
    ├── update_likes.php
    └── voliere.html

# TEST
test executé avec:
❯ npm test

# Remerciement
Je remercie mon groupe watshapp pour leur aide et leur soutien,
et particulièrement Julien, Carole, Mika et Eugenio.
