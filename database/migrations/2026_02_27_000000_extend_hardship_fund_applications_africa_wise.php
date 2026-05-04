<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hardship_fund_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('hardship_fund_applications', 'id_number')) {
                $table->string('id_number')->nullable()->after('nationality');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'is_permanent_resident')) {
                $table->boolean('is_permanent_resident')->nullable()->after('id_number');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'residential_address')) {
                $table->text('residential_address')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'faculty_school')) {
                $table->string('faculty_school')->nullable()->after('university');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'department')) {
                $table->string('department')->nullable()->after('faculty_school');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'year_of_study')) {
                $table->string('year_of_study')->nullable()->after('programme');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'expected_graduation_date')) {
                $table->string('expected_graduation_date')->nullable()->after('year_of_study');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'current_gpa')) {
                $table->string('current_gpa')->nullable()->after('expected_graduation_date');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'stem_field')) {
                $table->string('stem_field')->nullable()->after('level');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'stem_other')) {
                $table->string('stem_other')->nullable()->after('stem_field');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'personal_statement_file_path')) {
                $table->string('personal_statement_file_path')->nullable()->after('personal_statement');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'financial_aid')) {
                $table->boolean('financial_aid')->nullable()->after('personal_statement_file_path');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'financial_aid_specify')) {
                $table->text('financial_aid_specify')->nullable()->after('financial_aid');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'financial_explanation')) {
                $table->text('financial_explanation')->nullable()->after('financial_aid_specify');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'faculty_member_name')) {
                $table->string('faculty_member_name')->nullable()->after('support_letter_path');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'faculty_position')) {
                $table->string('faculty_position')->nullable()->after('faculty_member_name');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'faculty_university')) {
                $table->string('faculty_university')->nullable()->after('faculty_position');
            }
            if (!Schema::hasColumn('hardship_fund_applications', 'signature_path')) {
                $table->string('signature_path')->nullable()->after('admin_notes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('hardship_fund_applications', function (Blueprint $table) {
            $table->dropColumn([
                'id_number', 'is_permanent_resident', 'residential_address',
                'faculty_school', 'department', 'year_of_study', 'expected_graduation_date', 'current_gpa',
                'stem_field', 'stem_other', 'personal_statement_file_path',
                'financial_aid', 'financial_aid_specify', 'financial_explanation',
                'faculty_member_name', 'faculty_position', 'faculty_university',
                'signature_path',
            ]);
        });
    }
};
