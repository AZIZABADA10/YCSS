# Cahier des Charges
## Projet de Fil Rouge : YouCode Safi Student (YCSS)
### Intranet dédié à YouCode Safi

**Encadrant :** Mr. Chouab Achraf  
**Réalisé par :** Aziz Abada  
**Année de formation :** 2025/2026

---

## 1. Présentation du projet

Le projet **YCSS** a pour objectif de développer une application web permettant la gestion complète des activités pédagogiques et du suivi des étudiants à YouCode Safi.

Cette plateforme offrira aux différents acteurs (apprenants, formateurs, assistante de direction, administration et responsable restauration) des outils pour :  

- Suivre les activités et les notes d’activité des apprenants.  
- Gérer les absences et les justifications.  
- Traiter les demandes d’attestation scolaire.  
- Organiser la réservation des déjeuners.  
- Créer des classes et assigner des formateurs à chaque classe.  

**Objectif principal :** Simplifier et centraliser la gestion administrative et pédagogique, tout en garantissant un accès sécurisé et adapté à chaque type d’utilisateur.

---

## 2. Problématique

Actuellement, la gestion des activités, absences, attestations et repas à YouCode Safi est réalisée de manière partielle et non centralisée, entraînant :  

- Une perte de temps dans le suivi des apprenants.  
- Des erreurs dans l’attribution des notes et des absences.  
- Une difficulté à suivre les demandes d’attestation scolaire.  
- Une gestion manuelle des repas peu efficace.  

Le projet **YCSS** vise à résoudre ces problèmes en proposant une solution centralisée et numérique.

---

## 3. Objectifs

- Centraliser la gestion des activités pédagogiques, des absences et des notes des apprenants.  
- Simplifier le traitement des demandes administratives (attestations scolaires, congés).  
- Optimiser l’organisation des repas et des réservations.  
- Permettre la création de classes et l’assignation des formateurs de manière simple et sécurisée.  
- Offrir une interface intuitive et accessible pour chaque type d’utilisateur.

---

## 4. Acteurs du système

- **Apprenant :** suit ses activités, consulte ses notes, justifie ses absences et effectue certaines demandes administratives.  
- **Formateur :** supervise les activités, enregistre les notes, suit l’assiduité des apprenants et est assigné à une classe.  
- **Assistante de direction :** gère les absences et les documents administratifs.  
- **Administration :** assure la gestion globale des utilisateurs, la création des classes, l’assignation des formateurs et la gestion des congés.  
- **Responsable Restauration :** propose les plats du jour et gère les réservations de repas.

---

## 5. Fonctionnalités détaillées

### 5.1 Administration
- Gestion des utilisateurs (apprenants, formateurs, assistante de direction, responsable restauration) : création, modification, suppression et consultation.  
- Gestion des demandes de congé du personnel (formateurs, assistante, responsable restauration).  
- Création et gestion des classes :  
  - Créer une nouvelle classe  
  - Assigner un formateur à une classe  
  - Modifier ou supprimer une classe  
- Réservation du déjeuner  

### 5.2 Assistante de direction
- Gestion des absences des apprenants  
- Gestion des attestations scolaires  
- Faire une demande de congé  
- Réservation du déjeuner  

### 5.3 Formateur
- Gestion des activités et enregistrement des notes pour chaque activité (ex : livecoding, veille)  
- Marquer les apprenants absents  
- Réservation du déjeuner  
- Faire une demande de congé  

### 5.4 Apprenant
- Demande d’attestation scolaire  
- Justification d’absences  
- Consultation des activités assignées  
- Consultation du profil et des notes obtenues  
- Réservation du déjeuner  

### 5.5 Responsable Restauration
- Proposer le menu du jour  
- Gérer les réservations de repas pour tous les utilisateurs  

---

## 6. Identification des User Stories

| ID   | Acteur                  | User Story                                                                 | Priorité |
|------|-------------------------|---------------------------------------------------------------------------|----------|
| US01 | Apprenant               | Consulter mes activités assignées pour suivre mon programme pédagogique   | Haute    |
| US02 | Apprenant               | Consulter mes notes pour chaque activité                                   | Haute    |
| US03 | Apprenant               | Justifier mes absences                                                    | Moyenne  |
| US04 | Apprenant               | Demander une attestation scolaire                                         | Haute    |
| US05 | Apprenant               | Réserver mon déjeuner                                                     | Moyenne  |
| US06 | Formateur               | Gérer mes activités et enregistrer les notes                               | Haute    |
| US07 | Formateur               | Marquer les absences des apprenants                                       | Haute    |
| US08 | Administration          | Gérer les utilisateurs                                                   | Haute    |
| US09 | Administration          | Créer des classes et assigner des formateurs                               | Haute    |
| US10 | Administration          | Gérer les demandes de congés                                             | Moyenne  |
| US11 | Assistante de direction | Gérer les absences des apprenants                                         | Moyenne  |
| US12 | Responsable Restauration| Proposer le menu et gérer les réservations                                | Moyenne  |

---

## 7. Exigences et contraintes

- Interface web intuitive et accessible à tous les utilisateurs  
- Gestion sécurisée des comptes et des rôles  
- Compatibilité avec les principaux navigateurs web et appareils (desktop et mobile)  

---

## 8. Logo et inspiration

- **Logo :** Créé par l’auteur du projet (Aziz Abada)  
- **Inspiration :** [https://intranet.youcode.ma/](https://intranet.youcode.ma/)  

---

## 9. Charte graphique

À définir ultérieurement (couleurs, typographies, styles d’icônes, etc.)  

---

## 10. Choix technologiques

- **Back-end :** Laravel complet  
- **Front-end :** HTML5, CSS3, JavaScript (possibilité de frameworks si besoin)  
- **Base de données :** MySQL  
- **Sécurité :** Gestion des rôles, accès sécurisé et authentification  
- **Compatibilité navigateurs :** Google Chrome, Firefox, Safari, Opera, Internet Explorer, navigateurs Android  

