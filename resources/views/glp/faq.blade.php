<style>
    /* ── Page title ── */
    .faq-page-title {
        font-size: 1.55rem;
        font-weight: 700;
        color: #1a1a1a;
        line-height: 1.4;
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 3px solid #c20102;
    }
    @media (max-width: 576px) {
        .faq-page-title { font-size: 1.2rem; }
    }

    /* ── FAQ hero intro ── */
    .faq-intro {
        background: #f8f9fa;
        border-radius: 14px;
        padding: 1.75rem 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,.06);
        border-left: 4px solid #c20102;
    }
    .faq-intro p {
        font-size: 1.05rem;
        line-height: 1.7;
        color: #444;
        margin-bottom: 0;
    }

    /* ── Accordion wrapper ── */
    .faq-accordion {
        margin-bottom: 2rem;
    }

    /* ── Each card ── */
    .faq-item {
        background: #fff;
        border-radius: 12px;
        margin-bottom: 0.85rem;
        box-shadow: 0 3px 14px rgba(0,0,0,.07);
        border: 1px solid #eee;
        overflow: hidden;
        transition: box-shadow .25s ease;
    }
    .faq-item:hover {
        box-shadow: 0 6px 22px rgba(194,1,2,.12);
    }
    .faq-item.faq-open {
        border-color: #c20102;
        box-shadow: 0 6px 22px rgba(194,1,2,.15);
    }

    /* ── Question button ── */
    .faq-question {
        width: 100%;
        background: none;
        border: none;
        text-align: left;
        padding: 1.1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        cursor: pointer;
        transition: background .2s ease;
    }
    .faq-question:hover {
        background: #fff5f5;
    }
    .faq-item.faq-open .faq-question {
        background: #fff5f5;
    }

    .faq-number {
        flex-shrink: 0;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #c20102;
        color: #fff;
        font-weight: 700;
        font-size: .85rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .faq-question-text {
        flex: 1;
        font-size: 1rem;
        font-weight: 600;
        color: #1a1a1a;
        line-height: 1.45;
    }
    .faq-icon {
        flex-shrink: 0;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 2px solid #c20102;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #c20102;
        font-size: .8rem;
        transition: transform .35s ease, background .25s ease;
    }
    .faq-item.faq-open .faq-icon {
        transform: rotate(180deg);
        background: #c20102;
        color: #fff;
    }

    /* ── Answer panel ── */
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height .4s cubic-bezier(.4,0,.2,1);
    }
    .faq-answer-inner {
        padding: 0 1.5rem 1.4rem 1.5rem;
        border-top: 1px solid #f0e0e0;
    }
    .faq-answer-inner p {
        font-size: .98rem;
        line-height: 1.7;
        color: #444;
        margin-top: 1rem;
        margin-bottom: .5rem;
    }
    .faq-answer-inner p:last-child { margin-bottom: 0; }

    .faq-answer-inner ul {
        list-style: none;
        padding: 0;
        margin: .6rem 0 .6rem 0;
    }
    .faq-answer-inner ul li {
        padding: .3rem 0 .3rem 1.7rem;
        position: relative;
        font-size: .97rem;
        line-height: 1.55;
        color: #444;
    }
    .faq-answer-inner ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #c20102;
        font-weight: 700;
        font-size: 1rem;
    }

    .faq-answer-inner .faq-highlight {
        background: #fff5f5;
        border-left: 3px solid #c20102;
        border-radius: 6px;
        padding: .65rem 1rem;
        margin: .75rem 0;
        font-size: .95rem;
        color: #333;
    }

    /* ── Download button ── */
    .faq-download-bar {
        margin-top: 2.5rem;
        text-align: center;
    }
    .faq-download-btn {
        display: inline-flex;
        align-items: center;
        gap: .6rem;
        background: #c20102;
        color: #fff !important;
        border: none;
        border-radius: 10px;
        padding: .85rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none !important;
        box-shadow: 0 4px 16px rgba(194,1,2,.35);
        transition: background .25s ease, transform .2s ease, box-shadow .25s ease;
    }
    .faq-download-btn:hover {
        background: #a00101;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(194,1,2,.45);
        color: #fff !important;
    }
    .faq-download-btn i { font-size: 1.1rem; }

    @media (max-width: 576px) {
        .faq-question { padding: .9rem 1rem; }
        .faq-answer-inner { padding: 0 1rem 1.1rem 1rem; }
        .faq-intro { padding: 1.2rem 1.1rem; }
    }
</style>

{{-- ── Page title ── --}}
<h1 class="faq-page-title">
    Frequently Asked Questions (FAQs) about Good Laboratory Practice at the African Institute for Research in Infectious Diseases (AIRID), Cotonou, Benin
</h1>

{{-- ── Page intro ── --}}
<div class="faq-intro">
    <p>
        AIRID operates the only OECD GLP-accredited facility in the Republic of Benin, generating internationally recognised
        data to support regulatory decision-making and WHO Prequalification assessments. The following FAQs have been developed
        to guide engagement with AIRID on GLP studies.
    </p>
</div>

{{-- ── Accordion ── --}}
<div class="faq-accordion" id="glpFaqAccordion">

    {{-- Q1 --}}
    <div class="faq-item" id="faq-1">
        <button class="faq-question" onclick="toggleFaq(1)">
            <span class="faq-number">1</span>
            <span class="faq-question-text">What is GLP and why is it important?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-1">
            <div class="faq-answer-inner">
                <p>Good Laboratory Practice (GLP) is a quality system governing how non-clinical health and environmental safety
                   studies are planned, conducted, monitored, recorded, and reported. GLP is a key requirement for regulatory
                   evaluation, particularly for the prequalification of public health products by the World Health Organization.</p>
                <p>GLP ensures:</p>
                <ul>
                    <li>Data integrity and traceability</li>
                    <li>Compliance with WHO Prequalification (PQ) requirements, where core efficacy and safety data are expected from GLP-compliant studies</li>
                    <li>International acceptance of data (OECD standards)</li>
                    <li>Credible and reliable evidence for regulatory and policy decision-making</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Q2 --}}
    <div class="faq-item" id="faq-2">
        <button class="faq-question" onclick="toggleFaq(2)">
            <span class="faq-number">2</span>
            <span class="faq-question-text">Is AIRID GLP certified?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-2">
            <div class="faq-answer-inner">
                <p>Yes. AIRID operates an OECD GLP-compliant facility accredited by the South African National Accreditation System (SANAS),
                   recognised through international inspection frameworks. AIRID has formally taken over the GLP-certified activities and
                   facilities of the CREC-LSHTM collaborative research programme, ensuring continuity of GLP operations in Benin under AIRID's leadership.</p>
                <ul>
                    <li>Established as the first OECD GLP-compliant vector control evaluation facility in West Africa (2019)</li>
                    <li>Remains the only GLP-accredited test facility in Benin</li>
                    <li>Holds GLP accreditation under Facility No. G028 issued by SANAS, now registered in the name of AIRID</li>
                    <li>Maintains compliance through routine external inspections and ongoing quality assurance oversight</li>
                </ul>
                <div class="faq-highlight">
                    <i class="fas fa-link" style="color:#c20102; margin-right:.4rem;"></i>
                    <strong>GLP Certificate (Facility No. G028 – SANAS):</strong>
                    <a href="{{ route('glpPage', 'certification-sanas') }}" style="color:#c20102;">View GLP Certificate</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Q3 --}}
    <div class="faq-item" id="faq-3">
        <button class="faq-question" onclick="toggleFaq(3)">
            <span class="faq-number">3</span>
            <span class="faq-question-text">How can partners verify GLP status?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-3">
            <div class="faq-answer-inner">
                <p>Partners are encouraged to independently verify GLP compliance through the South African National Accreditation System (SANAS),
                   which maintains official records of accredited test facilities.</p>
                <p>To confirm GLP status, partners should:</p>
                <ul>
                    <li>Verify the test facility listing and accreditation details on the SANAS website</li>
                    <li>Contact the nominated representatives of the test facility as listed on SANAS to confirm accreditation status where necessary</li>
                    <li>Request the GLP certificate and defined scope of compliance</li>
                    <li>Confirm the test facility name, accreditation number (Facility No. G028), and study location</li>
                    <li>Review the current inspection and accreditation status, if required</li>
                </ul>
                <p>AIRID maintains a policy of full transparency and will provide all relevant GLP documentation upon request.</p>
            </div>
        </div>
    </div>

    {{-- Q4 --}}
    <div class="faq-item" id="faq-4">
        <button class="faq-question" onclick="toggleFaq(4)">
            <span class="faq-number">4</span>
            <span class="faq-question-text">What types of GLP studies can AIRID conduct?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-4">
            <div class="faq-answer-inner">
                <p>AIRID specialises in GLP-compliant efficacy studies of vector control products across the full evaluation pathway:</p>
                <ul>
                    <li>Laboratory studies</li>
                    <li>Semi-field and flight room studies</li>
                    <li>Experimental hut trials</li>
                    <li>Community-level evaluations</li>
                </ul>
                <p>AIRID's GLP scope focuses on efficacy testing of vector control products (ITNs, spatial emanators, IRS, ATSBs, larvicides, etc.),
                   with integrated capabilities in analytical chemistry (including active ingredient quantification) and molecular analysis of insect vectors.</p>
                <p>The scope can also be extended to cover other health products, as required, in line with regulatory needs and facility capabilities.</p>
            </div>
        </div>
    </div>

    {{-- Q5 --}}
    <div class="faq-item" id="faq-5">
        <button class="faq-question" onclick="toggleFaq(5)">
            <span class="faq-number">5</span>
            <span class="faq-question-text">What is required to initiate a GLP study at AIRID?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-5">
            <div class="faq-answer-inner">
                <p>To initiate a GLP study, sponsors are expected to provide an overview of the product and intended evaluation, including:</p>
                <ul>
                    <li>Product description and specifications</li>
                    <li>Safety data sheets (SDS)</li>
                    <li>Study concept or protocol if available</li>
                    <li>Regulatory objectives (e.g. WHO Prequalification, national registration)</li>
                    <li>Expected timelines and deliverables</li>
                </ul>
                <p>All information shared with AIRID is handled under strict confidentiality and, where applicable, formal confidentiality agreements.</p>
                <p>AIRID then develops a study outline and implementation timeline, which are shared with the sponsor together with a detailed quotation.
                   Upon approval of the quotation and establishment of a contract, AIRID assigns a Study Director, develops a full GLP-compliant protocol,
                   and initiates the study once the protocol has been reviewed and signed by all parties.</p>
                <div class="faq-highlight">
                    <i class="fas fa-play-circle" style="color:#c20102; margin-right:.4rem;"></i>
                    To learn more about this process, please watch the video on our
                    <a href="{{ route('glpPage', 'why-glp') }}" style="color:#c20102;">Why GLP</a> page.
                </div>
            </div>
        </div>
    </div>

    {{-- Q6 --}}
    <div class="faq-item" id="faq-6">
        <button class="faq-question" onclick="toggleFaq(6)">
            <span class="faq-number">6</span>
            <span class="faq-question-text">What is included in a GLP final report?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-6">
            <div class="faq-answer-inner">
                <p>A GLP final report provides a complete and auditable record of the study, including:</p>
                <ul>
                    <li>The approved study protocol and any amendments</li>
                    <li>A detailed description of methods and procedures</li>
                    <li>Summarised results, including raw data and statistical analyses</li>
                    <li>Quality Assurance (QA) statements and inspection records</li>
                    <li>A signed statement from the Study Director confirming the integrity of the study</li>
                    <li>A Certificate of Affirmation signed by the Facility Manager, confirming the study was conducted within AIRID's GLP-compliant facility</li>
                </ul>
                <p>This ensures full traceability, transparency, and readiness for regulatory review and audit.</p>
            </div>
        </div>
    </div>

    {{-- Q7 --}}
    <div class="faq-item" id="faq-7">
        <button class="faq-question" onclick="toggleFaq(7)">
            <span class="faq-number">7</span>
            <span class="faq-question-text">Can AIRID support WHO Prequalification (PQ) submissions?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-7">
            <div class="faq-answer-inner">
                <p>Yes. AIRID has extensive experience supporting WHO Prequalification (PQ) submissions for vector control and other public health products.</p>
                <p>AIRID provides:</p>
                <ul>
                    <li>Generation of GLP-compliant efficacy data across laboratory, semi-field, and field settings</li>
                    <li>Technical advisory support for dossier preparation, including alignment with WHO PQ requirements</li>
                </ul>
                <p>AIRID can also work directly with companies throughout the PQ process, providing end-to-end support from study design and data generation
                   to preparation and strengthening of submission dossiers.</p>
            </div>
        </div>
    </div>

    {{-- Q8 --}}
    <div class="faq-item" id="faq-8">
        <button class="faq-question" onclick="toggleFaq(8)">
            <span class="faq-number">8</span>
            <span class="faq-question-text">Does AIRID collaborate with partners on GLP studies?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-8">
            <div class="faq-answer-inner">
                <p>Yes. AIRID collaborates with partners on GLP studies under clearly defined regulatory and operational frameworks.</p>
                <ul>
                    <li>GLP compliance applies only to activities conducted within an approved GLP system</li>
                    <li>Work can be conducted under AIRID's GLP system or in collaboration with other recognised GLP-certified facilities, as appropriate</li>
                    <li>Depending on the sponsor's needs, AIRID can coordinate product testing across multiple GLP sites to support generation of complete datasets in line with WHO PQ requirements</li>
                    <li>Roles, responsibilities, and GLP accountability are clearly defined through formal agreements</li>
                </ul>
                <p>AIRID ensures that all collaborative studies maintain full compliance, traceability, and regulatory acceptability.</p>
            </div>
        </div>
    </div>

    {{-- Q9 --}}
    <div class="faq-item" id="faq-9">
        <button class="faq-question" onclick="toggleFaq(9)">
            <span class="faq-number">9</span>
            <span class="faq-question-text">Can non-GLP studies be conducted at AIRID?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-9">
            <div class="faq-answer-inner">
                <p>Yes. AIRID conducts both:</p>
                <ul>
                    <li>GLP studies, designed for regulatory purposes</li>
                    <li>Non-GLP or exploratory studies, supporting research and product development</li>
                </ul>
                <p>However, only studies conducted in full compliance with GLP standards can be designated and reported as GLP studies.</p>
            </div>
        </div>
    </div>

    {{-- Q10 --}}
    <div class="faq-item" id="faq-10">
        <button class="faq-question" onclick="toggleFaq(10)">
            <span class="faq-number">10</span>
            <span class="faq-question-text">Who should I contact to initiate a GLP study at AIRID?</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" id="faq-answer-10">
            <div class="faq-answer-inner">
                <p>For all GLP enquiries, please contact:</p>
                <div class="faq-highlight">
                    <strong>Facility Manager and Executive Director of AIRID</strong><br>
                    <i class="fas fa-envelope" style="color:#c20102; margin-right:.35rem;"></i>
                    <a href="mailto:corine.ngufor@airid-africa.com" style="color:#c20102;">corine.ngufor@airid-africa.com</a>
                </div>
            </div>
        </div>
    </div>

</div>{{-- /.faq-accordion --}}

{{-- ── Download bar ── --}}
<div class="faq-download-bar">
    <a href="{{ route('glp.faq.download') }}" class="faq-download-btn">
        <i class="fas fa-file-download"></i>
        Download GLP FAQs (PDF)
    </a>
</div>

<script>
(function () {
    var openId = null;

    window.toggleFaq = function (id) {
        var item   = document.getElementById('faq-' + id);
        var panel  = document.getElementById('faq-answer-' + id);
        var isOpen = item.classList.contains('faq-open');

        // Close the currently open item
        if (openId !== null && openId !== id) {
            var prevItem  = document.getElementById('faq-' + openId);
            var prevPanel = document.getElementById('faq-answer-' + openId);
            if (prevItem && prevPanel) {
                prevItem.classList.remove('faq-open');
                prevPanel.style.maxHeight = '0';
            }
        }

        if (isOpen) {
            // Close this one
            item.classList.remove('faq-open');
            panel.style.maxHeight = '0';
            openId = null;
        } else {
            // Open this one
            item.classList.add('faq-open');
            panel.style.maxHeight = panel.scrollHeight + 'px';
            openId = id;
        }
    };
})();
</script>
