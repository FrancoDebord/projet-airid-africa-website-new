# Page Admin – Détail candidature Hardship Fund (ex: /admin/hardship-fund/7)

Toutes les données affichées proviennent de la table `hardship_fund_applications` pour l’enregistrement demandé (ex: id = 7).

---

## En-tête de la page
- **Titre** : « Candidature – [full_name] » (first_name + last_name)
- **Boutons** : Modifier, Liste

---

## SECTION 1 : Informations personnelles
| Champ affiché      | Colonne BDD              | Remarque                    |
|--------------------|--------------------------|-----------------------------|
| Nom / Prénom       | first_name, last_name    | Toujours affiché            |
| Email              | email                    | Toujours affiché            |
| Téléphone          | phone                    | Sinon "–"                   |
| Date de naissance  | date_of_birth            | Format d/m/Y                 |
| Âge                | age                      | Si rempli                   |
| Nationalité        | nationality              | Toujours affiché            |
| N° pièce / Passeport | id_number             | Si rempli                   |
| Résident permanent | is_permanent_resident   | Oui / Non (si défini)       |
| Adresse            | residential_address      | Si remplie                   |

---

## SECTION 2 : Études
| Champ affiché    | Colonne BDD             | Remarque          |
|------------------|------------------------|-------------------|
| Université       | university             | Toujours affiché  |
| Faculté / École  | faculty_school         | Si rempli         |
| Département      | department             | Si rempli         |
| Programme (STEM) | programme             | Toujours affiché  |
| Niveau           | level                  | undergraduate / masters |
| Année d'études   | year_of_study          | Si rempli         |
| Fin prévue       | expected_graduation_date | Si rempli      |
| Moyenne / GPA    | current_gpa            | Si rempli         |
| Domaine STEM     | stem_field, stem_other | Si stem_field = "other" → stem_other |

---

## SECTION 3 : Parrain facultaire
*(Affichée seulement si faculty_member_name ou faculty_position est rempli)*

| Champ affiché | Colonne BDD        | Remarque   |
|---------------|--------------------|------------|
| Nom           | faculty_member_name | Si rempli |
| Fonction      | faculty_position   | Si rempli  |
| Université    | faculty_university | Si rempli  |

---

## SECTION 4 : Contexte financier
*(Affichée seulement si financial_aid est défini ou financial_explanation rempli)*

| Champ affiché           | Colonne BDD           | Remarque   |
|-------------------------|-----------------------|------------|
| Bourse / aide actuelle  | financial_aid         | Oui / Non  |
| Précision              | financial_aid_specify | Si rempli  |
| Explication             | financial_explanation | Si rempli  |

---

## SECTION 5 : Documents
| Document                  | Colonne BDD               | Affichage                    |
|---------------------------|---------------------------|------------------------------|
| Proof of enrolment        | proof_enrolment_path      | Lien Télécharger ou "–"      |
| Transcript                | transcript_path           | Lien Télécharger ou "–"      |
| Support letter            | support_letter_path       | Lien Télécharger ou "–"      |
| ID / Passeport            | id_document_path         | Lien Télécharger ou "–"      |
| Lettre de motivation (PDF)| personal_statement_file_path | Lien Télécharger (si présent) |
| Signature                 | signature_path           | Image (si présente)          |

---

## SECTION 6 : Résumé / Personal statement (texte)
*(Affichée seulement si personal_statement est rempli)*
- **Colonne** : `personal_statement` (texte libre)
- Souvent NULL car le champ formulaire correspondant a été supprimé.

---

## SECTION 7 : Suivi & métadonnées
| Champ affiché | Colonne BDD | Remarque                          |
|---------------|-------------|------------------------------------|
| Statut        | status      | pending / under_review / approved / rejected |
| Notes admin   | admin_notes | Si rempli                          |
| Déposé le     | created_at  | Format d/m/Y H:i                   |

---

## Correspondance formulaire → BDD

Les données de la page proviennent du formulaire de candidature (étapes 1 à 4) et sont enregistrées dans les colonnes listées ci-dessus. La table utilisée est `hardship_fund_applications` (modèle `HardshipFundApplication`).
