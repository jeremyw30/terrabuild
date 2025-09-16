


// Fichier d'initialisation JS pour le front-end Terrabuild

// Importe la fonction pour démarrer l'application Stimulus (framework JS léger)
import { startStimulusApp } from '@symfony/stimulus-bridge';

// Importe la liste des contrôleurs JS déclarés dans controllers.json
import controllers from './controllers.json';

// Démarre Stimulus et charge automatiquement tous les contrôleurs JS du projet
startStimulusApp(null, controllers);

// (optionnel) tu peux importer ici d'autres librairies front-end
// Exemple : import 'bootstrap'; pour activer Bootstrap JS
// Exemple : import './styles/app.scss'; pour importer du SCSS
