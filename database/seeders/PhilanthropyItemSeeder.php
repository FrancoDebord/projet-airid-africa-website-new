<?php

namespace Database\Seeders;

use App\Models\PhilanthropyItem;
use Illuminate\Database\Seeder;

class PhilanthropyItemSeeder extends Seeder
{
    public function run(): void
    {
        $banner = null; // or 'banner2_new.png' if you store in assets/philanthropy
        $items = [
            [
                'slug' => 'our-impact',
                'title' => 'Our Impact',
                'excerpt' => 'Your support helps AIRID advance African-led research in infectious diseases, strengthen health systems, and train the next generation of scientists.',
                'image_path' => $banner,
                'content' => '<p>By supporting AIRID, you are investing in African-led science, stronger health systems, and long-term solutions to infectious diseases. Our work spans vector control evaluation, malaria and neglected tropical diseases, capacity strengthening, and policy-relevant research.</p><p>Donations help us maintain state-of-the-art facilities, support early-career researchers, and respond to public health priorities in the region. Every contribution directly supports our mission: <strong>Bold Science. African-Led. Impact-Driven.</strong></p><p>We use funds transparently and report on outcomes so you can see the difference your generosity makes.</p>',
                'sort_order' => 1,
                'active' => true,
            ],
            [
                'slug' => 'how-to-give',
                'title' => 'How to Give',
                'excerpt' => 'Donate by email, phone, or through our contact form. We welcome one-time gifts and ongoing partnerships.',
                'image_path' => $banner,
                'content' => '<p>You can support AIRID in several ways:</p><ul><li><strong>Email:</strong> Reach our partnerships team at <a href="mailto:partnerships@airid-africa.com">partnerships@airid-africa.com</a> to discuss a donation or partnership.</li><li><strong>Phone:</strong> Contact us at +229 01 67 16 44 99 for donations and partnership enquiries.</li><li><strong>Contact form:</strong> Use our website contact form to send a message; we will get back to you promptly.</li></ul><p>We accept one-time gifts and can discuss structured giving, corporate partnerships, or funding for specific programmes. All donations are used in line with our mission and reported with transparency.</p>',
                'sort_order' => 2,
                'active' => true,
            ],
            [
                'slug' => 'funding-priorities',
                'title' => 'Funding Priorities',
                'excerpt' => 'Research and facilities, capacity strengthening, and community engagement are among our key funding priorities.',
                'image_path' => $banner,
                'content' => '<p>AIRID directs philanthropic support toward high-impact areas:</p><ul><li><strong>Research and facilities:</strong> Upgrading laboratories, insectaries, and field platforms to maintain world-class standards.</li><li><strong>Capacity strengthening:</strong> Training and mentoring for African researchers and technical staff.</li><li><strong>Community engagement:</strong> Ensuring research benefits communities and supports national health priorities.</li><li><strong>Equipment and innovation:</strong> Enabling new lines of research and more efficient data collection and analysis.</li></ul><p>We align all funded activities with our strategy and report on progress to donors and partners.</p>',
                'sort_order' => 3,
                'active' => true,
            ],
            [
                'slug' => 'hardship-fund-women-stem',
                'title' => 'AIRID Hardship Fund for Women in STEM',
                'excerpt' => 'Support for young women pursuing STEM education at public universities in Benin. Grants for undergraduate and Master’s students.',
                'image_path' => $banner,
                'apply_form_type' => PhilanthropyItem::APPLY_FORM_HARDSHIP_FUND,
                'apply_intro' => "Application deadline: 31st March 2026. Submit the form below with all required documents (PDF preferred).",
                'content' => '<h3>About AIRID</h3>
<p>The African Institute for Research in Infectious Diseases (AIRID) is a non-profit research organisation established in 2021 to strengthen Africa’s capacity to address infectious and tropical diseases through high-quality, policy-relevant research. AIRID generates evidence to inform the design and evaluation of interventions tailored to African epidemiological and social contexts. AIRID is legally registered in the Republic of Benin and operates under regulations, ensuring transparency, accountability, and ethical conduct. Guided by its vision to advance African-led science for disease elimination, AIRID is committed to excellence, integrity, innovation, collaboration, equity, and impact.</p>
<h3>The AIRID Hardship Fund – Programme Overview</h3>
<p>The African Institute for Research in Infectious Diseases (AIRID) Hardship Fund supports young women pursuing STEM (Science, Technology, Engineering, and Mathematics) education at public universities in Benin. The programme aims to reduce financial barriers that can disrupt academic progression and to promote gender equity in Benin’s scientific and research workforce. By providing targeted grant support to promising female students, AIRID seeks to strengthen the pipeline of women entering scientific careers, contribute to national research capacity, and foster a more inclusive and resilient innovation ecosystem in Benin.</p>
<h3>Available Awards</h3>
<p>AIRID will offer:</p><ul><li>Six (6) awards of 150,000 FCFA for eligible undergraduate students</li><li>Five (5) awards of 200,000 FCFA for eligible Master’s level postgraduate students</li></ul>
<p>Awards are non-repayable grants intended to support academic progression.</p>
<h3>Eligibility Criteria</h3>
<p>Applicants must: Be female; be enrolled in a STEM programme at a recognised public university in Benin; provide evidence of active enrolment; demonstrate commitment to completing their programme; be aged 18–35 years; be a Beninese national or permanent resident.</p>
<p>Eligible STEM fields include (but are not limited to): Biology, Chemistry, Physics, Mathematics, Computer Science, Engineering, Environmental Science, Agricultural Science, and Health Sciences.</p>
<h3>Required Documentation</h3>
<p>Applicants must submit: Completed application form; Proof of current enrolment (mandatory); Recent academic transcript; Support letter from a faculty member (mandatory); Copy of national ID or birth certificate; Brief personal statement outlining academic goals.</p>
<h3>Selection Process</h3>
<p>Applications will be reviewed by the AIRID Hardship Fund Committee. Selection will consider: academic engagement and progress; motivation and commitment to STEM; quality of faculty support letter; potential to benefit from the award. Successful applicants will be notified by email.</p>
<h3>Recipient Expectations</h3>
<p>Awardees will be expected to: maintain active enrolment in their programme; inform AIRID of any major change in status; participate in AIRID Women in Science activities when feasible.</p>
<h3>Application Submission</h3>
<p>Applications should be submitted electronically to:<br><strong>📧 hardshipfund@airid-africa.com</strong> &nbsp; <strong>🌐 www.airid-africa.com</strong></p>
<p><strong>Application deadline: 31st March 2026</strong></p>
<p>The African Institute for Research in Infectious Diseases (AIRID) is committed to advancing women in science and strengthening Africa-led research capacity. Through this fund, AIRID aims to support the next generation of women scientists in Benin.</p>',
                'sort_order' => 4,
                'active' => true,
            ],
        ];

        foreach ($items as $data) {
            if ($data['image_path'] === null) {
                unset($data['image_path']);
            }
            PhilanthropyItem::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
