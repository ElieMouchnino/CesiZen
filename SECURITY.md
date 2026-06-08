# Politique de sécurité - CESIZen

La sécurité de l’application **CESIZen** est prise en compte dans le cadre du projet de déploiement, de maintenance et de sécurisation.

CESIZen est une application web Laravel permettant la gestion de comptes utilisateurs, la consultation de contenus d’information, la réalisation d’un diagnostic de stress et l’administration des contenus.

## Objectifs de sécurité

Les principaux objectifs de sécurité sont :

- Protéger l’accès aux fonctionnalités d’administration
- Éviter l’exposition d’informations sensibles
- Protéger les comptes utilisateurs
- Limiter les risques liés aux formulaires
- Sécuriser les mises à jour et le déploiement
- Assurer un suivi des incidents et corrections

## Mesures mises en place

### Authentification et accès

L’application utilise le système d’authentification Laravel.

Les fonctionnalités sensibles sont protégées par :

- Une authentification obligatoire
- Un middleware administrateur
- Un contrôle des rôles utilisateurs

### Protection des données

Les mots de passe ne sont pas stockés en clair.

Laravel applique un hachage des mots de passe avant leur enregistrement en base de données.

Les informations sensibles de configuration ne sont pas stockées dans le dépôt GitHub. Elles sont gérées avec des variables d’environnement, notamment sur Railway.

Exemples de variables concernées :

- `APP_KEY`
- `APP_ENV`
- `APP_DEBUG`
- `APP_URL`
- `DB_CONNECTION`
- `DB_DATABASE`

En production, `APP_DEBUG` doit être désactivé afin d’éviter l’affichage d’informations techniques sensibles.

### Formulaires et requêtes

Les formulaires utilisent :

- La protection CSRF de Laravel
- Des validations côté serveur
- Des contrôles sur les données envoyées par les utilisateurs

Ces vérifications permettent de limiter les risques liés aux données invalides, aux erreurs de format et aux injections.

### Déploiement et mises à jour

Le projet utilise GitHub, GitHub Actions et Railway.

La chaîne mise en place permet :

- De conserver l’historique du code
- De lancer automatiquement les tests
- De vérifier le bon fonctionnement de l’application avant déploiement
- De déployer l’application via Railway
- De consulter les logs en cas de problème
- De revenir à une version stable en cas d’incident

## Signaler une vulnérabilité

En cas de découverte d’une faille de sécurité, il ne faut pas créer d’issue publique.

La faille doit être signalée de manière privée au mainteneur du projet.

Informations à fournir :

- Type de vulnérabilité
- Page ou fonctionnalité concernée
- Étapes permettant de reproduire le problème
- Impact estimé
- Capture d’écran ou exemple si nécessaire

Exemples de vulnérabilités à signaler :

- Accès non autorisé à l’administration
- Contournement de l’authentification
- Faille XSS
- Problème CSRF
- Fuite d’informations sensibles
- Mauvaise gestion des sessions
- Exposition d’une variable d’environnement
- Dépendance vulnérable

## Délais de traitement

| Sévérité | Exemple | Première analyse | Correctif visé |
|---|---|---:|---:|
| Critique | Accès administrateur non autorisé, fuite de données sensibles | 24 h | 72 h |
| Élevée | Contournement partiel d’accès, faille exploitable | 3 jours | 2 semaines |
| Modérée | Erreur de validation, exposition limitée | 1 semaine | Prochaine version |
| Faible | Amélioration de configuration ou durcissement | 2 semaines | Selon priorité |

## Gestion des incidents

En cas d’incident de sécurité ou de déploiement, la procédure prévue est la suivante :

1. Analyser les logs Railway et Laravel
2. Identifier l’origine du problème
3. Évaluer l’impact
4. Corriger sur la branche de développement
5. Lancer les tests GitHub Actions
6. Redéployer l’application
7. Vérifier les parcours critiques
8. Clôturer le ticket de suivi

Si l’incident est bloquant, un retour à une version stable précédente peut être réalisé à partir de l’historique Git et des tags de version.

## Branches supportées

La branche `main` représente la version stable de l’application.

Les correctifs de sécurité sont appliqués en priorité sur cette branche.

Les branches `develop` et `test` servent respectivement au développement et à la validation avant mise en production.

## Données personnelles et RGPD

Le projet limite les données collectées aux besoins fonctionnels de l’application.

Les données concernées peuvent inclure :

- Nom ou identifiant utilisateur
- Adresse email
- Mot de passe haché
- Résultats de diagnostic 
- Historique utilisateur

Les principes appliqués sont :

- Collecte limitée aux besoins du projet
- Accès réservé aux utilisateurs autorisés
- Mots de passe hachés
- Configuration sensible non versionnée
- Suppression des données réelles du dépôt GitHub

Pour une mise en production réelle, des éléments complémentaires seraient à formaliser, notamment :

- Politique de confidentialité
- Durée de conservation des données
- Procédure de suppression de compte
- Registre de traitement
- Gestion complète des droits RGPD

## Veille de sécurité

La veille de sécurité repose sur :

- La documentation Laravel
- La documentation GitHub Actions
- La documentation Railway
- Les patchnotes des dépendances utilisées
- Les alertes de sécurité GitHub

L’objectif est d’identifier les correctifs, vulnérabilités et changements pouvant impacter la sécurité ou le déploiement de l’application.
