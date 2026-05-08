# Fiche de préparation de déploiement - CESIZen

## 1. Objectif

Cette fiche permet de vérifier que tous les éléments nécessaires au déploiement sont prêts avant une mise en production.

Elle sert de contrôle rapide afin de limiter les erreurs et sécuriser le déploiement.

## 2. Code source

- [ ] Le code est à jour
- [ ] La branche `main` est stable
- [ ] Les modifications ont été validées sur `test`
- [ ] Le dépôt GitHub est accessible
- [ ] Le tag de version a été créé

## 3. Intégration continue

- [ ] La CI GitHub Actions est verte
- [ ] Les tests automatisés passent
- [ ] Les migrations passent correctement
- [ ] Aucun échec critique n’est présent

## 4. Configuration

- [ ] Le fichier `.env` est configuré
- [ ] Le fichier `.env` n’est pas versionné
- [ ] Le mode debug est désactivé
- [ ] Les variables sensibles sont renseignées
- [ ] La clé d’application Laravel est générée

## 5. Base de données

- [ ] La base de données est disponible
- [ ] Les migrations sont à jour
- [ ] Une sauvegarde récente existe
- [ ] Une procédure de restauration est disponible

## 6. Serveur

- [ ] Le projet Railway est créé
- [ ] Le dépôt GitHub est connecté à Railway
- [ ] Les variables d’environnement sont configurées
- [ ] Le dossier d’application `backend` est pris en compte
- [ ] Le domaine public Railway est généré
- [ ] Les logs de déploiement sont vérifiés

## 7. Sécurité

- [ ] Les accès administrateur sont vérifiés
- [ ] Les routes protégées fonctionnent
- [ ] Les mots de passe sont chiffrés
- [ ] Les protections CSRF sont actives
- [ ] Les logs Laravel sont accessibles

## 8. Vérification fonctionnelle

- [ ] L’application démarre correctement
- [ ] La connexion utilisateur fonctionne
- [ ] Le diagnostic fonctionne
- [ ] Les pages d’information sont accessibles
- [ ] L’administration fonctionne

## 9. Rollback

- [ ] Une version stable est identifiée
- [ ] Un tag Git est disponible
- [ ] La procédure de rollback est documentée
- [ ] Les sauvegardes sont disponibles

## 10. Conclusion

Si tous les points sont validés, le déploiement peut être réalisé dans de bonnes conditions.