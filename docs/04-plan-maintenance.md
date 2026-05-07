# Plan de maintenance - CESIZen

## 1. Objectif

Ce document décrit l’organisation de la maintenance de l’application CESIZen.

L’objectif est de garantir que l’application reste fonctionnelle, stable et sécurisée dans le temps, tout en facilitant les corrections et les évolutions.

## 2. Types de maintenance

Trois types de maintenance sont prévus.

### Maintenance corrective

La maintenance corrective consiste à corriger les problèmes détectés après la mise en ligne.

Exemples :
- erreur sur une page
- problème de connexion
- bug dans le diagnostic
- comportement inattendu

### Maintenance évolutive

La maintenance évolutive permet d’ajouter de nouvelles fonctionnalités ou d’améliorer l’existant.

Exemples :
- ajout de nouvelles questions au diagnostic
- amélioration de l’interface
- ajout de nouvelles pages
- amélioration de l’administration

### Maintenance préventive

La maintenance préventive vise à limiter les problèmes futurs.

Exemples :
- mise à jour des dépendances
- amélioration des performances
- nettoyage du code
- amélioration de la sécurité

## 3. Gestion des modifications

Les modifications suivent le workflow Git du projet :

develop -> test -> main

- `develop` : développement des fonctionnalités et corrections
- `test` : validation avant mise en production
- `main` : version stable

Chaque modification est validée avant intégration.

Cette organisation permet de limiter les risques avant déploiement.

## 4. Outil de ticketing

Le suivi des anomalies et des évolutions est réalisé avec Trello.

Le tableau Trello permet de :

- centraliser les demandes
- suivre l’avancement des tâches
- gérer les corrections
- organiser les évolutions

Les tâches sont réparties dans plusieurs colonnes :

- à faire
- en cours
- à tester
- terminé

Cet outil permet d’avoir une vision claire de l’état du projet et facilite le suivi des modifications.

## 5. Gestion des anomalies

Lorsqu’un problème est identifié :

1. création d’une carte Trello
2. analyse du problème
3. correction sur la branche `develop`
4. validation sur la branche `test`
5. mise en production sur `main`

Les cartes permettent de suivre :

- la description du problème
- l’état d’avancement
- les actions réalisées

## 6. Gestion des évolutions

Les évolutions fonctionnelles sont également suivies dans Trello.

Chaque demande peut contenir :

- une description
- une priorité
- les tâches associées
- les validations nécessaires

Les évolutions suivent ensuite le workflow du projet :

develop -> test -> main

## 7. Tests

Les tests automatisés permettent de vérifier le bon fonctionnement après chaque modification.

Commande :

~~~bash
php artisan test
~~~

Les tests sont également exécutés automatiquement via GitHub Actions.

Cela permet de vérifier rapidement qu’une modification ne casse pas une fonctionnalité existante.

## 8. Surveillance

Après mise en ligne, plusieurs éléments doivent être surveillés :

- les erreurs dans les logs
- le bon fonctionnement des pages principales
- les accès utilisateurs
- les performances générales

Logs Laravel :

backend/storage/logs/

Les logs permettent d’identifier rapidement les erreurs ou comportements anormaux.

## 9. Sauvegarde

La base de données doit être sauvegardée régulièrement.

~~~bash
cp database/database.sqlite database/backup.sqlite
~~~

Les sauvegardes permettent de restaurer rapidement l’application en cas de problème.

## 10. Mise à jour

Procédure de mise à jour :

~~~bash
git pull
composer install
php artisan migrate
php artisan test
~~~

Les mises à jour sont d’abord validées sur l’environnement de test avant intégration sur la branche principale.

## 11. Sécurité

La maintenance inclut également :

- correction des failles identifiées
- mise à jour des dépendances
- vérification des accès
- analyse des logs

Ces actions permettent de maintenir un niveau de sécurité cohérent dans le temps.

## 12. Veille technologique

Une veille technologique est réalisée afin de maintenir le projet à jour.

Les principales sources utilisées sont :

- documentation Laravel
- GitHub
- Stack Overflow
- documentation PHP

Cette veille permet :

- de suivre les mises à jour
- d’identifier les bonnes pratiques
- de repérer les failles de sécurité connues

## 13. Organisation

Le suivi du projet repose sur :

- Git pour le versioning
- GitHub pour l’historique et la CI
- Trello pour le suivi des tâches et anomalies

Cette organisation permet de garder un suivi clair des modifications réalisées sur le projet.

## 14. Conclusion

La maintenance de CESIZen repose sur :

- une gestion de versions claire
- des tests automatisés
- une intégration continue
- un suivi des anomalies
- une gestion des évolutions
- des sauvegardes régulières
- une veille technologique

Cette organisation permet de maintenir une application stable et plus simple à faire évoluer dans le temps.