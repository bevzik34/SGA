<?php

namespace App\Controller\Api;

use App\Entity\Demande;
use App\Repository\DemandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DemandeController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/api/devis', name: 'api_create_demande', methods: ['POST'])]
    public function createDemande(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): JsonResponse
    {

        // Décoder les données JSON envoyées depuis Vue.js
        $data = json_decode($request->getContent(), true);

        // Vérification basique des données
        if (!isset($data['raisonSociale'], $data['nom'], $data['prenom'], $data['mail'], $data['telephone'])) {
            return new JsonResponse(['error' => 'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        // Créer une nouvelle instance de Demande
        $demande = new Demande();
        $demande->setRaisonSociale($data['raisonSociale']);
        $demande->setNom($data['nom']);
        $demande->setPrenom($data['prenom']);
        $demande->setMail($data['mail']);
        $demande->setTelephone($data['telephone']);
        $demande->setAdresseDepart($data['adresseDepart']);
        $demande->setVilleDepart($data['villeDepart']);
        $demande->setCpDepart($data['cpDepart']);
        $demande->setPaysDepart($data['paysDepart']);
        $demande->setAdresseDestination($data['adresseDestination']);
        $demande->setVilleDestination($data['villeDestination']);
        $demande->setCpDestination($data['cpDestination']);
        $demande->setPaysDestination($data['paysDestination']);
        $demande->setLongueur($data['longueur']);
        $demande->setLargeur($data['largeur']);
        $demande->setHauteur($data['hauteur']);
        $demande->setPoid($data['poid']);
        $demande->setTypeMarchandise($data['typeMarchandise'] ?? null);
        $demande->setCommentaire($data['commentaire'] ?? null);

        // Construire le contenu HTML de l'email
        $emailContent = '
<h1>Nouvelle demande</h1>
<p><strong>Raison Sociale :</strong> ' . htmlspecialchars($data['raisonSociale']) . '</p>
<p><strong>Nom :</strong> ' . htmlspecialchars($data['nom']) . '</p>
<p><strong>Prénom :</strong> ' . htmlspecialchars($data['prenom']) . '</p>
<p><strong>Email :</strong> ' . htmlspecialchars($data['mail']) . '</p>
<p><strong>Téléphone :</strong> ' . htmlspecialchars($data['telephone']) . '</p>
<h2>Adresse de départ</h2>
<p><strong>Adresse :</strong> ' . htmlspecialchars($data['adresseDepart']) . '</p>
<p><strong>Ville :</strong> ' . htmlspecialchars($data['villeDepart']) . '</p>
<p><strong>Code Postal :</strong> ' . htmlspecialchars($data['cpDepart']) . '</p>
<p><strong>Pays :</strong> ' . htmlspecialchars($data['paysDepart']) . '</p>
<h2>Adresse de destination</h2>
<p><strong>Adresse :</strong> ' . htmlspecialchars($data['adresseDestination']) . '</p>
<p><strong>Ville :</strong> ' . htmlspecialchars($data['villeDestination']) . '</p>
<p><strong>Code Postal :</strong> ' . htmlspecialchars($data['cpDestination']) . '</p>
<p><strong>Pays :</strong> ' . htmlspecialchars($data['paysDestination']) . '</p>
<h2>Détails de la marchandise</h2>
<p><strong>Longueur :</strong> ' . htmlspecialchars($data['longueur']) . ' m</p>
<p><strong>Largeur :</strong> ' . htmlspecialchars($data['largeur']) . ' m</p>
<p><strong>Hauteur :</strong> ' . htmlspecialchars($data['hauteur']) . ' m</p>
<p><strong>Poids :</strong> ' . htmlspecialchars($data['poid']) . ' kg</p>
<p><strong>Type de Marchandise :</strong> ' . htmlspecialchars($data['typeMarchandise'] ?? 'Non précisé') . '</p>
<p><strong>Commentaire :</strong> ' . nl2br(htmlspecialchars($data['commentaire'] ?? 'Aucun')) . '</p>
';

// Envoi de l'email
        $email = (new Email())
            ->to('contact@demo.fr')
            ->from($data['mail'])
            ->subject('Nouvelle demande de transport')
            ->html($emailContent);
        $mailer->send($email);


        // Persister la demande dans la base de données
        $entityManager->persist($demande);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Demande soumise avec succès'], Response::HTTP_CREATED);
    }
}
