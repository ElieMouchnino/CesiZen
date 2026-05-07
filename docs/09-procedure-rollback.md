# Procédure de rollback - CESIZen

## 1. Objectif

Ce document décrit comment revenir rapidement à une version stable de l’application en cas de problème après un déploiement.

L’objectif est de restaurer une version fonctionnelle sans perdre de temps.

## 2. Quand utiliser le rollback

Le rollback est utilisé dans les cas suivants :

- bug bloquant après mise à jour
- application inaccessible
- erreur critique
- comportement inattendu
- problème de sécurité

## 3. Principe

Le projet utilise des tags Git pour identifier les versions stables.

Exemple :

```txt
v1.0.0
```

Le rollback consiste à revenir à une version stable identifiée.

## 4. Étapes

1. Identifier la dernière version stable
2. Se placer sur cette version
3. Réinstaller les dépendances
4. Vérifier la configuration
5. Tester l’application
6. Redémarrer le service

## 5. Commandes

```bash
git checkout v1.0.0
composer install --no-dev --optimize-autoloader
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan test
```

## 6. Base de données

Si nécessaire, restaurer une sauvegarde :

```bash
cp database/backup.sqlite database/database.sqlite
```

## 7. Vérification

Après rollback, vérifier :

- accès au site
- connexion utilisateur
- fonctionnement du diagnostic
- accès administrateur

## 8. Conclusion

La procédure de rollback permet de revenir rapidement à une version stable.

Elle limite les impacts en cas d’erreur lors d’un déploiement.