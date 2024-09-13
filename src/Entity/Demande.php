<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
#[ApiResource]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $raisonSociale = null;

    #[ORM\Column(length: 60)]
    private ?string $nom = null;

    #[ORM\Column(length: 60)]
    private ?string $prenom = null;

    #[ORM\Column(length: 60)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseDepart = null;

    #[ORM\Column(length: 60)]
    private ?string $villeDepart = null;

    #[ORM\Column]
    private ?int $cpDepart = null;

    #[ORM\Column(length: 60)]
    private ?string $paysDepart = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseDestination = null;

    #[ORM\Column(length: 60)]
    private ?string $villeDestination = null;

    #[ORM\Column]
    private ?int $cpDestination = null;

    #[ORM\Column(length: 60)]
    private ?string $paysDestination = null;

    #[ORM\Column]
    private ?int $longueur = null;

    #[ORM\Column]
    private ?int $largeur = null;

    #[ORM\Column]
    private ?int $hauteur = null;

    #[ORM\Column]
    private ?int $poid = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeMarchandise = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): static
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresseDepart(): ?string
    {
        return $this->adresseDepart;
    }

    public function setAdresseDepart(string $adresseDepart): static
    {
        $this->adresseDepart = $adresseDepart;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(string $villeDepart): static
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getCpDepart(): ?int
    {
        return $this->cpDepart;
    }

    public function setCpDepart(int $cpDepart): static
    {
        $this->cpDepart = $cpDepart;

        return $this;
    }

    public function getPaysDepart(): ?string
    {
        return $this->paysDepart;
    }

    public function setPaysDepart(string $paysDepart): static
    {
        $this->paysDepart = $paysDepart;

        return $this;
    }

    public function getAdresseDestination(): ?string
    {
        return $this->adresseDestination;
    }

    public function setAdresseDestination(string $adresseDestination): static
    {
        $this->adresseDestination = $adresseDestination;

        return $this;
    }

    public function getVilleDestination(): ?string
    {
        return $this->villeDestination;
    }

    public function setVilleDestination(string $villeDestination): static
    {
        $this->villeDestination = $villeDestination;

        return $this;
    }

    public function getCpDestination(): ?int
    {
        return $this->cpDestination;
    }

    public function setCpDestination(int $cpDestination): static
    {
        $this->cpDestination = $cpDestination;

        return $this;
    }

    public function getPaysDestination(): ?string
    {
        return $this->paysDestination;
    }

    public function setPaysDestination(string $paysDestination): static
    {
        $this->paysDestination = $paysDestination;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): static
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->largeur;
    }

    public function setLargeur(int $largeur): static
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?int
    {
        return $this->hauteur;
    }

    public function setHauteur(int $hauteur): static
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getPoid(): ?int
    {
        return $this->poid;
    }

    public function setPoid(int $poid): static
    {
        $this->poid = $poid;

        return $this;
    }

    public function getTypeMarchandise(): ?string
    {
        return $this->typeMarchandise;
    }

    public function setTypeMarchandise(?string $typeMarchandise): static
    {
        $this->typeMarchandise = $typeMarchandise;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
