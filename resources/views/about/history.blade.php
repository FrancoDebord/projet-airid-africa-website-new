<div class="about-history-content">
    <section class="about-history-timeline-section py-3">
        <div class="container px-0">
            <div class="about-history-timeline">
                <div class="about-history-timeline-item">
                    <div class="about-history-timeline-dot"></div>
                    <div class="about-history-timeline-card">
                        <div class="about-history-timeline-year">2021</div>
                        <div class="about-history-timeline-text">
                            The African Institute for Research in Infectious Diseases (AIRID) was established to address the burden of infectious diseases in Africa. It was created through collaboration between local health authorities, international research institutions, and development partners.
                        </div>
                    </div>
                </div>
<div class="about-history-timeline-item">
                    <div class="about-history-timeline-dot"></div>
                    <div class="about-history-timeline-card">
                        <div class="about-history-timeline-year">2021</div>
                        <div class="about-history-timeline-text">
                            AIRID is a legally registered non-profit research organisation in the Republic of Benin (Registration No. 2021/No 240/MISP/DC/SGM/DAIC/SAAP-ASSOC/SA, IFU No. 6202213991612). It operates in accordance with national regulations on research and innovation under the oversight of the Ministry of Higher Education, Research and Innovation, and is also accountable to the Ministry of Health for all health-related research activities. Through this governance framework, AIRID ensures transparency, accountability, and ethical conduct while advancing its mission to improve health outcomes across Africa.
                        </div>
                    </div>
                </div>
                <div class="about-history-timeline-item">
                    <div class="about-history-timeline-dot"></div>
                    <div class="about-history-timeline-card">
                        <div class="about-history-timeline-year">2021 - Present</div>
                        <div class="about-history-timeline-text">
                            AIRID strengthens research capacity and fosters partnerships to design and evaluate interventions tailored to African populations. Its work focuses on interdisciplinary research, building local expertise, and translating findings into impactful public health programs.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Scoped to History page only – évite les conflits avec le reste du site */
    .about-history-content .section-title {
        font-size: var(--airid-h2-size);
        font-weight: 700;
        color: var(--airid-title-color);
        margin-bottom: 0.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 3px solid #c20102;
    }

    .about-history-content .section-content {
        font-size: var(--airid-text-size);
        line-height: var(--airid-text-line-height);
        color: var(--airid-text-color);
        margin-bottom: 0.75rem;
    }

    .about-history-content .section-content p {
        margin-bottom: 0.5rem;
    }

    .about-history-timeline-section {
        background: #f8f9fa;
        margin-left: -1.5rem;
        margin-right: -1.5rem;
        padding: 1rem 1.5rem;
    }

    @media (max-width: 768px) {
        .about-history-timeline-section {
            margin-left: -1rem;
            margin-right: -1rem;
            padding: 0.75rem 1rem;
        }
    }

    .about-history-timeline {
        position: relative;
        padding: 1rem 0;
    }

    .about-history-timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
        transform: translateX(-50%);
        z-index: 0;
    }

    .about-history-timeline-item {
        position: relative;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        z-index: 1;
    }

    .about-history-timeline-item:last-child {
        margin-bottom: 0;
    }

    .about-history-timeline-item:nth-child(odd) {
        flex-direction: row;
    }

    .about-history-timeline-item:nth-child(even) {
        flex-direction: row-reverse;
    }

    .about-history-timeline-card {
        width: 45%;
        background: #fff;
        border-radius: 12px;
        padding: 1.25rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        position: relative;
        border-left: 4px solid #c20102;
    }

    .about-history-timeline-item:nth-child(odd) .about-history-timeline-card {
        margin-right: auto;
    }

    .about-history-timeline-item:nth-child(even) .about-history-timeline-card {
        margin-left: auto;
        border-left: none;
        border-right: 4px solid #c20102;
    }

    .about-history-timeline-dot {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #c20102;
        border: 4px solid #fff;
        box-shadow: 0 0 0 4px #c20102;
        z-index: 2;
        flex-shrink: 0;
    }

    .about-history-timeline-year {
        font-size: var(--airid-h3-size);
        font-weight: 700;
        color: #c20102;
        margin-bottom: 0.35rem;
    }

    .about-history-timeline-text {
        font-size: var(--airid-text-size);
        color: var(--airid-text-color);
        line-height: var(--airid-text-line-height);
    }

    @media (max-width: 768px) {
        .about-history-timeline::before {
            left: 1.5rem;
        }

        .about-history-timeline-item {
            flex-direction: row !important;
        }

        .about-history-timeline-card {
            width: calc(100% - 4rem);
            margin-left: 4rem !important;
            margin-right: 0 !important;
            border-left: 4px solid #c20102;
            border-right: none;
        }

        .about-history-timeline-item:nth-child(even) .about-history-timeline-card {
            margin-left: 4rem !important;
            border-right: none;
        }

        .about-history-timeline-dot {
            left: 1.5rem;
        }
    }
</style>
