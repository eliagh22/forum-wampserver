# Projet Finale NSI : Forum

## Idée du projet

Forum en PHP, HTML et CSS avec une base de données installée sur le PC de Elia qui fera office de serveur Web. On souhaiterait mettre en place un système d'inscription utilisateur avec une interface et un compte utilisateur qui permettrait de créer un sujet de discussion avec des réponses de chaque utilisateur.

## Organisation du site

- Page d'accueil avec un menu pour choisir les sujets et une présentation du site et de ses créateurs et fonctionnalités.
  - Menu
  - Titre du site (nom)
  - Images + logo
  - Introduction au site
  - Section avec les sujets de discussions du forum
  - Pied de page (droit + heure)
- Page des règles d'utilisation
- Page de contact
- Page d'inscription
- Page de connexion au compte utilisateur

## Travail avec PHP

- Connexion à la base de données MySQL
- Utilisation d'un serveur Web local : WampServer
- Requête pour s'inscrire et se connecter
  - Vérification de mot de passe et d'email
- Requête pour écrire sur le forum en réponse sur le sujet (uniquement droit écrire et supprimer leurs messages)
- Droit administrateur Elia et Maxime