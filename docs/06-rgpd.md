# RGPD - CESIZen

## 1. Objectif

Ce document présente la manière dont CESIZen prend en compte la protection des données personnelles.

L’objectif est de limiter les données collectées, de sécuriser leur accès et de prévoir les droits des utilisateurs.

## 2. Données collectées

L’application collecte uniquement les données nécessaires au fonctionnement du service :

- email
- mot de passe chiffré
- réponses au diagnostic de stress
- résultat du diagnostic
- historique des diagnostics

Le diagnostic proposé par CESIZen ne constitue pas un diagnostic médical. Il s’agit d’un outil indicatif destiné à aider l’utilisateur à mieux comprendre son niveau de stress.

## 3. Finalité des données

Les données sont utilisées pour :

- créer et gérer le compte utilisateur
- permettre la connexion
- enregistrer les résultats du diagnostic
- afficher un historique à l’utilisateur

Les données ne sont pas utilisées à d’autres fins.

## 4. Minimisation

Les données collectées sont limitées à ce qui est nécessaire pour le fonctionnement de l’application.

Exemples :

- le mot de passe n’est pas stocké en clair
- aucune donnée médicale détaillée n’est demandée
- seules les réponses utiles au diagnostic sont enregistrées

## 5. Sécurité des données

Les mesures de sécurité prévues sont :

- mot de passe chiffré
- accès au compte protégé par authentification
- routes protégées
- validation des données côté serveur
- fichier `.env` non versionné
- accès administrateur limité

## 6. Conservation des données

Les données sont conservées tant que le compte utilisateur existe.

En cas de suppression du compte, les données associées doivent également être supprimées ou anonymisées.

## 7. Droits des utilisateurs

L’utilisateur doit pouvoir :

- accéder à ses informations
- modifier son profil
- demander la suppression de son compte
- demander la suppression de ses données associées

## 8. Points de vigilance

Certains points peuvent être améliorés dans une version future :

- ajouter une page dédiée à la politique de confidentialité
- formaliser la demande de suppression des données
- ajouter une durée de conservation plus précise
- renforcer l’information donnée à l’utilisateur avant le diagnostic

## 9. Conclusion

CESIZen applique les principes de base du RGPD :

- collecte limitée
- finalité claire
- accès sécurisé
- données protégées
- droits utilisateurs identifiés

Ces éléments permettent d’encadrer le traitement des données personnelles dans l’application.