# Documentation sécurité - CESIZen

Ce document complète le fichier `SECURITY.md` du dépôt.

## Risques principaux identifiés

| Risque | Impact possible | Mesures mises en place |
|---|---|---|
| Accès non autorisé à l’administration | Modification non autorisée des contenus | Authentification Laravel, middleware admin |
| Exposition d’informations sensibles | Fuite de configuration ou d’erreurs techniques | Variables d’environnement, `APP_DEBUG=false` |
| Régression après mise à jour | Fonctionnalité cassée après évolution | GitHub Actions, tests automatisés |
| Données invalides dans les formulaires | Erreurs, incohérences ou injection | Validation côté serveur, CSRF |
| Erreur de déploiement | Application indisponible | Logs Railway, vérifications post-déploiement, rollback |
| Dépendance vulnérable | Risque de sécurité applicative | Veille, alertes GitHub, patchnotes |

## Parcours critiques à vérifier après déploiement

Après chaque déploiement, les éléments suivants doivent être contrôlés :

- Inscription utilisateur
- Connexion utilisateur
- Consultation des pages
- Réalisation du diagnostic
- Accès administrateur
- Consultation des logs Railway

## Procédure de correction

1. Créer ou mettre à jour un ticket Trello.
2. Identifier le type d’incident ou de correction.
3. Développer la correction sur `develop`.
4. Lancer les tests GitHub Actions.
5. Valider sur `test`.
6. Fusionner vers `main`.
7. Déployer sur Railway.
8. Vérifier les parcours critiques.
9. Clôturer le ticket.

## Bonnes pratiques de développement

- Ne pas versionner le fichier `.env`.
- Ne pas versionner une base de données contenant des données réelles.
- Utiliser les migrations Laravel pour gérer la structure de la base.
- Utiliser les validations serveur pour les formulaires.
- Garder `APP_DEBUG=false` en production.
- Vérifier les logs après chaque déploiement.
- Utiliser des messages de commit clairs.
- Identifier les versions stables avec des tags Git.
