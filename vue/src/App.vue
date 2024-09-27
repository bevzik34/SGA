<template>
  <video autoplay muted loop class="video-content">
    <source src="/backgroundServices.mp4" type="video/mp4">
    Votre navigateur ne supporte pas la balise vidéo.
  </video>
  <div id="navBar" class="position-fixed w-100">
    <!-- Conteneur pour le numéro de téléphone -->
    <div class="d-flex justify-content-center bg-light text-center py-2">
      <span class="telTopBar font-weight-bold mx-3">Loris : <a class="telTopBar" href="tel:+330764191017">07 64 19 10 17</a></span>
      <span class="telTopBar font-weight-bold mx-3">Ali : <a class="telTopBar" href="tel:+330661771764">06 61 77 17 64</a></span>
      <span class="telTopBar font-weight-bold mx-3">Arnaud : <a class="telTopBar" href="tel:+330782457041">07 82 45 70 41</a></span>
    </div>

    <!-- bouton de demande de devis -->
    <div id="navBarBackground" class="d-flex justify-content-center  text-center py-2">
      <a id="demandeDevis" href="#" data-bs-toggle="modal" data-bs-target="#devisModal">Demande de devis</a>
    </div>
  </div>

  <!-- Modal de demande de devis-->
  <div class="modal fade" id="devisModal" tabindex="-1" aria-labelledby="devisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="devisModalLabel">Demande de Devis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Formulaire -->
          <form @submit.prevent="submitForm" id="devisForm">
            <div class="mb-3" v-for="(field, key) in formFields" :key="key">
              <label :for="key" class="form-label">{{ field.label }}
                <span v-if="field.required" class="required-star">*</span></label>
              <input v-if="!field.isTextArea" :type="field.type" v-model="form[key]" :id="key" class="form-control" :required="field.required">
              <textarea v-else v-model="form[key]" :id="key" class="form-control" :rows="4" :required="field.required"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary" form="devisForm">Envoyer la demande</button>
        </div>
      </div>
    </div>
  </div>

  <div class="content d-flex justify-content-center">
    <div class="logo fade-in">
      <img src="/img/SVGLogo.svg" alt="Logo de l'entreprise">
    </div>
  </div>

  <div class="sections">

    <div :class="clicked2 ? 'aPropos1' : 'aPropos3'" >
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h2 @click="toggleClicked2" id="aProposTitle" class="display-4">Nos Services</h2>
        <div v-if="clicked2" id="aProposDesc" :class="clicked2 ? 'sectionTitleShow' : 'sectionTitle'">

          <div class="container py-5" id="services">
            <div class="row text-center mb-4">
              <div class="col">

                <p class="lead">
                  Chez <strong>SGA</strong>, nous proposons une gamme complète de <em>services de transport de marchandises</em> adaptés à vos besoins. Que vous ayez des palettes ou des marchandises spécifiques, nous avons la solution parfaite.
                </p>
              </div>
            </div>
            <div class="row">
              <!-- Transport de palettes -->
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <h5 class="card-title">Transport de Palettes</h5>
                    <p class="card-text">
                      Notre <em>service de transport de palettes</em> est conçu pour assurer la sécurité et la rapidité de vos envois nationaux et internationaux, avec des options flexibles pour répondre à vos besoins.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Transport express -->
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <h5 class="card-title">Transport Express</h5>
                    <p class="card-text">
                      Besoin d'une <em>livraison rapide</em> ? Notre service de <em>transport express</em> vous garantit une prise en charge immédiate et une livraison dans les plus brefs délais, où que vous soyez.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Logistique et gestion de fret -->
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <h5 class="card-title">Logistique et Gestion de Fret</h5>
                    <p class="card-text">
                      En tant que spécialistes de la <em>logistique et de l'affrètement</em>, nous optimisons la gestion de vos flux de marchandises tout en respectant vos contraintes de temps et de budget.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Transport multimodal -->
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <h5 class="card-title">Transport Multimodal</h5>
                    <p class="card-text">
                      Profitez de solutions flexibles grâce à notre <em>service de transport multimodal</em>, combinant transport routier, maritime, aérien et ferroviaire pour vos expéditions de marchandises à l'international.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Services personnalisés -->
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <h5 class="card-title">Services Personnalisés</h5>
                    <p class="card-text">
                      Chaque besoin est unique. Nos <em>solutions de transport sur mesure</em> sont conçues en fonction de vos exigences spécifiques, garantissant des services adaptés à vos marchandises et destinations.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Suivi et tracking en temps réel -->
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <h5 class="card-title">SAV de qualité</h5>
                    <p class="card-text">
                      Notre service après-vente (SAV) est à votre écoute pour résoudre rapidement vos demandes ou incidents après l’expédition de vos marchandises.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Conclusion -->
              <div class="col-md-12 text-center mt-4">
                <p class="lead">
                  Faites confiance à <strong>SGA</strong> pour vos besoins en <em>transport de marchandises</em>, que ce soit pour une palette ou un chargement complet. Notre expertise vous assure un service de qualité, en France et à l'international.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div :class="clicked ? 'aPropos1' : 'aPropos2'" >
    <div class="d-flex flex-column justify-content-center align-items-center">
      <h2 @click="toggleClicked" id="aProposTitle" class="display-4">À propos</h2>
      <div v-if="clicked" id="aProposDesc" :class="clicked ? 'sectionTitleShow' : 'sectionTitle'">
        <p>
          <strong>SGA</strong> est une entreprise spécialisée dans <em>le transport de marchandises</em> sur palettes, assurant un service fiable et rapide pour répondre à vos besoins logistiques. Que vous ayez une seule palette ou des chargements plus importants, notre équipe dynamique et expérimentée s'engage à vous offrir une <em>solution de transport</em> sur mesure.
        </p>
        <p>
          Grâce à notre expertise en <em>transport multimodal</em> (routier, maritime, aérien et ferroviaire), nous couvrons aussi bien les besoins nationaux qu'internationaux. Notre réseau de partenaires et notre réactivité nous permettent de gérer efficacement toutes les demandes, même urgentes, avec un souci constant de la satisfaction client.
        </p>
        <p>
          Faites confiance à <strong>SGA</strong> pour assurer le <em>transport de vos palettes</em> et autres marchandises dans des conditions optimales de sécurité et de délais.
        </p>

      </div>
    </div>
  </div>




    <div :class="clicked3 ? 'aPropos1' : 'aPropos2'" >
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h2 @click="toggleClicked3" id="aProposTitle" class="display-4">Temoignages</h2>
        <div v-if="clicked3" id="aProposDesc" :class="clicked3 ? 'sectionTitleShow' : 'sectionTitle'">
          <div class="container py-5" id="testimonials">
            <div class="row text-center mb-4">
              <div class="col">
                <h2 class="display-4">Ce que disent nos clients</h2>
                <p class="lead">Découvrez les avis de nos clients satisfaits par nos services de transport et de logistique.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <p class="card-text">
                      <em>"Service impeccable ! Mon transport de palettes a été rapide et bien organisé. Je recommande vivement SGA."</em>
                    </p>
                    <footer class="blockquote-footer">Jean Dupont</footer>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <p class="card-text">
                      <em>"Transport international sans accroc, SGA a parfaitement géré la logistique de A à Z. Très professionnel."</em>
                    </p>
                    <footer class="blockquote-footer">Marie Leroy</footer>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                  <div class="card-body">
                    <p class="card-text">
                      <em> "Nous avons fait appel à cette entreprise pour un transport de marchandises urgentes, et nous avons été impressionnés par leur réactivité. Non seulement nos palettes ont été livrées dans les temps, mais l'équipe a également été très professionnelle tout au long du processus. Le suivi client est remarquable, et nous nous sentons en sécurité en travaillant avec eux."</em>
                    </p>
                    <footer class="blockquote-footer">Karim Mohamed</footer>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div :class="clicked4 ? 'aPropos1' : 'aPropos2'" >
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h2 @click="toggleClicked4" id="aProposTitle" class="display-4">F.A.Q</h2>
        <div v-if="clicked4" id="aProposDesc" :class="clicked4 ? 'sectionTitleShow' : 'sectionTitle'">
          <div class="container py-5" id="faq">
            <div class="row text-center mb-4">
              <div class="col">

                <p class="lead">Retrouvez ici les réponses à vos questions fréquentes concernant nos services de transport de marchandises.</p>
              </div>
            </div>
            <div class="accordion" id="faqAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Comment fonctionne le transport de palettes ?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Nous assurons le transport de vos palettes en toute sécurité grâce à nos solutions de logistique fiables et rapides. Nos véhicules sont adaptés pour différents volumes de marchandises.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Quels sont les délais pour un transport express ?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Les délais dépendent de la destination. En général, pour un transport express national, nous pouvons livrer dans les 24 à 48 heures. Pour les envois internationaux, le délai varie selon la distance.
                  </div>
                </div>
              </div>

              <!-- Question 3 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Quelle est la capacité maximale de poids pour une palette ?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    La capacité maximale dépend du type de transport et de la réglementation en vigueur. En général, une palette standard peut supporter jusqu'à 1 200 kg, mais cela peut varier selon les spécifications de la commande.
                  </div>
                </div>
              </div>

              <!-- Question 4 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Comment puis-je suivre mon expédition ?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Vous pouvez suivre votre expédition grâce à notre système de suivi en ligne. Un numéro de suivi vous sera fourni une fois la commande expédiée, vous permettant de connaître son statut en temps réel.
                  </div>
                </div>
              </div>

              <!-- Question 5 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Quels types de marchandises transportez-vous ?
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Nous transportons tous types de marchandises, y compris des produits fragiles, des palettes industrielles, des matériaux lourds et bien plus encore. Nous adaptons nos solutions logistiques en fonction de vos besoins spécifiques.
                  </div>
                </div>
              </div>

              <!-- Question 6 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Quelles sont les zones géographiques desservies ?
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Nous desservons toute la France ainsi que de nombreuses destinations en Europe et à l'international. Nous pouvons également organiser des expéditions multimodales pour des destinations spécifiques.
                  </div>
                </div>
              </div>

              <!-- Question 7 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeven">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Proposez-vous des services de transport sur mesure ?
                  </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Oui, nous proposons des services de transport personnalisés pour répondre à vos besoins spécifiques. Que ce soit pour des volumes particuliers, des délais serrés ou des destinations complexes, nous avons la solution adaptée.
                  </div>
                </div>
              </div>

              <!-- Question 8 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingEight">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Comment se déroule la facturation de vos services ?
                  </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    La facturation est basée sur plusieurs critères, dont la distance, le volume et le type de marchandises. Nous offrons des tarifs transparents et détaillons chaque service dans notre devis pour éviter toute surprise.
                  </div>
                </div>
              </div>

              <!-- Question 9 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingNine">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    Proposez-vous des services d'emballage pour les expéditions ?
                  </button>
                </h2>
                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Oui, nous proposons des services d'emballage pour protéger vos marchandises pendant le transport. Cela inclut l'emballage de palettes, le filmage et d'autres solutions pour sécuriser les marchandises fragiles.
                  </div>
                </div>
              </div>

              <!-- Question 10 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTen">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                    Quelles sont les conditions pour annuler ou modifier une expédition ?
                  </button>
                </h2>
                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Pour annuler ou modifier une expédition, vous devez nous en informer dans les plus brefs délais. Des frais peuvent s'appliquer en fonction du délai de prévenance et de l'avancée de l'expédition. Nous ferons de notre mieux pour répondre à vos besoins.
                  </div>
                </div>
              </div>

            </div>
          </div>


        </div>
      </div>
    </div>


  </div>
</template>

<script>
export default {
  data() {
    return {
      //gestion des etats des sections
      clicked: false,
      clicked2: true,
      clicked3: false,
      clicked4: false,

      form: {
        raisonSociale: '',
        nom: '',
        prenom: '',
        mail: '',
        telephone: '',
        adresseDepart: '',
        villeDepart: '',
        cpDepart: '',
        paysDepart: '',
        adresseDestination: '',
        villeDestination: '',
        cpDestination: '',
        paysDestination: '',
        longueur: '',
        largeur: '',
        hauteur: '',
        poid: '',
        typeMarchandise: '',
        commentaire: ''
      },
      formFields: {
        raisonSociale: { label: 'Raison Sociale', type: 'text', required: true },
        nom: { label: 'Nom', type: 'text', required: true },
        prenom: { label: 'Prénom', type: 'text', required: true },
        mail: { label: 'Adresse e-mail', type: 'email', required: true },
        telephone: { label: 'Numéro de téléphone', type: 'tel', required: true },
        adresseDepart: { label: 'Adresse de départ', type: 'text', required: true },
        villeDepart: { label: 'Ville de départ', type: 'text', required: true },
        cpDepart: { label: 'Code postal de départ', type: 'number', required: true },
        paysDepart: { label: 'Pays de départ', type: 'text', required: true },
        adresseDestination: { label: 'Adresse de destination', type: 'text', required: true },
        villeDestination: { label: 'Ville de destination', type: 'text', required: true },
        cpDestination: { label: 'Code postal de destination', type: 'number', required: true },
        paysDestination: { label: 'Pays de destination', type: 'text', required: true },
        longueur: { label: 'Longueur', type: 'number', required: true },
        largeur: { label: 'Largeur', type: 'number', required: true },
        hauteur: { label: 'Hauteur', type: 'number', required: true },
        poid: { label: 'Poids', type: 'number', required: true },
        typeMarchandise: { label: 'Type de marchandise', type: 'text', required: false },
        commentaire: { label: 'Commentaire', isTextArea: true, required: false }
      }
    };
  },
  methods: {
    toggleClicked() {
      this.clicked = !this.clicked;
      this.clicked2=false;
      this.clicked3=false;
      this.clicked4=false;
    },
    toggleClicked2() {
      this.clicked2 = !this.clicked2;
      this.clicked=false;
      this.clicked3=false;
      this.clicked4=false;
    },
    toggleClicked3() {
      this.clicked3 = !this.clicked3;
      this.clicked2=false;
      this.clicked=false;
      this.clicked4=false;
    },
    toggleClicked4() {
      this.clicked4 = !this.clicked4;
      this.clicked2=false;
      this.clicked=false;
      this.clicked3=false;
    },

    submitForm() {
      // Préparation des données du formulaire
      const formData = {
        raisonSociale: this.form.raisonSociale,
        nom: this.form.nom,
        prenom: this.form.prenom,
        mail: this.form.mail,
        telephone: this.form.telephone,
        adresseDepart: this.form.adresseDepart,
        villeDepart: this.form.villeDepart,
        cpDepart: this.form.cpDepart,
        paysDepart: this.form.paysDepart,
        adresseDestination: this.form.adresseDestination,
        villeDestination: this.form.villeDestination,
        cpDestination: this.form.cpDestination,
        paysDestination: this.form.paysDestination,
        longueur: this.form.longueur,
        largeur: this.form.largeur,
        hauteur: this.form.hauteur,
        poid: this.form.poid,
        typeMarchandise: this.form.typeMarchandise,
        commentaire: this.form.commentaire
      };

      // Requête fetch pour soumettre les données
      fetch('http://localhost:8000/api/devis', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      })
          .then((response) => {
            if (!response.ok) {
              throw new Error('Erreur lors de l\'envoi de la demande.');
            }
            return response.json();
          })
          .then((data) => {
            alert('Formulaire soumis avec succès !');
            console.log('Réponse du serveur :', data);

            // Réinitialisation du formulaire après envoi
            this.resetForm();
          })
          .catch((error) => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue lors de la soumission du formulaire.');
          });
    },
    resetForm() {
      // Réinitialiser le formulaire après soumission
      this.form = {
        raisonSociale: '',
        nom: '',
        prenom: '',
        mail: '',
        telephone: '',
        adresseDepart: '',
        villeDepart: '',
        cpDepart: '',
        paysDepart: '',
        adresseDestination: '',
        villeDestination: '',
        cpDestination: '',
        paysDestination: '',
        longueur: '',
        largeur: '',
        hauteur: '',
        poid: '',
        typeMarchandise: '',
        commentaire: ''
      };
    }
  }
};
</script>

<style>
*{
  width: 100%;
}
/* Styles pour les barres et les boutons */
.telTopBar,
#demandeDevis {
  width: 200px;
  text-decoration: none;
  color: #005595;

}

.telTopBar:hover,
#demandeDevis:hover {
  color: #0fb4e8;
}

#demandeDevis {
  background: #005595;
  padding: 10px;
  border-radius: 10px;
  color: white;
  transition: linear 0.3s;
}

/* Logo fade-in */
.logo {
  background-color: rgba(255, 255, 255, 0.54);
  transition: ease-in 3s;
  margin-top: 150px;
  width: 50%;
  border-radius: 10px;
}

.fade-in {
  animation: fadeIn 3s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Section à propos avec transition */
.aPropos2 {
  cursor: pointer;

  width: 100%;
  padding: 20px;
  margin-top: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(90deg, rgba(255,255,255,0) 12%, rgba(0,85,149,1) 25%, rgba(0,85,149,1) 75%, rgba(255,255,255,0) 88%);
  transition: background 0.5s ease-out;

}

.aPropos3 {
  cursor: pointer;

  width: 100%;
  padding: 20px;
  margin-top: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(90deg, rgba(255,255,255,0) 12%, rgba(0,85,149,1) 25%, rgba(0,85,149,1) 75%, rgba(255,255,255,0) 88%);
  transition: background 0.5s ease-out;

}

.aPropos1 {
  cursor: pointer;

  width: 100%;
  padding: 20px;
  margin-top: 10px;

  display: flex;
  justify-content: center;
  align-items: center;
  background: rgb(0, 85, 149);
  transition: background 0.5s ease-out;

}

#aProposTitle {
  text-align: center;
  transition: color 0.5s ease-in;
}

#aProposTitle:hover {
  color: white;
}

.sectionTitleShow {
  color: white;
  transition: color 1s ease-in;
}

.sectionTitle {
  color: rgba(255, 255, 255, 0);
  transition: color 1s ease-in;
}
#aProposDesc{
  text-align: center;
}

.sections{
  margin-top: 80px;
  display: flex;
  flex-direction: column;


}
#imgApropos{
  width: 30%;
  border-radius: 10px;
}
#navBar{
  z-index: 999;

}

.video-content {
  height: 100vh;
  width: 100vw;
  object-fit: cover;
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;
}
#navBarBackground {

  background : linear-gradient(0deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 27%);
}

</style>
