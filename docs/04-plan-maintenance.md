# Plan de maintenance - CESIZen

## 1. Objectif

Ce document décrit comment maintenir l’application CESIZen dans le temps.

L’objectif est de garantir que l’application reste fonctionnelle, stable et évolutive après sa mise en ligne.

## 2. Types de maintenance

Trois types de maintenance sont prévus.

### Maintenance corrective

Correction des bugs détectés après la mise en production.

Exemples :
- erreur sur une page
- problème de connexion
- bug dans le diagnostic

### Maintenance évolutive

Ajout de nouvelles fonctionnalités ou amélioration de l’existant.

Exemples :
- ajout de nouvelles questions
- amélioration de l’interface
- ajout de nouvelles pages

### Maintenance préventive

Amélioration du système pour éviter les problèmes futurs.

Exemples :
- mise à jour des dépendances
- amélioration des performances
- nettoyage du code

## 3. Gestion des modifications

Les modifications passent par les branches Git :

develop -> test -> main

- développement sur `develop`
- validation sur `test`
- mise en production sur `main`

Chaque modification est validée avant d’être intégrée.

## 4. Tests

Les tests automatisés permettent de vérifier le bon fonctionnement après chaque modification.

Commande :

~~~bash
php artisan test
~~~

Les tests sont aussi lancés automatiquement via la CI.

## 5. Surveillance

Après mise en ligne, il faut surveiller :

- les erreurs dans les logs
- le bon fonctionnement des pages principales
- les accès utilisateurs
- les performances

Logs Laravel :

backend/storage/logs/

## 6. Sauvegarde

La base doit être sauvegardée régulièrement.

~~~bash
cp database/database.sqlite database/backup.sqlite
~~~

## 7. Mise à jour

Procédure de mise à jour :

~~~bash
git pull
composer install
php artisan migrate
php artisan test
~~~

## 8. Sécurité

La maintenance inclut :

- correction des failles
- mise à jour des dépendances
- vérification des accès

## 9. Organisation

Le suivi se fait via :

- Git (historique)
- GitHub (versions)
- branches du projet

## 10. Conclusion

La maintenance repose sur :

- des tests
- une gestion de versions claire
- des sauvegardes régulières
- une surveillance continue

Cela permet de garantir la stabilité de l’application.