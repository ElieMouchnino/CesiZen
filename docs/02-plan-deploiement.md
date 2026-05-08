# Plan de déploiement - CESIZen

## 1. Objectif

Ce document décrit la stratégie de déploiement de l’application CESIZen.

L’objectif est de définir les outils, les environnements, les ressources et les étapes nécessaires afin de déployer l’application dans de bonnes conditions tout en limitant les risques.

## 2. Présentation du projet

CESIZen est une application web développée avec Laravel.

Le projet permet notamment :

- la création de comptes utilisateurs
- la connexion utilisateur
- l’accès à des pages d’information
- la réalisation d’un diagnostic de stress
- l’historisation des résultats

Le projet repose sur :

- Laravel
- PHP
- SQLite
- GitHub
- GitHub Actions
- Trello

## 3. Architecture de l’application

L’application suit une architecture MVC :

- Modèle : gestion des données
- Vue : affichage des pages
- Contrôleur : logique applicative

Le dépôt GitHub est organisé autour du dossier :

```txt
backend/
```

Ce dossier contient :

- le code Laravel
- les vues Blade
- les routes
- les migrations
- les tests
- la configuration

La documentation est séparée dans :

```txt
docs/
```

Cette organisation permet de distinguer :

- le code applicatif
- la documentation
- les outils d’automatisation

## 4. Solutions de déploiement envisagées

Plusieurs solutions ont été étudiées pour le déploiement de CESIZen.

| Solution | Avantages | Limites |
|---|---|---|
| Hébergement mutualisé PHP | simple et peu coûteux | peu flexible pour CI/CD |
| VPS Linux classique | environnement réaliste et complet | administration serveur plus complexe |
| Docker Compose | environnement reproductible et évolutif | plus technique à mettre en place |
| Render | déploiement simplifié | nécessite souvent Docker |
| Railway | intégration GitHub simple et rapide | dépendance à une plateforme externe |

## 5. Solution retenue

La solution retenue pour CESIZen est Railway.

Ce choix a été retenu car :

- il permet un déploiement depuis GitHub
- il évite la gestion manuelle d’un serveur Linux
- il reste adapté à un prototype Laravel
- il permet de démontrer une procédure de déploiement réelle
- il facilite la configuration des variables d’environnement

Railway permet également :

- de consulter les logs
- de gérer les variables d’environnement
- de générer une URL publique
- de relancer un déploiement rapidement

## 6. Environnements

### Environnement de développement

Utilisé pour :

- développer les fonctionnalités
- corriger les bugs
- exécuter les tests localement

Outils utilisés :

- Laragon
- PHP
- Composer
- SQLite
- Git

### Environnement de test

L’environnement de test correspond :

- à la branche `test`
- à la validation des fonctionnalités
- à l’exécution de la CI GitHub Actions

Cet environnement permet de vérifier :

- les tests automatisés
- les migrations
- la stabilité avant production

### Environnement de production

L’environnement de production correspond :

- à la branche `main`
- au déploiement Railway
- à la version stable de l’application

## 7. Gestion des versions

Le projet utilise Git et GitHub.

Les branches utilisées sont :

- `develop`
- `test`
- `main`

Workflow :

```txt
develop -> test -> main
```

Rôle des branches :

- `develop` : développement
- `test` : validation
- `main` : version stable

Les versions stables sont identifiées avec des tags Git :

```txt
v1.0.0
```

Cette organisation permet de limiter les risques avant mise en production.

## 8. Intégration continue

Le projet utilise GitHub Actions.

La CI permet :

- d’installer les dépendances
- d’exécuter les tests Laravel
- de vérifier la stabilité du projet

Le workflow est défini dans :

```txt
.github/workflows/laravel-ci.yml
```

La CI doit être verte avant toute mise en production.

## 9. Ressources nécessaires

Pour le développement local :

- PHP 8.2
- Composer
- Git
- SQLite
- Laragon

Pour le déploiement Railway :

- compte GitHub
- compte Railway
- dépôt GitHub configuré
- variables d’environnement Laravel

## 10. Variables d’environnement

Les variables sensibles sont stockées dans :

```txt
.env
```

Le fichier `.env` n’est jamais versionné.

Variables importantes :

```txt
APP_ENV=production
APP_DEBUG=false
APP_KEY=clé Laravel
APP_URL=url Railway
DB_CONNECTION=sqlite
```

Les variables sont configurées directement dans Railway.

## 11. Procédure de déploiement

### Préparation

Avant le déploiement :

- vérifier que la branche `main` est stable
- vérifier que la CI GitHub Actions est verte
- vérifier les tests
- vérifier les migrations
- vérifier les variables d’environnement

### Déploiement Railway

Étapes :

1. se connecter à Railway
2. créer un projet
3. connecter le dépôt GitHub
4. sélectionner le dépôt CESIZen
5. définir le dossier applicatif `backend`
6. configurer les variables d’environnement
7. lancer le déploiement
8. générer le domaine public
9. consulter les logs
10. tester l’application

## 12. Vérifications après déploiement

Après le déploiement :

- vérifier l’accès à l’application
- vérifier la connexion utilisateur
- vérifier le diagnostic
- vérifier l’administration
- vérifier les logs
- vérifier l’absence d’erreurs critiques

## 13. Sécurisation du déploiement

Plusieurs mesures sont appliquées :

- séparation des branches Git
- validation via CI
- variables sensibles non versionnées
- désactivation du mode debug
- tests automatisés
- procédure de rollback

## 14. Procédure de rollback

En cas de problème :

- identifier la dernière version stable
- revenir sur le tag Git stable
- relancer le déploiement Railway
- vérifier le retour à la normale

Le rollback permet de réduire le temps d’indisponibilité.

## 15. Évolutions possibles

Plusieurs évolutions pourront être envisagées :

- remplacement SQLite par MySQL ou PostgreSQL
- ajout de Docker
- automatisation plus avancée du déploiement
- surveillance avancée des logs
- monitoring applicatif