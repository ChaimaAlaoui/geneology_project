# Système de Modification de Généalogie

### Création d'un Utilisateur pour la Connexion

Pour créer un utilisateur pour la connexion, exécutez la commande Artisan suivante pour peupler la base de données :

__php artisan db:seed --class=UsersTableSeeder__


Cela va créer un utilisateur admin avec les identifiants suivants :

Email : admin@admin.com
Mot de passe : 123
Vous pourrez ensuite vous connecter en utilisant ces identifiants.

## Structure de la Base de Données

Pour visualiser le schéma de la base de données qui supporte la fonctionnalité de ce système, veuillez consulter le lien suivant pour voir le schéma sur dbdiagram.io :

[Schéma de la Base de Données de la Généalogie](https://dbdiagram.io/d/67ba5a30263d6cf9a01bdcc6)


## Évolution des Données

Les données évoluent au fil du temps de la manière suivante :

1. **Proposition de Modification** :
   - Un utilisateur (par exemple, `jean01`) propose une modification des données, comme la mise à jour d'une relation entre lui et son enfant. Cette proposition est ajoutée à la table `modification_proposals`, indiquant le type de modification (par exemple, relation), la cible (par exemple, ID de la relation) et la nouvelle valeur proposée.
   
2. **Vote sur les Modifications** :
   - D'autres utilisateurs (par exemple, `rose03`, `marie02`) peuvent voter sur la proposition. Leurs votes sont enregistrés dans la table `modification_votes`, où ils expriment leur accord ou désaccord avec la modification proposée. Chaque vote comprend l'ID de l'utilisateur, l'ID de la proposition et le résultat du vote.

3. **Validation des Modifications** :
   - Une fois qu'un nombre suffisant de votes est recueilli (selon les règles du système), la modification est validée. La table `modification_proposals` est mise à jour avec le statut final de la proposition, et les données pertinentes dans les tables `people` ou `relationships` sont mises à jour pour refléter le changement. Si la proposition concerne une relation, la table `relationships` est mise à jour avec le nouveau statut de la relation.

4. **Suivi des Changements** :
   - Chaque modification est horodatée et enregistrée dans les colonnes `created_at` et `updated_at` pour garantir une traçabilité complète. Cela permet au système de suivre l'évolution de chaque modification et aux utilisateurs de comprendre quand et pourquoi les changements ont été effectués.

Cette structure garantit que le processus de modification est transparent, vérifiable et traçable, tout en permettant aux utilisateurs de proposer, voter et valider des changements de manière collaborative et contrôlée.



