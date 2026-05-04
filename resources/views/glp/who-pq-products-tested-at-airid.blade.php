<style>
    .airid-container {
        max-width: 1280px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.03);
        overflow: hidden;
    }

    .airid-header {
        padding: 1.5rem 2rem;
        border-bottom: 2px solid #c10202;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        background: #ffffff;
    }

    .logo-brand {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logo-marqueur {
        background: #c10202;
        min-width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1rem;
        color: #ffffff;
        box-shadow: 0 2px 6px rgba(193, 2, 2, 0.2);
    }

    .airid-titre h1 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #010101;
        letter-spacing: -0.3px;
        margin: 0;
    }

    .airid-titre p {
        font-size: 0.8rem;
        color: #706d6b;
        margin-top: 4px;
        margin-bottom: 0;
        font-weight: 500;
    }

    .badge-who {
        background: #f5f5f5;
        padding: 0.45rem 1.2rem;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
        color: #c10202;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #e0dddc;
    }

    .badge-who i {
        color: #c10202;
        font-size: 0.85rem;
    }

    .toolbar {
        padding: 1rem 2rem;
        background: #ffffff;
        border-bottom: 1px solid #e6e4e2;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }

    .filter-group {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .filter-btn {
        background: transparent;
        border: 1px solid #d1cfcd;
        padding: 0.45rem 1.2rem;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 500;
        color: #010101;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .filter-btn.active {
        background: #c10202;
        border-color: #c10202;
        color: #ffffff;
    }

    .filter-btn:hover:not(.active) {
        border-color: #c10202;
        background: #fff5f5;
    }

    .stats-info {
        background: #f9f9f9;
        padding: 0.4rem 1rem;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 500;
        color: #706d6b;
        border: 1px solid #eceae8;
    }

    .stats-info span {
        font-weight: 700;
        color: #c10202;
    }

    .table-wrapper {
        overflow-x: auto;
        padding: 0 0 0.5rem 0;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.85rem;
        min-width: 780px;
    }

    .product-table th {
        text-align: left;
        padding: 1rem 1rem;
        background-color: #ffffff;
        color: #010101;
        font-weight: 700;
        font-size: 0.8rem;
        letter-spacing: -0.2px;
        border-bottom: 1.5px solid #c10202;
    }

    .product-table td {
        padding: 1rem 1rem;
        border-bottom: 1px solid #edebe9;
        vertical-align: middle;
        color: #010101;
    }

    .product-table tr:hover td {
        background-color: #fef9f9;
    }

    .type-badge {
        display: inline-block;
        padding: 0.25rem 0.8rem;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        background: #f2f2f2;
        color: #010101;
        border: 0.5px solid #dcd9d7;
    }

    .type-irs {
        background: #ffefef;
        color: #c10202;
        border-color: #ffcdcd;
    }

    .type-itn {
        background: #f0f7f5;
        color: #1e5a4d;
        border-color: #c8e0da;
    }

    .type-spatial {
        background: #f0f2f5;
        color: #706d6b;
        border-color: #d6d3d1;
    }

    .product-name {
        font-weight: 700;
        color: #010101;
    }

    .link-cell a {
        color: #c10202;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: opacity 0.2s;
    }

    .link-cell a:hover {
        opacity: 0.8;
        text-decoration: underline;
        text-underline-offset: 3px;
    }

    .no-results {
        text-align: center;
        padding: 2.5rem 1rem;
        color: #706d6b;
        font-weight: 500;
        background: #ffffff;
    }

    .airid-footer {
        padding: 0.9rem 2rem;
        background: #ffffff;
        border-top: 1px solid #eceae8;
        font-size: 0.7rem;
        color: #706d6b;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    @media (max-width: 700px) {
        .airid-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .toolbar {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="airid-container">
    <div class="airid-header">
        <div class="logo-brand">
            <div class="logo-marqueur">AIRID</div>
            <div class="airid-titre">
                <h1>African Institute for Research in Infectious Diseases</h1>
                <p>WHO Prequalification Programme - Vector Control Products</p>
            </div>
        </div>
        <div class="badge-who">
            <i class="fas fa-check-circle"></i>
            <span>WHO Prequalification List</span>
        </div>
    </div>

    <div class="toolbar">
        <div class="filter-group">
            <button class="filter-btn active" data-type="all">All</button>
            <button class="filter-btn" data-type="IRS">IRS (Spraying)</button>
            <button class="filter-btn" data-type="ITN">ITN (Mosquito Nets)</button>
            <button class="filter-btn" data-type="Spatial Emanator">Spatial Emanator</button>
        </div>
        <div class="stats-info">
            <span id="productCount">0</span> prequalified products
        </div>
    </div>

    <div class="table-wrapper">
        <table class="product-table" id="productTable">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Type</th>
                    <th>Sponsor / Manufacturer</th>
                    <th>WHO PQ Date</th>
                    <th>Documentation</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
    </div>

    <div class="airid-footer">
        <span><i class="far fa-copyright"></i> AIRID - Official WHO Prequalification Vector Control Data</span>
    </div>
</div>

<script>
    const productsRaw = [
        { name: "SOVRENTA 15WP", type: "IRS", sponsor: "Syngenta Crop Protection AG", pqDate: "11 Apr, 2025", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/P-11568%20-%20part5v1.pdf" },
        { name: "VECTRON T500", type: "IRS", sponsor: "Mitsui Chemicals Agro, Inc.", pqDate: "11 Mar, 2023", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/P-03226%20-%20part4v5.pdf" },
        { name: "Actellic 300CS", type: "IRS", sponsor: "Syngenta Crop Protection AG", pqDate: "29 Jan, 2018", link: "https://extranet.who.int/prequal/vector-control-products/actellic-300cs" },
        { name: "Fludora Fusion", type: "IRS", sponsor: "Envu (Environmental Science U.S. LLC.)", pqDate: "13 Dec, 2018", link: "https://extranet.who.int/prequal/vector-control-products/fludora-fusion" },
        { name: "PermaNet Dual", type: "ITN", sponsor: "Vestergaard Sarl", pqDate: "17 Mar, 2023", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/P-03228%20-%20part5v4.pdf" },
        { name: "Yorkool G5 LN", type: "ITN", sponsor: "Tianjin Yorkool International Trading Co., Ltd", pqDate: "16 Sep, 2024", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/p-12507-part5v2.pdf" },
        { name: "DuraNet Plus", type: "ITN", sponsor: "Shobikaa Impex Private Limited", pqDate: "13 Aug, 2020", link: "https://extranet.who.int/prequal/vector-control-products/duranet-plus" },
        { name: "GreenNet", type: "ITN", sponsor: "Shobikaa Impex Private Limited", pqDate: "16 Aug, 2024", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/p-00320-part5v1.pdf" },
        { name: "Royal Guard", type: "ITN", sponsor: "Mainpol GmbH", pqDate: "29 Mar, 2019", link: "https://extranet.who.int/prequal/vector-control-products/royal-guard" },
        { name: "Tsara Boost", type: "ITN", sponsor: "PPP Hollandi DMCC", pqDate: "29 Jan, 2018", link: "https://extranet.who.int/prequal/vector-control-products/tsara-boost" },
        { name: "Yorkool G1 LN", type: "ITN", sponsor: "Tianjin Yorkool International Trading Co., Ltd", pqDate: "17 Apr, 2024", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/P-11664%20-%20part5v3.pdf" },
        { name: "Interceptor G2", type: "ITN", sponsor: "BASF AGRO B.V. Arnhem (NL) Freienbach Branch", pqDate: "29 Jan, 2018", link: "https://extranet.who.int/prequal/vector-control-products/interceptor-g2" },
        { name: "SC Johnson Mosquito Shield", type: "Spatial Emanator", sponsor: "S.C. Johnson & Son, Inc.", pqDate: "13 Aug, 2025", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/P-13380%20-%20part5v1.pdf" },
        { name: "Guardian", type: "Spatial Emanator", sponsor: "S.C. Johnson & Son, Inc.", pqDate: "13 Aug, 2025", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/P-12643%20-%20part5v1.pdf" },
        { name: "Yorkool G3 LN", type: "ITN", sponsor: "Tianjin Yorkool International Trading Co., Ltd", pqDate: "18 Apr, 2023", link: "https://extranet.who.int/prequal/sites/default/files/doc_parts/021-003%20-%20part5v1_0.pdf" }
    ];

    function parseDateToObj(dateStr) {
        const months = { Jan: 0, Feb: 1, Mar: 2, Apr: 3, May: 4, Jun: 5, Jul: 6, Aug: 7, Sep: 8, Oct: 9, Nov: 10, Dec: 11 };
        const parts = dateStr.replace(",", "").split(" ");
        if (parts.length >= 3) {
            const day = parseInt(parts[0], 10);
            const month = months[parts[1]];
            const year = parseInt(parts[2], 10);
            return new Date(year, month, day);
        }
        return new Date(0);
    }

    let allProducts = [...productsRaw];
    allProducts.sort((a, b) => parseDateToObj(b.pqDate) - parseDateToObj(a.pqDate));
    let currentFilter = "all";

    function getTypeBadgeClass(type) {
        if (type === "IRS") return "type-irs";
        if (type === "ITN") return "type-itn";
        if (type === "Spatial Emanator") return "type-spatial";
        return "";
    }

    function escapeHtml(str) {
        if (!str) return "";
        return str.replace(/[&<>]/g, function(m) {
            if (m === "&") return "&amp;";
            if (m === "<") return "&lt;";
            if (m === ">") return "&gt;";
            return m;
        });
    }

    function renderTable() {
        const tbody = document.getElementById("tableBody");
        if (!tbody) return;

        let filtered = [];
        if (currentFilter === "all") {
            filtered = [...allProducts];
        } else {
            filtered = allProducts.filter((p) => p.type === currentFilter);
        }

        document.getElementById("productCount").innerText = filtered.length;

        if (filtered.length === 0) {
            tbody.innerHTML = '<tr><td colspan="5" class="no-results"><i class="fas fa-filter"></i> No products found for "' + currentFilter + '".</td></tr>';
            return;
        }

        let htmlRows = "";
        for (let i = 0; i < filtered.length; i++) {
            const prod = filtered[i];
            const badgeClass = getTypeBadgeClass(prod.type);
            const typeLabel = prod.type;
            htmlRows += '<tr>' +
                '<td class="product-name">' + escapeHtml(prod.name) + '</td>' +
                '<td><span class="type-badge ' + badgeClass + '">' + escapeHtml(typeLabel) + "</span></td>" +
                "<td>" + escapeHtml(prod.sponsor) + "</td>" +
                "<td>" + escapeHtml(prod.pqDate) + "</td>" +
                '<td class="link-cell"><a href="' + escapeHtml(prod.link) + '" target="_blank" rel="noopener noreferrer"><i class="fas fa-file-pdf"></i> View report</a></td>' +
                "</tr>";
        }
        tbody.innerHTML = htmlRows;
    }

    function initFilters() {
        const buttons = document.querySelectorAll(".filter-btn");
        buttons.forEach((btn) => {
            btn.addEventListener("click", function() {
                const filterValue = this.getAttribute("data-type");
                if (filterValue === "all") {
                    currentFilter = "all";
                } else {
                    currentFilter = filterValue;
                }
                buttons.forEach((b) => b.classList.remove("active"));
                this.classList.add("active");
                renderTable();
            });
        });
    }

    (function init() {
        initFilters();
        renderTable();
    })();
</script>
