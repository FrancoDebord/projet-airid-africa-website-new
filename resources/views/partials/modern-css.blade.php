<style>
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .fade-in-up.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .content-section {
        background: #fff;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        border-left: 5px solid #c20102;
    }
    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 3px solid #c20102;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .section-title i {
        color: #c20102;
    }
    .section-subtitle {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2c3e50;
        margin-top: 2rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .section-subtitle::before {
        content: '';
        width: 4px;
        height: 30px;
        background: #c20102;
        border-radius: 2px;
    }
    .section-content {
        line-height: 1.9;
        color: #555;
        font-size: 1.05rem;
    }
    .section-content p {
        margin-bottom: 1.5rem;
        text-align: justify;
    }
    .section-content ul, .section-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }
    .section-content li {
        margin-bottom: 0.75rem;
        line-height: 1.8;
    }
    .section-content li strong {
        color: #2c3e50;
        font-weight: 600;
    }
    .hero-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        margin-bottom: 2rem;
    }
    .hero-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .hero-image:hover img {
        transform: scale(1.05);
    }
    .image-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }
    .gallery-item {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
    }
    .gallery-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    .gallery-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .gallery-item:hover .gallery-image {
        transform: scale(1.1);
    }
    .gallery-caption {
        padding: 1rem;
        background: #fff;
        text-align: center;
    }
    .gallery-caption strong {
        color: #2c3e50;
        font-weight: 600;
    }
    .info-card {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #c20102;
    }
    .info-card-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.75rem;
    }
    .modern-table {
        width: 100%;
        border-collapse: collapse;
        margin: 2rem 0;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    }
    .modern-table thead {
        background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
        color: #fff;
    }
    .modern-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
    }
    .modern-table td {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #e0e0e0;
    }
    .modern-table tbody tr:hover {
        background: #f8f9fa;
    }
    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }
    @media (max-width: 768px) {
        .content-section {
            padding: 1.5rem;
        }
        .section-title {
            font-size: 1.5rem;
        }
        .image-gallery {
            grid-template-columns: 1fr;
        }
        .modern-table {
            font-size: 0.9rem;
        }
        .modern-table th, .modern-table td {
            padding: 0.5rem;
        }
    }
</style>
