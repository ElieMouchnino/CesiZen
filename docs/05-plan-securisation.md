# Plan de sécurisation - CESIZen

## 1. Objectif

Ce document décrit les mesures mises en place pour sécuriser l’application CESIZen.

L’objectif est de limiter les risques liés aux accès non autorisés, aux erreurs de configuration et aux attaques courantes sur une application web.

## 2. Gestion des accès

L’application utilise un système d’authentification Laravel avec :

- création de compte
- connexion utilisateur
- gestion de session
- réinitialisation du mot de passe

Les mots de passe sont stockés de manière chiffrée.

Certaines routes sont protégées via middleware :

- accès administrateur limité
- accès utilisateur authentifié

## 3. Validation des données

Toutes les données envoyées par les utilisateurs sont validées côté serveur.

Cela permet de limiter :

- les erreurs de saisie
- les injections de données
- les comportements inattendus

Les formulaires utilisent également la protection CSRF intégrée à Laravel.

## 4. Analyse des risques

| Risque | Criticité | Mesure mise en place |
|---|---|---|
| accès non autorisé | élevée | authentification + middleware |
| injection SQL | moyenne | ORM Laravel |
| perte de données | élevée | sauvegardes régulières |
| mauvaise configuration | moyenne | sécurisation du fichier `.env` |
| divulgation d’informations sensibles | élevée | désactivation du mode debug |

Cette analyse permet d’identifier les principaux risques liés au projet.

## 5. Mesures préventives

Plusieurs mesures sont mises en place afin de limiter les risques :

- validation des données côté serveur
- protection CSRF
- utilisation de l’ORM Laravel
- séparation des rôles utilisateurs
- fichier `.env` non versionné
- mode debug désactivé en production
- organisation claire du projet

Ces mesures permettent de réduire les risques avant qu’un incident ne se produise.

## 6. Mesures correctives

En cas de problème de sécurité :

- identification du problème
- analyse des logs
- correction sur branche `develop`
- validation sur `test`
- mise en production sur `main`

Les dépendances sont également mises à jour régulièrement afin de corriger les failles connues.

## 7. Protection des données

Les données sensibles sont limitées au strict nécessaire :

- email
- mot de passe chiffré
- réponses au diagnostic

Le fichier `.env` contient les informations sensibles de configuration.

Il n’est jamais versionné dans Git.

## 8. Sécurité de l’environnement de déploiement

Sur Railway, la sécurité repose notamment sur :

- la configuration des variables d’environnement dans l’interface Railway
- la désactivation du mode debug en production
- la vérification des logs de déploiement
- l’exposition uniquement de l’application web
- la génération d’une URL publique via Railway

Le fichier `.env` ne doit pas être versionné dans Git.

## 9. Gestion de crise

En cas d’incident de sécurité :

1. identification du problème
2. analyse de l’impact
3. consultation des logs
4. correction du problème
5. validation des corrections
6. déploiement du correctif

### Communication

En cas d’incident important :

- informer les utilisateurs concernés
- expliquer le problème identifié
- indiquer les actions en cours
- confirmer la résolution une fois le problème corrigé

Une communication claire permet de limiter l’impact de l’incident.

## 10. Bonnes pratiques de développement

Le projet applique plusieurs bonnes pratiques :

- architecture MVC
- séparation des responsabilités
- validation des données
- tests automatisés
- utilisation du versioning Git
- intégration continue avec GitHub Actions

Ces pratiques facilitent la maintenance et limitent les risques.

## 11. Surveillance

Les logs Laravel permettent de surveiller les erreurs :

backend/storage/logs/

Ils permettent notamment :

- d’identifier les erreurs
- de détecter des comportements anormaux
- d’aider au diagnostic en cas d’incident

## 12. Conclusion

La sécurisation de CESIZen repose sur :

- les protections intégrées de Laravel
- une gestion des accès adaptée
- des mesures préventives
- une organisation du projet claire
- une surveillance régulière

Ces éléments permettent de réduire les risques et d’améliorer la sécurité globale de l’application.