<?php

namespace Database\Seeders;

use App\Models\AIRID_Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $list_videos = [
            [
                "title_video"=>"World Malaria Day 2025",
                "description_video"=>"25 April - World Malaria Day | Theme 2025 : Malaria Ends With Us: Reinvest, Reimagine, Reignite
                
                Every year, malaria costs more than 600,000 lives. Yet it is preventable, treatable and eliminable.
                In 2025, the call is loud:
                
                🔁 Reinvest in research, access to care and prevention
                💡 Reimagine our approaches to adapt to today's challenges
                🤝 Rekindling international collaboration to sustainably eliminate malaria
                
                On this World Malaria Day, we are reimagining our capacity to contribute to the development of novel vector control tools for effective malaria control. We are reinvesting in new technologies in our GLP certified facility in Benin and reigniting our partnerships and collaborations to ensure that malaria ends with us.
                
                Let’s Reinvest, Reimagine, and Reignite so that Malaria Ends with Us.",


                "lien_youtube_video"=>"https://www.youtube.com/embed/t7rgHTOxBHk",
                "nom_local_video"=>"",
                "date_video"=>"2025-04-25",
            ],

            [
                "title_video"=>"VRBM VCWG members visited our GLP-certified vector control product testing facility at CREC, Cotonou",
                "description_video"=>"On March 2nd 2025, we received members of the RBM Vector Control Working Group at our GLP-certified Facility in Cotonou, Benin. It was a pleasure to interact with you and to give you a guided tour of our facility and the various types of studies we perform to contribute towards the development of novel vector control products. We have captured this memorable visit in this video. Hope you like it",
                "lien_youtube_video"=>"https://www.youtube.com/embed/tgUygE8QfFQ",
                "nom_local_video"=>"",
                "date_video"=>"2025-03-21",
            ],
            [
                "title_video"=>"Break the Bias, Women and Girls In Science Day : Unpacking the STEM careers : Her voices in Science",
                "description_video"=>"International Day of Women and Girls in Science | On this International Day of Women and Girls in Science, under the theme “Unpacking STEM Careers: Her Voice in Science”, we celebrate the careers of the incredible women in our team. These are medical entomologists, insectary technicians, laboratory technologists, quality assurance specialists etc committed to fighting vector-borne diseases.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/DrPDiILiH4g",
                "nom_local_video"=>"",
                "date_video"=>"2025-02-11",
            ],
            [
                "title_video"=>"INTERNATIONAL WOMEN'S DAY 2024 II CREC-LSHTM CELEBRATES WOMEN'S LEADERSHIP",
                "description_video"=>"#IWD2024: Invest in Women: Accelarate progress. As we celebrate this year’s #InternationalWomenDay, we celebrate the achievements of the #women in our facility and acknowledge the accelerated #progress we have experienced. Thanks to their hard work, professionalism and leadership. We commit ourselves to continue #investing in these very talented professional #women. Happy International Women’s Day!",
                "lien_youtube_video"=>"https://www.youtube.com/embed/4INUPiRpKu0",
                "nom_local_video"=>"",
                "date_video"=>"2024-03-08",
            ],
            [
                "title_video"=>"CREC/LSHTM Year 2023 Recap Video",
                "description_video"=>"Many thanks to our staff and partners for contributing to our successful year. This video presents highlights of our activities in the past year as we look forward to a 2024 full of achievements and growth. Happy New Year 2024!",
                "lien_youtube_video"=>"https://www.youtube.com/embed/PD9xs6hBKJ4",
                "nom_local_video"=>"",
                "date_video"=>"2024-01-23",
            ],
            [
                "title_video"=>"IVCC Stakeholder Forum 2023 - Presentation of CREC-LSHTM Facility Manager II Dr Corine NGUFOR",
                "description_video"=>"This is a snapshot of the presentation of our Facility Manager at IVCC Stakeholder Forum 2023 on African Leadership in vector control product evaluation by the GLP-certified CREC/LSHTM facility. To #endmalaria, we must continue to invest in the development of safe and effective vector control products",
                "lien_youtube_video"=>"https://www.youtube.com/embed/0CSlA1h982o",
                "nom_local_video"=>"",
                "date_video"=>"2023-10-12",
            ],
            [
                "title_video"=>"CREC/LSHTM a leader in vector control product testing in Africa",
                "description_video"=>"We need innovative vector control products to achieve malaria elimination targets. Capacity in vector control product development and evaluation is essential. The CREC/LSHTM Facility has over the years, developed itself as a leader in vector control product testing in Africa. In this video we showcase the infrastructure, services and research skills available at our GLP-certified Facility.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/LTrJCQxt2Ls",
                "nom_local_video"=>"",
                "date_video"=>"2022-06-01",
            ],
            [
                "title_video"=>"CREC/LSHTM Staff Fitness Exercise | Edition 2 | April 2022",
                "description_video"=>"Ensuring the health and wellness of our staff is essential to the proper functioning of our Facility. Management and staff of CREC/LSHTM embarked on another staff fitness bootcamp which took place recently.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/X2LvEXt7Bcw",
                "nom_local_video"=>"",
                "date_video"=>"2022-05-12",
            ],
            [
                "title_video"=>"Women scientists at CREC/LSHTM | #InternationalWomensDay #breakthebias",
                "description_video"=>"Women scientists at CREC/LSHTM. Experts in vector control product testing.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/I4SW1Jy9MeA",
                "nom_local_video"=>"",
                "date_video"=>"2022-03-08",
            ],
            [
                "title_video"=>"The Impact of GLP certification on vector control products evaluation - Dr Corine Ngufor",
                "description_video"=>"This was presented by our lead scientist and facility manager, Dr Corine Ngufor, at the  1st virtual PAMCA Conference & Exhibition, 20-22 September 2021.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/bAAgjBttv1s",
                "nom_local_video"=>"",
                "date_video"=>"2021-09-28",
            ],
            [
                "title_video"=>"World Mosquito Day 2021",
                "description_video"=>"New vectors control products should also demonstrated efficacy at community level. We perform community trials of new insecticides treated nets and IRS products.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/T0HO6rjBWns",
                "nom_local_video"=>"",
                "date_video"=>"2021-08-20",
            ],
            [
                "title_video"=>"CREC/LSHTM Staff Fitness Bootcamp E01 | April 3, 2021",
                "description_video"=>"The health and welfare of our staff are essential to the proper functioning of our Facility. Here are photos from the first CREC/LSHTM staff fitness bootcamp which took place on 3 April 2021. Visit www.crec-lshtm.org to learn about our works on #vectorcontrol.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/KAWGgdZG0RI",
                "nom_local_video"=>"",
                "date_video"=>"2021-04-07",
            ],
            [
                "title_video"=>"CREC/LSHTM CAPACITY BUILDING: NET CUTTING",
                "description_video"=>"Today we share through this short video, the process of cutting net samples for WHO/PQ Phase I laboratory evaluation of LLINs.",
                "lien_youtube_video"=>"https://www.youtube.com/embed/tWp_cIwpRVg",
                "nom_local_video"=>"",
                "date_video"=>"2021-03-18",
            ],
            [
                "title_video"=>"CREC/LSHTM International Women's Day: Dr Corine NGUFOR-KALU was interviewed by a Local NGO(Via-me)",
                "description_video"=>"Our Facility manager @corinengufor was interviewed by a Local NGO (Via-me) about her leadership during this period of COVID-19. Inspiring .",
                "lien_youtube_video"=>"https://www.youtube.com/embed/C9_8F541eg4",
                "nom_local_video"=>"",
                "date_video"=>"2021-03-12",
            ],
        ];


        foreach ($list_videos as $key => $video) {
            
            $create_video = AIRID_Video::create($video);
        }
    }
}
