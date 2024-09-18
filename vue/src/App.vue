<template>
  <div class="position-fixed w-100">
    <!-- Conteneur pour le numéro de téléphone -->
    <div class="d-flex justify-content-center bg-light text-center py-2">
      <span class="telTopBar font-weight-bold mx-3">Loris : <a class="telTopBar" href="tel:+330764191017">07 64 19 10 17</a></span>
      <span class="telTopBar font-weight-bold mx-3">Ali : <a class="telTopBar" href="tel:+330661771764">06 61 77 17 64</a></span>
      <span class="telTopBar font-weight-bold mx-3">Arnaud : <a class="telTopBar" href="tel:+330782457041">07 82 45 70 41</a></span>
    </div>

    <!-- Button to trigger modal -->
    <div class="d-flex justify-content-center bg-light text-center py-2">
      <a id="demandeDevis" href="#" data-bs-toggle="modal" data-bs-target="#devisModal">Demande de devis</a>
    </div>
  </div>

  <!-- Modal -->
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

  <div :class="clicked ? 'aPropos1' : 'aPropos2'" >
    <div class="d-flex flex-column justify-content-center align-items-center">
      <h2 @click="toggleClicked" id="aProposTitle">À propos</h2>
      <p v-show="clicked" id="aProposDesc" :class="clicked ? 'sectionTitleShow' : 'sectionTitle'">
        SGA est une entreprise encrée depuis plusieurs années dans l’organisation de transport,
        de la logistique et de l'affrètement. Nous sommes une équipe jeune et dynamique à
        l'écoute des besoins de nos clients. Capable d'organiser tous types de transports sur le plan
        multimodal, notre réactivité nous a permis de nous déployer au niveau international.
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      clicked: false,
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
/* Styles pour les barres et les boutons */
.telTopBar,
#demandeDevis {
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
  transition: ease-in 3s;
  margin-top: 150px;
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
  position: absolute;
  width: 100%;
  padding: 20px;
  margin-top: 80px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(90deg, #005595 0%, #005595 50%, rgba(255, 255, 255, 0) 60%);
  transition: background 0.3s ease-in;
}

.aPropos1 {
  cursor: pointer;
  position: absolute;
  width: 100%;
  padding: 20px;
  margin-top: 80px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #005595;
  transition: background 0.3s ease-in;
}

#aProposTitle {
  transition: color 0.3s ease-in;
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
</style>
