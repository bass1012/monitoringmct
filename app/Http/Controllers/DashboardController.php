<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Méthode pour obtenir les états de service
    public function getServiceStatuses()
{
     // Définition des états de service sous forme de tableau
    $serviceStatuses = [
        // Exemple d'un état de service
        [
            'name' => 'RESEAU LOCAL',
            'status' => 'Perturbation',
            'description' => "
            <h3>Cause</h3>
            <li>Inadéquation des cables de brassage de la baie de la salle serveur.</li>
            <li>Câbles et prises reseaux vétuste effrités et apparents.</li>
            <li>Defaut de routeur pour la bonne couverture en reseau WIFI et INTERNET.</li>
            <li>Pas d'équipements secours pour les materiels coeurs du reseau.</li>

            <h3>Action recommandée</h3>
            <li>Changer, arranger de façon esthétique les câbles de brassage de la baie de la salle serveur</li>
            <li>Réhabilitation des câbles et prises reseaux dans certains bureaux (COMPTABILITE, BUREAU D'ETUDE, BUREAU DES CHEFS DE ZONES, BUREAU D'ETUDE ANNEXE).</li>
            <li>Approvisionnement en ROUTEUR WIFI.</li>
            <li>Créations d'un stock Backup de SWITCH, ROUTEUR, PDU, CABLE RESEAU, PANNEAU DE BRASSAGE.</li>
            
            "
        ],
        [
            'name' => 'RESEAU INTERNET',
            'status' => 'OK',
            'description' => 'Nous rencontrons un soucis technique. Qui sera resolu dans 30 minutes!'
        ],
        [
            'name' => 'SERVEUR DE SITE WEB "cloud" (www.mct.ci)',
            'status' => 'OK',
            'description' => "

            <p>Pour accéder au site web de MCT veuillez cliquer <a href=https://www.mct.ci>ici</a></p>

            
            "
        ],
        [
            'name' => 'SERVEUR DE SITE E-COMMERCE "cloud" (www.lkelectronics.ci / www.lkelectronics.net)',
            'status' => 'Maintenance',
            'description' => "

            <p>Pour accéder au site E-COMMERCE veuillez cliquer <a href=https://lkelectronics.ci/>ici</a></p>
            <h3>Cause</h3>
            <li>Moyen de payement indisponible</li>
            <h3>Action</h3>
            <li>Proposition d'un autre agreagateur de payement comme GREEN PAY en plus BIZAO CÔTE D'IVOIRE</li>
            
            "
        ],
        [
            'name' => 'SERVEUR DE MESSAGERIE "cloud" (newmail.mct.ci / webmail.mct.ci / mail.mct.ci)',
            'status' => 'OK',
            'description' => "<p>Pour accéder a la messagerie veuillez cliquer <a href=https://mail.mct.ci/>ici</a></p>"
        ],
        [
            'name' => 'SERVEUR DE MESSAGERIE NIGER "cloud"
            (mail.mct-niger.com)',
            'status' => 'OK',
            'description' => "<p>Pour accéder a la Messagerie de MCT NIGER veuillez cliquer <a href=https://webmail.mct-niger.com/>ici</a></p>"
        ],
        [
            'name' => 'SERVEUR VM 2 SAP B1 V10',
            'status' => 'Perturbation',
            'description' => "
            
            <p>L'accés a SAP depuis l'exterieur n'est pas encore disponible. Nous travaillons d'arrache-pied pour pallier à ce problème merci</p> 

            "
        ],
        [
            'name' => 'SERVEUR GMAO',
            'status' => 'Perturbation',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => "SERVEUR D'APPLICATION SMARTMAINTENANCE 'cloud'",
            'status' => 'Maintenance',
            'description' => "
            <h3>Cause</h3>
            <p>Moyen de payement indisponible</p>
            "
        ],
        [
            'name' => "SERVEUR HYPER V AD-DC (Controleur de domaine mctcarrier.ci) ET PARTAGE DE FICHIER",
            'status' => 'Perturbation',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => "SERVEUR AD-DC (Controleur de domaine mctsa.ci)",
            'status' => 'OK',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => "SERVEUR VM 1 DE BUREAU ET APPLICATION A DISTANCE",
            'status' => 'Perturbation',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        
        [
            'name' => 'IMPRIMANTE DE MCT SA',
            'status' => 'Perturbation',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => 'IMPRIMANTE DE LOCATION',
            'status' => 'OK',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => 'PARE-FEU RESEAU',
            'status' => 'OK',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],        
        [
            'name' => 'SERVEUR DE SAUVEGARDE',
            'status' => 'Perturbation',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => 'ANTI-VIRUS',
            'status' => 'Incident',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => 'SSL DES NOMS DE DOMAINE',
            'status' => 'OK',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => 'UPS DATACENTER (ONDULEUR)',
            'status' => 'Perturbation',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => 'DIVERS INTERVENTION',
            'status' => 'OK',
            'description' => 'Maintenance programmée le 27 mai 2023'
        ],
        [
            'name' => 'EQUIPEMENTS',
            'status' => 'Maintenance',
            'description' => ""
        ],
        
        // Ajoutez d'autres états de service ici
    ];

    return $serviceStatuses;
}

// Méthode pour afficher le tableau de bord
public function showDashboard()
{
    // Appel de la méthode pour obtenir les états de service
    $serviceStatuses = $this->getServiceStatuses();

    // Affichage de la vue 'dashboard' en passant les états de service à la vue
    return view('dashboard')->with('serviceStatuses', $serviceStatuses);
}

// Méthode pour mettre à jour l'état de service
public function updateServiceStatus(Request $request)
{
    // Validation des données entrées par l'administrateur
    $validatedData = $request->validate([
        'service_id' => 'required|integer',
        'status' => 'required|in:OK,Maintenance,Perturbation,Incident',
        'description' => 'nullable|string|max:255',
    ]);

    // Récupération des données validées
    $serviceId = $validatedData['service_id'];
    $status = $validatedData['status'];
    $description = $validatedData['description'];

    // Mise à jour des états de service dans la base de données
    $service = Service::find($serviceId);

    if ($service) {
        // Mise à jour de l'état de service
        $service->status = $status;
        $service->description = $description;
        $service->save();

        // Redirection vers la page du tableau de bord avec un message de succès
        return redirect()->route('dashboard')->with('success', 'État de service mis à jour avec succès.');
    } else {
        // Service non trouvé, rediriger avec un message d'erreur
        return redirect()->route('dashboard')->with('error', 'Service non trouvé.');
    }

}

}


