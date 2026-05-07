# Gestion de crise - CESIZen

## 1. Objectif

Ce document décrit la procédure à suivre en cas d’incident important sur l’application CESIZen.

L’objectif est de limiter l’impact sur les utilisateurs, de corriger rapidement le problème et de garder une trace claire de ce qui s’est passé.

## 2. Types d’incidents possibles

Les incidents peuvent être :

- bug bloquant
- erreur après déploiement
- accès administrateur non autorisé
- suspicion de faille de sécurité
- perte ou corruption de données
- indisponibilité de l’application

## 3. Qualification de l’incident

Avant d’agir, l’incident doit être qualifié.

| Niveau | Exemple | Action |
|---|---|---|
| Faible | problème d’affichage mineur | correction planifiée |
| Moyen | fonctionnalité secondaire en erreur | correction priorisée |
| Élevé | connexion impossible ou diagnostic bloqué | correction urgente |
| Critique | fuite de données ou accès non autorisé | réaction immédiate, correction prioritaire et rollback possible |

Cette qualification permet d’adapter la réaction à la gravité réelle du problème.

## 4. Répartition des rôles

Même sur un projet individuel, les responsabilités doivent être identifiées.

| Rôle | Responsabilité |
|---|---|
| Développeur | analyser, corriger, tester |
| Administrateur technique | vérifier la configuration et les logs |
| Responsable projet | prioriser, décider du rollback, communiquer |
| Utilisateurs concernés | être informés si l’incident les impacte |

Dans le cadre de CESIZen, ces rôles peuvent être portés par la même personne, mais ils restent distingués dans la méthode de traitement.

## 5. Étapes de traitement

En cas d’incident, les étapes sont les suivantes :

1. identifier le problème
2. vérifier l’environnement concerné
3. mesurer l’impact utilisateur
4. consulter les logs
5. reproduire le problème si possible
6. créer une carte Trello
7. qualifier la priorité
8. corriger sur la branche `develop`
9. valider sur la branche `test`
10. déployer sur `main`
11. vérifier le retour à la normale
12. documenter l’incident

## 6. Logs à consulter

Les logs Laravel se trouvent dans :

```txt
backend/storage/logs/
```

Ils permettent d’identifier :

- l’heure de l’erreur
- le message d’erreur
- la route concernée
- le contexte de l’incident

## 7. Escalade

Si l’incident ne peut pas être corrigé rapidement, il doit être escaladé.

L’escalade consiste à transmettre les informations utiles :

- description du problème
- impact constaté
- environnement concerné
- logs utiles
- actions déjà réalisées
- hypothèse de cause
- niveau de criticité

Cela permet à une autre personne technique de reprendre le diagnostic sans repartir de zéro.

## 8. Communication

En cas d’incident important, une communication simple doit être prévue.

Elle doit contenir :

- la nature du problème
- l’impact pour les utilisateurs
- les actions en cours
- la confirmation de résolution une fois le problème corrigé

L’objectif n’est pas de donner trop de détails techniques, mais d’informer clairement les personnes concernées.

## 9. Rollback

Si une mise à jour provoque un problème important, il faut revenir à la dernière version stable.

La version stable est identifiée par un tag Git, par exemple :

```txt
v1.0.0
```

Le rollback permet de rétablir rapidement une version fonctionnelle.

## 10. Retour d’expérience

Après résolution, l’incident doit être documenté.

La fiche doit contenir :

- date
- problème rencontré
- cause identifiée
- correction appliquée
- tests réalisés
- action préventive à prévoir

Ce retour d’expérience permet d’éviter que le même problème se reproduise.

## 11. Conclusion

La gestion de crise permet de réagir de manière structurée, sans corriger au hasard.

Elle limite les risques, facilite la communication et améliore la maintenance de l’application.