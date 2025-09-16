
// Exemple de contrôleur Stimulus pour le front-end
// Un contrôleur Stimulus permet d'ajouter des comportements JS à des éléments HTML

import { Controller } from '@hotwired/stimulus';

/*
 * Ce contrôleur s'active sur tout élément ayant data-controller="hello"
 * Le nom "hello" est déduit du nom du fichier (hello_controller.js)
 *
 * À l'activation (connect), il modifie le texte de l'élément ciblé
 * Tu peux supprimer ce fichier ou le personnaliser pour tes besoins JS
 */
export default class extends Controller {
    // Méthode appelée automatiquement quand le contrôleur est attaché à l'élément
    connect() {
        // Modifie le texte de l'élément pour indiquer que Stimulus fonctionne
        this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
    }
}
