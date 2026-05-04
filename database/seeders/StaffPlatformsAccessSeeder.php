<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffPlatformsAccessSeeder extends Seeder
{
    public function run(): void
    {
        $staff = [
            ['prenom' => 'Aicha',      'nom' => 'Odjo',               'email' => 'aicha.odjo@airid-africa.com'],
            ['prenom' => 'Armande',    'nom' => 'Kassa',              'email' => 'armande.kassa@airid-africa.com'],
            ['prenom' => 'Augustine',  'nom' => 'Zanmenou',           'email' => 'augustine.zanmenou@airid-africa.com'],
            ['prenom' => 'Boris',      'nom' => "N'dombidje",         'email' => 'boris.ndombidje@airid-africa.com'],
            ['prenom' => 'Caroline',   'nom' => 'Aballo',             'email' => 'caroline.aballo@airid-africa.com'],
            ['prenom' => 'Claudia',    'nom' => 'Hounsounou',         'email' => 'claudia.hounsounou@airid-africa.com'],
            ['prenom' => 'Corine',     'nom' => 'Ngufor',             'email' => 'corine.ngufor@airid-africa.com'],
            ['prenom' => 'Corneille',  'nom' => 'Hueha',              'email' => 'corneille.hueha@airid-africa.com'],
            ['prenom' => 'Damien',     'nom' => 'Todjinou',           'email' => 'damien.todjinou@airid-africa.com'],
            ['prenom' => 'Danielle',   'nom' => 'Apithy',             'email' => 'danielle.apithy@airid-africa.com'],
            ['prenom' => 'Eloe',       'nom' => 'Tantoukoute',        'email' => 'eloe.tantoukoute@airid-africa.com'],
            ['prenom' => 'Estelle',    'nom' => 'Vigninou',           'email' => 'estelle.vigninou@airid-africa.com'],
            ['prenom' => 'Euphrasie',  'nom' => 'Obossou',            'email' => 'euphrasie.obossou@airid-africa.com'],
            ['prenom' => 'Fabrice',    'nom' => 'Gandaho',            'email' => 'fabrice.gandaho@airid-africa.com'],
            ['prenom' => 'Francis',    'nom' => 'Houeha',             'email' => 'francis.houeha@airid-africa.com'],
            ['prenom' => 'Georgine',   'nom' => 'Houetohossou',       'email' => 'georgine.houetohossou@airid-africa.com'],
            ['prenom' => 'Gerald',     'nom' => 'Mevi',               'email' => 'gerald.mevi@airid-africa.com'],
            ['prenom' => 'Gildas',     'nom' => 'Agboglizo',          'email' => 'gildas.agboglizo@airid-africa.com'],
            ['prenom' => 'Godwin',     'nom' => 'Ahokpe',             'email' => 'godwin.ahokpe@airid-africa.com'],
            ['prenom' => 'Greta',      'nom' => 'Aglikpo',            'email' => 'greta.aglikpo@airid-africa.com'],
            ['prenom' => 'Herve',      'nom' => 'Bokossa',            'email' => 'herve.bokossa@airid-africa.com'],
            ['prenom' => 'Ichiaka',    'nom' => 'Adelodjou',          'email' => 'ichiaka.adelodjou@airid-africa.com'],
            ['prenom' => 'Idelphonse', 'nom' => 'Ahogni',             'email' => 'idelphonse.ahogni@airid-africa.com'],
            ['prenom' => 'Imelda',     'nom' => 'Backup',             'email' => 'mail.backup@airid-africa.com'],
            ['prenom' => 'Imelda',     'nom' => 'Glele',              'email' => 'imelda.glele@airid-africa.com'],
            ['prenom' => 'Joceline',   'nom' => 'Taco',               'email' => 'joceline.taco@airid-africa.com'],
            ['prenom' => 'Joel',       'nom' => 'Akpi',               'email' => 'joel.akpi@airid-africa.com'],
            ['prenom' => 'Josias',     'nom' => 'Fagbohoun',          'email' => 'josias.fagbohoun@airid-africa.com'],
            ['prenom' => 'Judicael',   'nom' => 'Nounagnon',          'email' => 'judicael.nounagnon@airid-africa.com'],
            ['prenom' => 'Justin',     'nom' => 'Djossou',            'email' => 'justin.djossou@airid-africa.com'],
            ['prenom' => 'Justine',    'nom' => 'Hessou',             'email' => 'justine.hessou@airid-africa.com'],
            ['prenom' => 'Ludovic',    'nom' => "Kouagou N'tcha",     'email' => 'ludovic.ntcha@airid-africa.com'],
            ['prenom' => 'Mahoulolo',  'nom' => 'Sebio',              'email' => 'mahoulolo.sebio@airid-africa.com'],
            ['prenom' => 'Martial',    'nom' => 'Gbegbo',             'email' => 'martial.gbegbo@airid-africa.com'],
            ['prenom' => 'Melis',      'nom' => 'Yamadjako',          'email' => 'melis.yamadjako@airid-africa.com'],
            ['prenom' => 'Mikael',     'nom' => 'Kanhonou',           'email' => 'mikael.kanhonou@airid-africa.com'],
            ['prenom' => 'Nadia',      'nom' => 'Houeto',             'email' => 'nadia.houeto@airid-africa.com'],
            ['prenom' => 'Odilon',     'nom' => 'Kouton',             'email' => 'odilon.kouton@airid-africa.com'],
            ['prenom' => 'Prisca',     'nom' => 'Kodja',              'email' => 'prisca.kodja@airid-africa.com'],
            ['prenom' => 'Prudence',   'nom' => 'Tossou',             'email' => 'prudence.tossou@airid-africa.com'],
            ['prenom' => 'Riliwanou',  'nom' => 'Issiakou',           'email' => 'riliwanou.issiakou@airid-africa.com'],
            ['prenom' => 'Romaric',    'nom' => 'Akoton',             'email' => 'romaric.akoton@airid-africa.com'],
            ['prenom' => 'Romaric',    'nom' => 'Seye',               'email' => 'romaric.seye@airid-africa.com'],
            ['prenom' => 'Sabine',     'nom' => 'Agossadou',          'email' => 'sabine.agossadou@airid-africa.com'],
            ['prenom' => 'Salvador',   'nom' => 'Houndeton',          'email' => 'salvador.houndeton@airid-africa.com'],
            ['prenom' => 'Thierry',    'nom' => 'Bonou',              'email' => 'thierry.bonou@airid-africa.com'],
            ['prenom' => 'Victorin',   'nom' => 'Atchade',            'email' => 'victorin.atchade@airid-africa.com'],
        ];

        $now = now();

        foreach ($staff as $member) {
            DB::table('staff_platforms_access')->updateOrInsert(
                ['email' => $member['email']],
                array_merge($member, [
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }
}
