# Vérification et utilisation des catégories Our Team / Staff

Ce document indique **où** les informations (catégories, postes, noms) sont utilisées dans le site et comment les faire correspondre à votre liste.

---

## 1. Où ces informations sont utilisées

| Élément | Page / URL | Utilisation |
|--------|------------|-------------|
| **Our Team – tous les profils** | `/our-team` (Our AIRID Team) | Liste tout le personnel : d’abord « Our Management » (niveau 1), puis le reste. **Filtre par catégorie** : All / Management & Operations / Facility & Platform Supervisors / Research Team. |
| **Staff profiles (filterable)** | Même page `/our-team` | Le filtre utilise le champ **Catégorie Our Team** (`staff_category`) de chaque fiche staff en admin. |
| **Management & Operations** | `/about/management-operations` | Affiche uniquement les personnels dont **Catégorie Our Team** = **Management & Operations**. Dr Corine NGUFOR est toujours affichée en premier. |
| **Facility & Platform Supervisors** | `/about/unit-supervisors` | Affiche uniquement les personnels dont **Catégorie Our Team** = **Facility & Platform Supervisors**. |
| **Research Team** | `/about/research-team` | Affiche uniquement les personnels dont **Catégorie Our Team** = **Research Team**. |
| **Organigramme** | `/about/organisational-structure` | Affiche **tout** le personnel, ordonné par **Niveau poste** puis **Poids personnel** (pas par catégorie). |

---

## 2. Champs à renseigner en admin (Staff Create / Edit)

Pour que votre liste soit respectée :

| Champ admin | Rôle | Exemple pour votre liste |
|-------------|------|---------------------------|
| **Poste** | Intitulé du poste (liste déroulante). Doit exister dans la table des postes. | "Executive Director", "Finance & Contracts Officer", "Insecticide Testing Laboratory Supervisor I", "Principal Investigator", etc. |
| **Catégorie Our Team** *(nouveau)* | Détermine dans quelle catégorie la personne apparaît (filtre Our Team + pages About). | **Management & Operations** / **Facility & Platform Supervisors** / **Research Team** (ou vide = n’apparaît pas dans ces filtres). |
| **Niveau poste** | Hiérarchie pour l’organigramme et « Our Management ». | 1 = direction (ex. Executive Director), 2, 3… pour les autres. |
| **Poids personnel** | Ordre d’affichage au sein d’un même niveau (plus le nombre est élevé, plus la personne est affichée en premier). | À ajuster pour l’ordre souhaité dans chaque niveau. |

---

## 3. Correspondance avec votre liste

### Management & Operations
- **Catégorie Our Team** = **Management & Operations** pour chacun.
- Postes à avoir dans la liste des postes (table `airid_postes`) :  
  Executive Director, Finance & Contracts Officer, Chief Finance Officer, Partnerships Manager, Senior Administrative Officer, Human Resources Manager, Governance Manager, Monitoring & Evaluation Officer.
- Personnes : Dr Corine, Prisca, Mikael, Imelda, Danielle, Georgine + les titulaires de HR Manager et Governance Manager (à créer/assigner).

### Facility & Platform Supervisors
- **Catégorie Our Team** = **Facility & Platform Supervisors**.
- Postes : Insecticide Testing Laboratory Supervisor I/II, Molecular & Analytical Laboratory Supervisor, Insectary Supervisor, Field Site Platform Supervisor 1/2, Data & IT Platform Manager, Quality Assurance Manager, Equipment Platform Manager.
- Personnes : Boris, Judicael, Romaric, Damien, Melis, Justine, Francis, Corneille, Eloe.

### Research Team
- **Catégorie Our Team** = **Research Team**.
- Postes : Principal Investigator, Research Fellow / Scientific Officer, Senior Research Assistant, Research Assistant (ou variantes).
- Personnes : Dr Corine, Romaric, Idelphonse, Ludovic (PIs / Fellows) ; Boris, Judicael, Josias (Senior RA) ; Aicha, Nadia, Ridwane, Georgine, Euphrasie, Jocelyn, Martial, Estelle (RA).

**Note :** Une même personne peut n’avoir qu’**une seule** catégorie Our Team (ex. Dr Corine en Management **ou** Research, pas les deux en filtre). Pour qu’elle apparaisse à la fois en Management et en Research, il faudrait soit dupliquer la fiche (déconseillé), soit adapter l’affichage (ex. afficher aussi les PIs sur la page Research même sans catégorie Research). Actuellement : **une personne = une catégorie** pour les filtres et les pages About.

---

## 4. Postes manquants

Les intitulés de poste doivent exister dans **Admin** (table des postes). Si un poste de votre liste n’existe pas :

- L’ajouter dans la gestion des postes (si une interface existe),  
- Ou l’ajouter en base dans `airid_postes` (colonne `intitule_poste`).

Ensuite, l’assigner à chaque membre du staff dans **Admin > Staff > Create/Edit** (champ **Poste** + **Catégorie Our Team**).

---

## 5. Résumé des URLs

- **Our Team (filtrable)** : `http://127.0.0.1:8000/our-team`  
  Filtres : `?category=management_operations` | `facility_platform_supervisors` | `research_team`
- **Management & Operations** : `http://127.0.0.1:8000/about/management-operations`
- **Facility & Platform Supervisors** : `http://127.0.0.1:8000/about/unit-supervisors`
- **Research Team** : `http://127.0.0.1:8000/about/research-team`
- **Organigramme** : `http://127.0.0.1:8000/about/organisational-structure`

---

## 6. Modifications techniques effectuées

- **Champ « Catégorie Our Team »** ajouté dans **Admin > Staff > Create** et **Edit** (select : Management & Operations / Facility & Platform Supervisors / Research Team / Aucune).
- **Validation** et **sauvegarde** de `staff_category` dans le contrôleur admin.
- **Dr Corine NGUFOR** : affichée en premier sur `/about/management-operations` (déjà en place).

En renseignant pour chaque membre du staff le **Poste** et la **Catégorie Our Team** selon ce document, l’affichage sur Our Team et sur les pages About correspondra à votre liste.
