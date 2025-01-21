# BookFace

# Forum Communautaire

## Description
Ce projet consiste en un **forum communautaire** où les utilisateurs peuvent poser des questions, échanger sur des thématiques spécifiques, voter pour des publications, et discuter dans une messagerie privée. Il n'y a pas de système de connexion : les utilisateurs publient et interagissent librement.

## Fonctionnalités principales

1. **Création de publications**
   - Les utilisateurs peuvent publier des messages (questions, réponses, discussions).
   - Chaque message peut avoir un titre et un contenu.
   - Possibilité de voter sur les publications (upvote, downvote).

2. **Gestion des catégories et tags**
   - Les messages peuvent être associés à une catégorie.
   - Des tags peuvent être ajoutés à chaque message pour faciliter les recherches.

3. **Messagerie privée**
   - Les utilisateurs peuvent envoyer des messages privés à d'autres utilisateurs sans inscription ni connexion.
   - Les messages privés sont visibles uniquement par l'expéditeur et le destinataire.

4. **Modération et gestion des contenus**
   - Les messages peuvent être signalés pour modération.
   - Les administrateurs peuvent supprimer ou valider les messages signalés.

5. **Affichage des messages**
   - Les messages sont affichés dans un flux ou par catégorie.
   - Chaque message affiche son nombre de votes (upvotes, downvotes) et la date de publication.

## Architecture du projet

Le projet est basé sur le modèle **MVC (Modèle-Vue-Contrôleur)**, structuré comme suit :

- **Modèle :** Gestion des données (messages, votes, catégories, tags, messagerie privée).
- **Vue :** Interface utilisateur pour afficher les messages, les formulaires de création de publications et de messagerie privée.
- **Contrôleur :** Gère la logique métier (publication de messages, gestion des votes, messagerie privée, modération).

## Technologies utilisées

- **Backend :** PHP
- **Base de données :** MySQL
- **Frontend :** HTML, CSS, JavaScript (pour les interactions de vote)
- **Architecture :** MVC

## Structure de la base de données

- **Table `posts` (Messages)**
  - `id` (clé primaire)
  - `title` (titre du message)
  - `content` (contenu du message)
  - `category_id` (clé étrangère vers `categories`)
  - `created_at` (date de publication)
  - `votes_up` (nombre d’upvotes)
  - `votes_down` (nombre de downvotes)

- **Table `categories` (Catégories)**
  - `id` (clé primaire)
  - `name` (nom de la catégorie)

- **Table `tags` (Tags)**
  - `id` (clé primaire)
  - `name` (nom du tag)

- **Table `post_tags` (Relation entre posts et tags)**
  - `post_id` (clé étrangère vers `posts`)
  - `tag_id` (clé étrangère vers `tags`)

- **Table `messages` (Messagerie privée)**
  - `id` (clé primaire)
  - `sender` (expéditeur du message)
  - `receiver` (destinataire du message)
  - `content` (contenu du message)
  - `created_at` (date d'envoi)

- **Table `reports` (Signalement de messages)**
  - `post_id` (clé étrangère vers `posts`)
  - `reason` (raison du signalement)
  - `created_at` (date de signalement)

## Installation

1. Clonez ce dépôt :

   ```bash
   git clone https://github.com/username/forum-community.git
   cd forum-community

