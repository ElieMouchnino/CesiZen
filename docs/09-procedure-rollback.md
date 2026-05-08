# Procédure de rollback - CESIZen

## 1. Objectif

Ce document décrit la procédure permettant de revenir rapidement à une version stable de l’application en cas de problème après une mise à jour.

L’objectif est de limiter l’impact d’un incident et de rétablir rapidement une version fonctionnelle.

## 2. Quand utiliser le rollback

Le rollback peut être utilisé dans les situations suivantes :

- bug bloquant après mise à jour
- application inaccessible
- erreur critique après déploiement
- comportement inattendu
- problème de sécurité

Cette procédure permet de réduire le temps d’indisponibilité de l’application.

## 3. Principe

Le projet utilise des tags Git afin d’identifier les versions stables.

Exemple :

```txt
v1.0.0
```

Le rollback consiste à revenir à une version stable validée.

## 4. Étapes de rollback

1. identifier la dernière version stable
2. revenir sur le tag Git correspondant
3. réinstaller les dépendances
4. vérifier la configuration
5. restaurer les données si nécessaire
6. tester l’application
7. confirmer le retour à la normale

## 5. Commandes utilisées

```bash
git checkout v1.0.0
composer install --no-dev --optimize-autoloader
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan test
```

Ces commandes permettent de restaurer l’application dans un état stable.

## 6. Base de données

Si une erreur impacte les données, une sauvegarde peut être restaurée :

```bash
cp database/backup.sqlite database/database.sqlite
```

Les sauvegardes doivent être réalisées avant chaque mise à jour importante.

## 7. Vérification après rollback

Après le rollback, plusieurs éléments doivent être vérifiés :

- accès à l’application
- connexion utilisateur
- fonctionnement du diagnostic
- accès administrateur
- absence d’erreurs critiques

Les tests automatisés peuvent également être relancés afin de confirmer la stabilité du projet.

## 8. Documentation de l’incident

Après le rollback, l’incident doit être documenté :

- problème rencontré
- impact observé
- cause identifiée
- actions réalisées
- version restaurée

Cette documentation permet de garder un historique des incidents rencontrés.

## 9. Conclusion

La procédure de rollback permet de revenir rapidement à une version stable en cas de problème.

Elle réduit les risques liés aux mises à jour et améliore la continuité de service de l’application.

Sur Railway, le rollback peut aussi consister à redéployer une version stable du dépôt, identifiée par un tag Git ou par un commit connu comme fonctionnel.