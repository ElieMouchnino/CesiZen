# Plan de sécurisation - CESIZen

## 1. Objectif

Ce document décrit les mesures mises en place pour sécuriser l’application CESIZen.

L’objectif est de protéger les données, les utilisateurs et le système contre les accès non autorisés et les attaques courantes.

## 2. Gestion des accès

L’application utilise un système d’authentification avec :

- création de compte
- connexion utilisateur
- mot de passe sécurisé

Les mots de passe sont stockés de manière chiffrée avec Laravel.

Certaines pages sont protégées :

- pages administrateur accessibles uniquement aux utilisateurs autorisés
- routes protégées via middleware

## 3. Validation des données

Toutes les données envoyées par les utilisateurs sont validées côté serveur.

Cela permet d’éviter :

- les erreurs de saisie
- les injections de données
- les comportements inattendus

## 4. Protection contre les attaques

Laravel intègre plusieurs protections :

- protection CSRF (formulaires sécurisés)
- protection contre les injections SQL via l’ORM
- échappement des données dans les vues Blade

## 5. Gestion des sessions

Les sessions utilisateurs sont sécurisées :

- stockage côté serveur
- identification de l’utilisateur connecté
- déconnexion possible

## 6. Configuration

Les données sensibles sont stockées dans le fichier `.env`.

Ce fichier :

- n’est pas versionné
- est spécifique à chaque environnement

Le mode debug est désactivé en production :

APP_DEBUG=false

## 7. Sécurité du serveur

Sur un serveur de production, les bonnes pratiques suivantes doivent être appliquées :

- utilisation de HTTPS
- limitation des ports ouverts
- accès SSH sécurisé
- mise à jour régulière du serveur

## 8. Sauvegarde

Les données doivent être sauvegardées régulièrement :

- base SQLite
- fichiers importants

## 9. Mises à jour

Les dépendances doivent être mises à jour régulièrement :

- framework Laravel
- bibliothèques PHP

Cela permet de corriger les failles de sécurité.

## 10. Logs

Les erreurs sont enregistrées dans les logs :

backend/storage/logs/

Ces logs permettent :

- d’identifier les erreurs
- de détecter des comportements suspects

## 11. Conclusion

La sécurisation repose sur :

- les protections intégrées de Laravel
- une bonne gestion des accès
- une validation des données
- une configuration adaptée
- une surveillance régulière

Cela permet de réduire les risques et de protéger l’application.