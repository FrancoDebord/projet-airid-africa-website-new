<style>
    .trl-tile-sc {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-left: 4px solid #c20102;
    }
    .trl-tile-sc h3 { font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.75rem; }
    .trl-tile-sc p { font-size: 1rem; line-height: 1.65; color: #444; margin-bottom: 0.6rem; }
    .trl-tile-sc p:last-of-type { margin-bottom: 0; }
    .trl-tile-sc ul { list-style: none; padding: 0; margin: 0.5rem 0 0.75rem 0; }
    .trl-tile-sc ul li { padding: 0.25rem 0 0.25rem 1.4rem; position: relative; font-size: 1rem; line-height: 1.55; color: #444; }
    .trl-tile-sc ul li::before { content: '✓'; position: absolute; left: 0; color: #c20102; font-weight: 700; }
    .section-title-sc { font-size: 1.25rem; font-weight: 700; color: #1a1a1a; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem; }
    .section-title-sc i { color: #c20102; }
    .sc-table-wrap { overflow-x: auto; margin: 1rem 0; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
    .sc-table { width: 100%; border-collapse: collapse; font-size: 0.95rem; background: #fff; }
    .sc-table th, .sc-table td { padding: 0.75rem 1rem; text-align: left; border-bottom: 1px solid #eee; vertical-align: top; }
    .sc-table th { background: #c20102; color: #fff; font-weight: 600; white-space: nowrap; }
    .sc-table th:nth-child(1) { min-width: 220px; }
    .sc-table th:nth-child(2) { min-width: 90px; }
    .sc-table th:nth-child(3) { min-width: 100px; }
    .sc-table tbody tr:hover { background: rgba(194, 1, 2, 0.04); }
    .sc-table td:nth-child(3) { font-weight: 600; color: #c20102; }
    .sc-contact-box { background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%); padding: 1.25rem 1.5rem; border-radius: 12px; border-left: 4px solid #c20102; margin-top: 1.5rem; }
    .sc-contact-box p { margin: 0.25rem 0; font-size: 1rem; }
    .sc-contact-box a { color: #c20102; font-weight: 600; }
    .sc-direction-card {
        display: block;
        background: #fff;
        border-radius: 14px;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: 2px solid #c20102;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        position: relative;
        padding-right: 3.5rem;
    }
    .sc-direction-card:hover { box-shadow: 0 12px 32px rgba(194, 1, 2, 0.2); text-decoration: none; color: inherit; transform: translateY(-3px); }
    .sc-direction-card .card-title { font-size: 1.1rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.35rem; }
    .sc-direction-card:hover .card-title { color: #c20102; }
    .sc-direction-card .card-desc { font-size: 0.95rem; line-height: 1.5; color: #555; margin-bottom: 0; }
    .sc-direction-card .card-arrow {
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(194, 1, 2, 0.12);
        color: #c20102;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .sc-direction-card:hover .card-arrow { background: #c20102; color: #fff; transform: translateY(-50%) translateX(4px); }
</style>

{{-- Cadre de direction : vers la page CPD (overview) --}}
<a href="{{ route('pageTraining', 'short-courses-cpd') }}" class="sc-direction-card">
    <h3 class="card-title">Short Courses &amp; CPD overview</h3>
    <p class="card-desc">Purpose, who the courses are for, delivery approach, certification, customised training and governance.</p>
    <span class="card-arrow"><i class="fas fa-arrow-right"></i></span>
</a>


<div class="trl-tile-sc">
      <i class="fas fa-book-open"  style="color: #c20102"></i><h3>Short Courses and Professional Development</h3>
    <p>AIRID develops and delivers short courses and workshops for researchers, programme staff, and partners, covering areas such as: research methods and study design; monitoring, evaluation, and learning; data analysis and interpretation; ethics, safeguarding, and regulatory compliance; and scientific writing and evidence translation. These courses are designed to meet the needs of national programmes, institutions, and regional partners.</p>
</div>

<div class="trl-tile-sc">
    <h3>AIRID Short Courses &amp; Continuing Professional Development</h3>
    <p>AIRID offers a portfolio of short courses designed to provide targeted, competency-based training for professionals working in infectious disease research, surveillance, vector control, laboratory sciences, and public health implementation. These courses are delivered through AIRID's laboratories, field sites, and research platforms, and are suitable for individuals as well as institutions seeking customised training.</p>

    <h4 class="mt-4 mb-2" style="font-size: 1.1rem; font-weight: 700; color: #1a1a1a;">Portfolio of Short Courses</h4>
    <div class="sc-table-wrap">
        <table class="sc-table">
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Duration</th>
                    <th>Fee (USD)</th>
                    <th>Overview of Course Content</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Principles of Good Laboratory Practice (GLP) and Good Clinical Practice (GCP)</td>
                    <td>5 days</td>
                    <td>750</td>
                    <td>Overview of international GLP and GCP standards, quality systems, documentation, audits, and regulatory compliance in laboratory and clinical research.</td>
                </tr>
                <tr>
                    <td>Laboratory Evaluation of Vector Control Products</td>
                    <td>10 days</td>
                    <td>2,500</td>
                    <td>Hands-on training in WHO laboratory bioassays, insecticide efficacy testing, and quality evaluation of vector control tools.</td>
                </tr>
                <tr>
                    <td>Experimental Hut Evaluation of Vector Control Products</td>
                    <td>12 days</td>
                    <td>3,200</td>
                    <td>Design and conduct of WHO Phase II experimental hut trials, including mosquito collection, data analysis, and interpretation.</td>
                </tr>
                <tr>
                    <td>Cluster Randomised Controlled Trials of Health Interventions</td>
                    <td>7 days</td>
                    <td>1,800</td>
                    <td>Methods for designing, implementing, and analysing cluster randomised trials evaluating public health interventions.</td>
                </tr>
                <tr>
                    <td>Applied Molecular Diagnostics for Parasite and Vector Surveillance</td>
                    <td>15 days</td>
                    <td>3,500</td>
                    <td>Practical training in PCR, ELISA, genotyping, and molecular tools for detecting parasites, vectors, and resistance markers.</td>
                </tr>
                <tr>
                    <td>Monitoring and Evaluation of Public Health Interventions</td>
                    <td>5 days</td>
                    <td>900</td>
                    <td>Tools and frameworks for planning, monitoring, and evaluating health programmes, including indicators and data quality.</td>
                </tr>
                <tr>
                    <td>Research Ethics and Regulatory Compliance in Human Studies</td>
                    <td>4 days</td>
                    <td>500</td>
                    <td>Ethical principles, informed consent processes, and regulatory frameworks governing research involving human participants.</td>
                </tr>
                <tr>
                    <td>Management and Analysis of Research Data</td>
                    <td>10 days</td>
                    <td>1,400</td>
                    <td>Practical approaches to organising, managing, analysing, and interpreting research datasets.</td>
                </tr>
                <tr>
                    <td>Malaria Vector Control for Programme Officers</td>
                    <td>10 days</td>
                    <td>1,200</td>
                    <td>Operational training on malaria vector control strategies, tools, planning, and programme implementation.</td>
                </tr>
                <tr>
                    <td>Insecticides, Resistance Detection and Management</td>
                    <td>3 days</td>
                    <td>650</td>
                    <td>Overview of insecticide classes, resistance mechanisms, detection methods, and resistance management strategies.</td>
                </tr>
                <tr>
                    <td>Health Economics and Cost-Effectiveness Analysis</td>
                    <td>5 days</td>
                    <td>1,000</td>
                    <td>Methods for costing, cost-effectiveness analysis, and value-for-money assessment of health interventions.</td>
                </tr>
                <tr>
                    <td>Community Engagement and Social Science in Health Research</td>
                    <td>4 days</td>
                    <td>600</td>
                    <td>Participatory methods and social science approaches to improve community engagement and acceptability of research.</td>
                </tr>
                <tr>
                    <td>Scientific Writing and Grant Proposal Development</td>
                    <td>4 days</td>
                    <td>600</td>
                    <td>Skills for preparing scientific manuscripts, policy briefs, and competitive grant proposals.</td>
                </tr>
                <tr>
                    <td>Quality Assurance Management</td>
                    <td>5 days</td>
                    <td>1,000</td>
                    <td>Principles and tools for quality management systems, audits, documentation, and continuous improvement.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="mt-3 mb-0"><strong>Fees</strong> typically cover tuition, training materials, practical sessions, and a certificate of completion. Travel, accommodation, and subsistence are not included unless otherwise specified. AIRID also offers customised and group training packages on request.</p>
</div>

<div class="trl-tile-sc">
    <h3><i class="fas fa-envelope"></i> Contact</h3>
    <div class="sc-contact-box">
        <p><strong>African Institute for Research in Infectious Diseases (AIRID)</strong></p>
        <p>Cotonou, Benin</p>
        <p>Email: <a href="mailto:training@airid-africa.com">training@airid-africa.com</a></p>
        {{-- <p>Website: <a href="https://www.airid-africa.com" target="_blank" rel="noopener">www.airid-africa.com</a></p> --}}
    </div>
</div>

<p class="mt-2"><a href="{{ route('educationTrainingPage') }}#our-approach" class="btn btn-outline-danger">Back to Training &amp; Capacity Strengthening <i class="fas fa-arrow-right ms-1"></i></a></p>
