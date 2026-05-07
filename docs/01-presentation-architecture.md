# Présentation de l’architecture - CESIZen

## 1. Objectif

Ce document présente l’architecture technique de l’application CESIZen.

L’objectif est de comprendre comment l’application est organisée et comment les différentes parties communiquent entre elles.

## 2. Type d’application

CESIZen est une application web développée avec le framework Laravel.

L’application repose sur une architecture MVC (Modèle - Vue - Contrôleur).

## 3. Structure du projet

Le projet est organisé de la manière suivante :

- `backend/` : application Laravel
- `backend/app/` : logique métier (contrôleurs, modèles, services)
- `backend/routes/` : définition des routes
- `backend/resources/views/` : interface utilisateur (Blade)
- `backend/database/` : migrations et base de données
- `backend/tests/` : tests automatisés
- `.github/workflows/` : intégration continue
- `docs/` : documentation

## 4. Architecture MVC

### Modèle

Les modèles représentent les données de l’application.

Exemples :
- User
- Page
- DiagnosticQuestion
- DiagnosticSubmission

Ils sont utilisés pour interagir avec la base de données via l’ORM Laravel.

### Vue

Les vues sont gérées avec Blade.

Elles permettent d’afficher les pages de l’application :

- pages d’information
- formulaire de diagnostic
- résultats
- interface administrateur

### Contrôleur

Les contrôleurs gèrent la logique entre les modèles et les vues.

Ils traitent les requêtes et retournent les réponses.

## 5. Base de données

La base de données utilisée est SQLite.

Elle contient notamment :

- utilisateurs
- pages
- questions de diagnostic
- réponses
- résultats

Les migrations permettent de créer et modifier la structure de la base.

## 6. Authentification

L’application dispose d’un système d’authentification :

- inscription
- connexion
- gestion de session

Certaines routes sont protégées et accessibles uniquement aux utilisateurs connectés ou administrateurs.

## 7. Tests

Des tests automatisés sont présents dans :

backend/tests/

Ils permettent de vérifier les fonctionnalités principales.

## 8. CI

Une intégration continue est mise en place avec GitHub Actions.

Elle lance automatiquement les tests à chaque modification du code.

## 9. Conclusion

L’architecture est simple et adaptée à un projet web Laravel.

Elle permet une bonne organisation du code et facilite la maintenance.