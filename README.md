# CESIZen

## Présentation du projet

CESIZen est une application web développée dans le cadre de la formation **Concepteur Développeur d'Applications (CESI)**.

L'objectif du projet est d'aider les utilisateurs à mieux comprendre leur niveau de stress grâce à des contenus d'information et à un questionnaire d'auto-évaluation.

Le projet a été réalisé dans le cadre du Bloc 2 : **Développer et tester les applications informatiques**, puis enrichi dans le cadre du Bloc 3 autour du déploiement, de la maintenance et de la sécurisation de l'application.

---

## Objectifs du projet

L'application CESIZen répond à plusieurs objectifs :

- sensibiliser les utilisateurs aux problématiques liées au stress ;
- proposer des contenus d'information accessibles ;
- permettre la réalisation d'un diagnostic de stress ;
- conserver l'historique des résultats obtenus ;
- fournir une interface d'administration pour gérer les contenus et le questionnaire.

---

## Fonctionnalités principales

### Gestion des utilisateurs

- Inscription
- Connexion et déconnexion
- Réinitialisation du mot de passe
- Gestion du profil utilisateur
- Consultation de l'historique des diagnostics

### Gestion des contenus

- Consultation des pages d'information
- Organisation des contenus par catégories
- Gestion des pages depuis l'administration

### Diagnostic de stress

- Questionnaire de diagnostic
- Calcul automatique du score
- Interprétation du résultat
- Enregistrement du diagnostic dans l'historique utilisateur

### Administration

- Gestion des pages
- Gestion des catégories
- Gestion des utilisateurs
- Gestion des questions du diagnostic
- Gestion des règles de résultats

---

## Architecture du projet

L'application repose sur une architecture **MVC (Model - View - Controller)** avec Laravel.

```text
Utilisateur
      ↓
Routes Laravel
      ↓
Contrôleurs
      ↓
Modèles Eloquent
      ↓
Base de données SQLite
      ↓
Vues Blade
```

Cette organisation permet de séparer clairement :

- la présentation des pages ;
- la logique métier ;
- l'accès aux données.

Le projet est organisé autour d'un dossier principal `backend/`, qui contient l'application Laravel.

---

## Choix d'architecture

Le projet utilise une architecture monolithique Laravel.

Ce choix est cohérent avec le besoin actuel du projet, car CESIZen est une application web centralisée dont les fonctionnalités sont fortement liées entre elles :

- comptes utilisateurs ;
- contenus d'information ;
- diagnostic ;
- historique ;
- administration.

Toutes ces fonctionnalités partagent la même authentification, les mêmes droits d'accès et la même base de données.

Une séparation frontend / backend aurait nécessité une API REST, la gestion des échanges entre deux applications, une configuration CORS et deux déploiements distincts, sans apporter de valeur fonctionnelle immédiate au projet.

L'architecture reste cependant évolutive. Si le besoin apparaît plus tard, Laravel pourra exposer une API REST afin de permettre l'utilisation d'un frontend séparé ou d'une application mobile.

---

## Technologies utilisées

| Domaine | Technologie |
|---|---|
| Framework | Laravel |
| Langage backend | PHP |
| Frontend | Blade, HTML5, CSS3, JavaScript |
| Base de données | SQLite |
| ORM | Eloquent |
| Build frontend | Vite |
| Gestion de versions | Git / GitHub |
| Intégration continue | GitHub Actions |
| Déploiement | Railway |
| Suivi projet | Trello |

---

## Déploiement et CI/CD

Le projet intègre une chaîne de déploiement simple et automatisée.

```text
Développeur
      ↓
GitHub
      ↓
GitHub Actions
      ↓
Tests automatisés
      ↓
Railway
      ↓
Application en ligne
```

GitHub Actions est utilisé pour l'intégration continue.

Le workflow permet notamment :

- l'installation des dépendances PHP ;
- l'installation des dépendances Node ;
- la compilation des assets frontend ;
- la préparation de l'environnement Laravel ;
- l'exécution des migrations ;
- le lancement des tests automatisés.

Railway est utilisé pour l'hébergement et le déploiement de l'application.

Les variables sensibles sont configurées dans Railway et ne sont pas stockées dans le dépôt GitHub.

---

## Organisation Git

Le projet utilise plusieurs branches afin de mieux organiser les évolutions :

| Branche | Rôle |
|---|---|
| `develop` | Développements et corrections en cours |
| `test` | Validation fonctionnelle et technique |
| `main` | Version stable et déployable |

Des tags Git peuvent être utilisés pour identifier les versions stables du projet, par exemple :

```text
v1.0.0
v1.0.1
```

---

## Maintenance

La maintenance du projet est organisée autour de trois types d'actions.

### Maintenance corrective

Correction des anomalies détectées après livraison ou lors de l'utilisation de l'application.

### Maintenance évolutive

Ajout de nouvelles fonctionnalités ou amélioration de fonctionnalités existantes.

### Maintenance préventive

Mise à jour des dépendances, amélioration du code, ajout de tests et renforcement de la sécurité.

Le suivi des demandes, corrections et évolutions est réalisé avec Trello.

---

## Sécurité

Plusieurs mécanismes de sécurité sont mis en place dans le projet :

- authentification Laravel ;
- middleware de protection des routes ;
- contrôle des rôles utilisateurs ;
- protection CSRF ;
- validation des formulaires côté serveur ;
- mots de passe hachés ;
- variables d'environnement non versionnées ;
- `APP_DEBUG` désactivé en production.

Pour plus de détails, consulter le fichier :

```text
SECURITY.md
```

---

## Installation locale

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js
- npm

### Installation

```bash
git clone https://github.com/ElieMouchnino/CesiZen
cd CesiZen/backend

composer install
npm install

cp .env.example .env

php artisan key:generate
php artisan migrate

npm run build

php artisan serve
```

L'application est ensuite accessible à l'adresse :

```text
http://127.0.0.1:8000
```

---

## Commandes utiles

```bash
php artisan serve
php artisan migrate
php artisan test
php artisan route:list
php artisan cache:clear
npm run build
```

---

## Évolutions envisagées

Plusieurs évolutions pourraient être envisagées :

- amélioration du diagnostic ;
- ajout de nouveaux contenus ;
- statistiques avancées ;
- amélioration de l'expérience utilisateur ;
- ajout d'une API REST ;
- séparation frontend / backend si le besoin le justifie ;
- migration vers PostgreSQL ou MySQL pour une utilisation plus importante.

---

## Auteur

**Elie Mouchnino**  
Formation Concepteur Développeur d'Applications - CESI  
Année 2025/2026
