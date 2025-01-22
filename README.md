# Cahier des charges : BookFace

## Description du projet

**BookFace** est un forum communautaire permettant aux utilisateurs de poser des questions, partager leurs idées, commenter les publications, et discuter librement. L’application inclut un système d’utilisateurs, de votes sur les publications, et une organisation des contenus en catégories. Le projet sera structuré selon l'architecture MVC (Modèle-Vue-Contrôleur).

## Fonctionnalités principales

### Gestion des utilisateurs
- Inscription des utilisateurs avec un nom d’utilisateur unique et un mot de passe.
- Connexion et déconnexion.

### Gestion des publications
- Création de publications contenant un titre, un contenu et associées à une catégorie.
- Système de votes (upvotes et downvotes) sur les publications.
- Organisation des publications par catégories et affichage des publications les plus votées.

### Commentaires
- Possibilité d’ajouter des commentaires aux publications.
- Affichage des commentaires associés à chaque publication.

### Gestion des catégories
- Ajout et affichage de catégories.
- Association des publications à une catégorie.

## Architecture MVC

### Dossier `models`
Contient toutes les classes de modèles gérant les interactions avec la base de données (Users, Posts, Categories, Comments).

### Dossier `controllers`
Contient un seul fichier `MainController.php`, responsable de la gestion de toutes les requêtes (routes) et de la logique métier.

### Dossier `views`
Contient les fichiers d’interface utilisateur pour afficher les pages (inscription, connexion, publications, etc.).

## Structure de la base de données

### Table `users`
- `id` : Identifiant unique.
- `username` : Nom d’utilisateur unique.
- `password` : Mot de passe haché.
- `created_at` : Date de création.

### Table `categories`
- `id` : Identifiant unique.
- `name` : Nom de la catégorie.
- `created_at` : Date de création.

### Table `posts`
- `id` : Identifiant unique.
- `title` : Titre de la publication.
- `content` : Contenu de la publication.
- `user_id` : Référence à l’utilisateur auteur.
- `votes_up` : Nombre de votes positifs.
- `votes_down` : Nombre de votes négatifs.
- `category_id` : Référence à la catégorie.
- `created_at` : Date de création.

### Table `comments`
- `id` : Identifiant unique.
- `content` : Contenu du commentaire.
- `user_id` : Référence à l’utilisateur auteur.
- `post_id` : Référence à la publication.
- `created_at` : Date de création.


## Users Stories et critères d’acceptation

1. **En tant qu'utilisateur, je veux m'inscrire pour accéder aux fonctionnalités du forum.**
    - L'inscription demande un nom d’utilisateur unique et un mot de passe.
    - Un message d’erreur s’affiche si le nom d’utilisateur est déjà pris.

2. **En tant qu'utilisateur, je veux me connecter pour participer au forum.**
    - La connexion vérifie le nom d’utilisateur et le mot de passe.
    - Une session est créée une fois l’utilisateur connecté.

3. **En tant qu'utilisateur, je veux publier un message pour partager mes idées.**
    - La publication a un titre, un contenu et une catégorie.
    - La publication s’affiche dans le flux ou la catégorie correspondante.

4. **En tant qu'utilisateur, je veux commenter les publications pour participer aux discussions.**
    - Les commentaires apparaissent sous la publication associée.

5. **En tant qu'utilisateur, je veux voter sur les publications pour exprimer mon avis.**
    - Les boutons de vote mettent à jour le nombre d’upvotes ou de downvotes.

8. **En tant qu'utilisateur, je veux voir les publications les plus populaires pour découvrir les sujets tendance.**
    - Les publications peuvent être triées par nombre de votes.

## Technologies utilisées

- **Backend** : PHP (Modèle MVC).
- **Base de données** : MySQL.
- **Frontend** : HTML, CSS, JavaScript (pour les interactions comme les votes).

## Critères de performance

- Le site doit être fonctionnel sur les navigateurs modernes.
- Les temps de chargement des pages ne doivent pas dépasser 2 secondes.
- La base de données doit être normalisée pour éviter les redondances.

## Installation

Clonez ce dépôt :

```bash
git clone https://github.com/DevsAreAlsoHumans/BookFace.git
cd BookFace

