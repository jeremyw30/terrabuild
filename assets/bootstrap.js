

// assets/bootstrap.js

import { startStimulusApp } from '@symfony/stimulus-bridge';
import controllers from './controllers.json';

// Démarre Stimulus avec l’autodiscovery des contrôleurs
startStimulusApp(null, controllers);

// (optionnel) tu peux importer d’autres libs front ici
// import 'bootstrap';
// import './styles/app.scss';
