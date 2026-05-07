# Fiche de préparation de déploiement - CESIZen

## 1. Objectif

Cette fiche permet de vérifier que tout est prêt avant de déployer l’application.

Elle sert de checklist rapide pour éviter les erreurs.

## 2. Code

- [ ] Le code est à jour
- [ ] La branche `main` est stable
- [ ] Les modifications sont validées sur `test`
- [ ] Le tag de version est créé

## 3. Tests

- [ ] Les tests passent
- [ ] La CI est verte
- [ ] Aucun bug critique connu

## 4. Configuration

- [ ] Le fichier `.env` est configuré
- [ ] Le mode debug est désactivé
- [ ] Les variables sensibles sont renseignées

## 5. Base de données

- [ ] La base est prête
- [ ] Les migrations sont à jour
- [ ] Une sauvegarde est réalisée

## 6. Serveur

- [ ] Le serveur est accessible
- [ ] PHP est installé
- [ ] Composer est installé
- [ ] Le serveur web est configuré
- [ ] HTTPS est activé

## 7. Déploiement

- [ ] Le code est récupéré
- [ ] Les dépendances sont installées
- [ ] Les migrations sont exécutées
- [ ] Le cache est généré

## 8. Vérification

- [ ] Le site est accessible
- [ ] Les fonctionnalités principales marchent
- [ ] Les erreurs sont vérifiées

## 9. Conclusion

Si tous les points sont validés, le déploiement peut être réalisé.