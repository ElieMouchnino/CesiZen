# Présentation de l’architecture - CESIZen

## 1. Objectif

Ce document présente l’architecture technique de l’application CESIZen.

L’objectif est d’expliquer comment le projet est organisé, comment les différentes parties de l’application sont séparées et comment cette organisation facilite le déploiement, la maintenance et la sécurisation.

## 2. Type d’application

CESIZen est une application web développée avec Laravel.

L’application repose sur une architecture MVC :

- Modèle : gestion des données
- Vue : affichage des pages
- Contrôleur : traitement des requêtes et logique applicative

Cette architecture permet de séparer les responsabilités et de garder un projet plus simple à maintenir.

## 3. Organisation du dépôt

Le dépôt GitHub a été réorganisé afin de rendre le projet plus lisible.

La structure principale est la suivante :

- `backend/` : application Laravel
- `backend/app/` : contrôleurs, modèles, middlewares et services
- `backend/routes/` : routes de l’application
- `backend/resources/views/` : vues Blade
- `backend/database/` : migrations et base de données
- `backend/tests/` : tests automatisés
- `.github/workflows/` : intégration continue GitHub Actions
- `docs/` : documentation du projet

Cette organisation permet de distinguer clairement le code applicatif, la documentation et les outils d’automatisation.

## 4. Front et back

CESIZen n’est pas séparée en deux applications indépendantes.

Le projet utilise Laravel avec des vues Blade :

- le back est géré par Laravel
- le front est intégré dans Laravel avec les vues Blade

Le dossier `backend/` contient donc l’ensemble de l’application Laravel, y compris les vues.

Cette organisation reste cohérente avec le fonctionnement réel du projet.

## 5. Base de données

Le prototype utilise SQLite.

Les migrations Laravel permettent de créer et faire évoluer la structure de la base.

La base contient notamment :

- les utilisateurs
- les pages d’information
- les questions du diagnostic
- les réponses au diagnostic
- les résultats du diagnostic

SQLite est adapté au prototype, car il permet une installation simple et rapide.

Pour une production plus importante, une base comme MySQL ou PostgreSQL pourrait être envisagée.

## 6. Authentification et rôles

L’application intègre un système d’authentification.

Elle distingue plusieurs types d’accès :

- visiteur anonyme
- utilisateur connecté
- administrateur

Certaines routes sont protégées par authentification ou par middleware administrateur.

Cette séparation permet de limiter l’accès aux fonctionnalités sensibles.

## 7. Tests

Les tests sont placés dans :

```txt
backend/tests/
```

Ils permettent de vérifier les fonctionnalités principales de l’application :

- inscription
- connexion
- accès administrateur
- pages d’information
- diagnostic de stress
- historique du diagnostic

Les tests sont également lancés automatiquement via GitHub Actions.

## 8. Intégration continue

La CI est configurée dans :

```txt
.github/workflows/laravel-ci.yml
```

Elle permet de vérifier automatiquement que le projet s’installe correctement et que les tests passent.

Cette automatisation sécurise les modifications avant leur intégration dans la branche stable.

## 9. Apport pour le déploiement

Cette architecture facilite le déploiement car :

- les dépendances sont regroupées dans `backend/`
- les tests sont intégrés au projet
- la documentation est séparée du code
- la CI permet de valider les modifications
- le serveur web peut pointer uniquement vers `backend/public`

Cela permet de préparer un déploiement plus propre et plus sécurisé.

## 10. Conclusion

L’architecture de CESIZen est simple et adaptée au contexte du projet.

Elle permet de garder un code organisé, de faciliter la maintenance et de préparer le déploiement dans de bonnes conditions.