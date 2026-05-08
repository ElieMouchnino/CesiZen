# Checklist sécurité - CESIZen

## 1. Objectif

Cette checklist sert à vérifier les points de sécurité essentiels avant une mise en production ou une livraison importante.

Elle permet de contrôler rapidement que l’application, la configuration, les données et l’environnement de déploiement respectent les bonnes pratiques prévues.

## 2. Accès et authentification

- [ ] Les mots de passe sont chiffrés
- [ ] Les utilisateurs non connectés ne peuvent pas accéder aux pages privées
- [ ] Les routes administrateur sont protégées
- [ ] Les rôles utilisateurs sont contrôlés
- [ ] La déconnexion fonctionne correctement
- [ ] La réinitialisation du mot de passe est vérifiée

## 3. Données et RGPD

- [ ] Les données collectées sont limitées au besoin de l’application
- [ ] Le mot de passe n’est jamais stocké en clair
- [ ] Les données du diagnostic sont protégées
- [ ] L’utilisateur peut accéder à ses informations
- [ ] La suppression d’un compte est prévue ou identifiée comme point d’amélioration
- [ ] Le diagnostic est présenté comme un outil indicatif, pas comme un diagnostic médical

## 4. Formulaires et entrées utilisateur

- [ ] Les données sont validées côté serveur
- [ ] Les formulaires sont protégés contre les attaques CSRF
- [ ] Les erreurs de saisie sont gérées proprement
- [ ] Les données affichées dans les vues sont échappées

## 5. Configuration

- [ ] Le fichier `.env` n’est pas versionné
- [ ] Le fichier `.env.example` est présent
- [ ] Le mode debug est désactivé en production
- [ ] Les variables sensibles ne sont pas exposées
- [ ] Les messages d’erreur ne révèlent pas d’informations sensibles

## 6. Base de données

- [ ] La base de données est sauvegardée avant une mise à jour
- [ ] Les migrations sont testées
- [ ] Les accès à la base ne sont pas exposés publiquement
- [ ] Une procédure de restauration existe

## 7. Déploiement Railway

- [ ] Le projet Railway est connecté au dépôt GitHub
- [ ] Les variables d’environnement sont configurées dans Railway
- [ ] `APP_DEBUG=false` est défini
- [ ] Le domaine public est généré
- [ ] Les logs Railway sont vérifiés
- [ ] La CI GitHub Actions est verte avant déploiement

## 8. Tests et CI

- [ ] Les tests automatisés passent
- [ ] La CI GitHub Actions est verte
- [ ] Les migrations passent dans l’environnement de test
- [ ] Les fonctionnalités principales sont vérifiées après déploiement

## 9. Logs et surveillance

- [ ] Les logs Laravel sont actifs
- [ ] Les erreurs critiques sont surveillées
- [ ] Les logs ne contiennent pas de mots de passe ou secrets
- [ ] Les anomalies importantes sont reportées dans Trello

## 10. Gestion d’incident

- [ ] Une procédure de gestion de crise existe
- [ ] Une procédure de rollback existe
- [ ] Un tag stable est disponible
- [ ] Les incidents importants sont documentés
- [ ] Une action préventive est prévue après résolution

## 11. Conclusion

Cette checklist permet de valider les principaux points de sécurité avant un déploiement.

Elle sert aussi de support de contrôle lors de la maintenance ou après une évolution importante.