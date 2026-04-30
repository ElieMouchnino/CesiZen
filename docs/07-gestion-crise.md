# Gestion de crise - CESIZen

## 1. Objectif

Ce document décrit la réaction prévue en cas d’incident important sur l’application CESIZen.

L’objectif est de limiter l’impact sur les utilisateurs, de corriger rapidement le problème et de garder une trace de ce qui s’est passé.

## 2. Types d’incidents possibles

Les incidents peuvent être :

- bug bloquant
- accès administrateur non autorisé
- erreur après déploiement
- perte ou corruption de données
- suspicion de faille de sécurité
- indisponibilité de l’application

## 3. Étapes de traitement

En cas d’incident, les étapes sont les suivantes :

1. Identifier le problème
2. Vérifier l’environnement concerné
3. Mesurer l’impact
4. Consulter les logs
5. Reproduire le problème si possible
6. Corriger sur une branche dédiée
7. Lancer les tests
8. Déployer la correction
9. Vérifier que l’application fonctionne
10. Documenter l’incident

## 4. Qualification de la criticité

| Niveau | Exemple | Action |
|---|---|---|
| Faible | problème d’affichage mineur | correction planifiée |
| Moyen | fonctionnalité non bloquante en erreur | correction priorisée |
| Élevé | connexion impossible ou diagnostic bloqué | correction urgente |
| Critique | fuite de données ou accès non autorisé | réaction immédiate et rollback possible |

## 5. Logs à consulter

Les logs Laravel se trouvent dans :

```txt
backend/storage/logs/
```

Ils permettent d’identifier :

- l’heure de l’erreur
- le message d’erreur
- la route concernée
- le contexte de l’incident

## 6. Rollback

Si une mise à jour provoque un problème important, il faut revenir à la dernière version stable.

La version stable est identifiée par un tag Git, par exemple :

```txt
v1.0.0
```

Le rollback permet de rétablir rapidement une version fonctionnelle.

## 7. Communication

En cas d’incident, il faut informer les personnes concernées avec des informations simples :

- nature du problème
- impact constaté
- action en cours
- délai estimé de résolution si connu
- confirmation une fois le problème corrigé

## 8. Retour d’expérience

Après résolution, l’incident doit être documenté.

La fiche doit contenir :

- date
- problème rencontré
- cause identifiée
- correction appliquée
- tests réalisés
- action préventive à prévoir

## 9. Conclusion

La gestion de crise permet de réagir de manière structurée, sans corriger au hasard.

Elle limite les risques et facilite la maintenance de l’application.