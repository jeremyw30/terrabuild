
// Fichier principal JavaScript du projet Terrabuild

// Importe le fichier bootstrap.js (initialisation JS, Stimulus, etc.)
import './bootstrap.js';

/*
 * Ce fichier est le point d'entrée JS de l'application.
 * Il est inclus dans la page via importmap() dans base.html.twig.
 * Tous les imports JS et CSS globaux doivent être faits ici.
 */

// Importe le fichier CSS principal pour que Webpack Encore le compile et l'injecte
import './styles/app.css';

// Exemple de log pour vérifier que le JS est bien chargé
console.log('Ce log provient de assets/app.js - bienvenue sur AssetMapper ! 🎉');
