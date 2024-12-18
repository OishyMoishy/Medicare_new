<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Information - MEDI CARE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
       .search-bar {
        position: relative;
        width: 40%;
        background-color: var(--green);
        border-radius: 10px;
        padding: 5px;
        z-index: 1000;
        position: fixed;
        top: 25px; /* Adjust this value based on your header height */
        left: 50%;
        transform: translateX(-50%);
    }

    .search-input {
        width: 100%; /* Adjusted width for responsiveness */
        padding: 5px;
        border: none;
        border-radius: 5px;
        outline: none;
        font-size: 16px;
        color: black;
    }

    .search-input::placeholder {
        color: #ccc;
    }
    
    .header {
        position: relative;
    }
   #menu-btn{
            display:initial;
            position: absolute;
        top: 50%;
        right: 20px; /* Adjust this value according to your design */
        transform: translateY(-50%);
        }
        .header .navbar{
        position: absolute;
        top:115%; right: 2rem;
        border-radius: .5rem;
        box-shadow: var(--box-shadow);
        width: 20rem;
        border: var(--border);
        background: #fff;
        transform: scale(0);
        opacity: 0;
        transform-origin: top right;
        transition: none;
    }

    .header .navbar.active{
        transform: scale(1);
        opacity: 1;
        transition: .2s ease-out;
    }

    .header .navbar a{
        font-size: 2rem;
        display: block;
        margin:2rem;
    }
@media screen and (max-width: 600px) {
    .search-bar {
        top:8px;
        width: calc(70% - 20px); /* Adjusted width for smaller devices */
        max-width: 250px; /* Limiting maximum width for smaller devices */
        left: calc(5% - 10px); /* Slightly move to the right */
        transform: translateX(0%);
    }
    .header{
        padding: 3.5rem;
        position: fixed;
    }
    .header .logo {
        display: none; /* Hide the logo */
    }

    /* Adjusting position for the menu button */
    #menu-btn {
        position: absolute;
        top: 50%;
        right: 20px; /* Adjust this value according to your design */
        transform: translateY(-50%);
    }
   
    .heading {
    padding-top: 70px; /* Adjust this value based on your header height */
}
}
.btn1{
    display: inline-block;
    margin-top: 1rem;
    padding: .5rem;
    padding-left: 1rem;
    padding-right: 1rem;
    border:var(--border);
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    color:var(--black);
    cursor: pointer;
    font-size: 1.7rem;
    background: #fff;
}


   
</style>

   
</head>
<body>
<header class="header">
    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i>MEDI CARE</a> 
    <nav class="navbar">
       <a href="index.php#home">Home</a>
        <a href="#services">Services</a>
        <a href="medicine.php">Medicine</a>
        <a href="doctor.php">Doctors</a>
        <a href="location.php">Locations</a>
        <a href="#about">About</a>
        <a href="registerindex.php" class="btn1"> Login </a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
    <div class="search-bar">
        <input type="text" class="search-input" id="searchInput" placeholder="Search by name, specialization, or hospital">
    </div>

    </header>

   
<section class="doctors" id="doctors">
    <h1 class="heading"> our <span>doctors</span> </h1>
    <div class="box-container" id="box-container"></div>
</section>


<footer class="footer">
    <!-- Footer content if needed -->
</footer>

<script src="script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const doctors = [
        { name: "Prof. Dr. Quazi Deen Mohammad", degree: "MBBS, MD (Neurology), FCPS (Medicine), Fellow in Neurology (USA)", specialization: "Neurology & Medicine Specialist", hospital: "National Institute of Neurosciences & Hospital", image: "image/Prof.-Dr.-Quazi-Deen-Mohammad.jpg" },
            { name: "Dr. Md. Shuktarul Islam (Tamim)", degree: "MBBS, MD (Neurology), CCD (BIRDEM)", specialization: "Neurology (Brain, Nerve, Spine, Headache, Epilepsy, Paralysis, Stroke) Specialist", hospital: "National Institute of Neurosciences & Hospital", image: "image/Dr.-Shuktarul-Islam-Tamim.jpg" },
            { name: "Dr. Mohiuddin Ahmed", degree: "MBBS, BCS (Health), FCPS (Medicine), MD (Neurology), MACP (USA)", specialization: "Neurology (Brain, Nerve, Spine, Headache, Epilepsy, Paralysis, Stroke) & Medicine Specialist", hospital: "Dhaka Medical College & Hospital", image: "image/Dr-Mohiuddin-Ahmed-1.jpg" },
            { name: "Prof. Dr. Md. Badrul Alam", degree: "MBBS, MD (Neurology), FACP (USA), FRCP (Glasgow)", specialization: "Neurology (Brain, Stroke, Nerve & Migraine) & Medicine Specialist", hospital: "National Institute of Neurosciences & Hospital", image: "image/Prof.-Dr.-Md.-Badrul-Alam.jpg" },
            { name: "Prof. Dr. Anisul Haque", degree: "MBBS, PhD, FCPS (Medicine), FRCP (Edin)", specialization: "Neurology (Brain, Stroke, Nerve, Headache, Migraine) Specialist", hospital: "Bangabandhu Sheikh Mujib Medical University Hospital", image: "image/Prof.-Dr.-Anisul-Haque.jpg" },
            { name: "Prof. Dr. Ashok Kumar Dutta", degree: "MBBS, FCPS (Medicine), MD (Cardiology), FACC (USA)", specialization: "Cardiology & Medicine Specialist", hospital: "National Heart Foundation Hospital & Research Institute", image: "image/Prof.-Dr.-Ashok-Kumar-Dutta.jpg" },
            { name: "Dr. AKS Zahid Mahmud Khan", degree: "MBBS (Dhaka), MD (Cardiology), MRCPS (Glasgow, UK), FSCAI (USA)", specialization: "Cardiologist & Medicine Specialist", hospital: "National Institute of Cardiovascular Diseases & Hospital", image: "image/Dr.-AKS-Zahid-Mahmud-Khan.jpg" },
            { name: "Prof. Dr. M. Nazrul Islam", degree: "MBBS, FCPS, FRCP (London), FESC, FACC (USA)", specialization: "Cardiology (Heart Diseases) Specialist", hospital: "National Institute of Cardiovascular Diseases & Hospital", image: "image/Prof.-Dr.-M.-Nazrul-Islam.jpg" },
            { name: "Prof. Dr. Dhiman Banik", degree: "MBBS (DMC), D-CARD (DU), MD (Cardiology), FACC (USA)", specialization: "Cardiology & Heart Diseases Specialist", hospital: "National Heart Foundation Hospital & Research Institute", image: "image/Dr.-Dhiman-Banik.jpg" },
            { name: "Prof. Dr. Sajal Banerjee", degree: "MBBS, MD (Cardiology), FCCP, FESC, FACC (USA)", specialization: "Cardiology & Medicine Specialist", hospital: "Bangabandhu Sheikh Mujib Medical University Hospital", image: "image/Prof.-Dr.-Sajal-Krishna-Banerjee.jpg" },
            { name: "Dr. Asif Imran Siddiqui", degree: "MBBS (AFMC), DDV (Thailand),Fellowship Training in Laser & Cutaneous Surgery (Thailand)", specialization: "Skin, Allergy, Hair, Nail, Sexual Diseases Specialist & Laser Surgeon", hospital: "Skinic Dermatology Centre, Mirpur", image: "image/Dr.-Asif-Imran-Siddiqui.jpg" },
            { name: "Prof. Dr. M.N. Huda", degree: "MBBS (DMC), DDV (DU), FCPS (Skin & Sex)", specialization: "Expert Dermatologist, Sexologist & Venereologist", hospital: "Dhaka Medical College & Hospital", image: "image/prof-dr-m-n-huda.jpg" },
            { name: "Prof. Lt. Col. Dr. Md. Abdul Wahab", degree: "MBBS, DDV, MCPS, FACP (USA), FCPS (Dermatology), FRCP (UK), Higher Training (Thailand)", specialization: "Skin, Allergy, Leprosy & Sexual Diseases Specialist", hospital: "Bangabandhu Sheikh Mujib Medical University Hospital", image: "image/Prof.-Lt.-Col.-Dr.-Md.-Abdul-Wahab.jpg" },
            { name: "Prof. Dr. M. U. Kabir Chowdhury", degree: "MBBS, DDV (Vienna), AFICA (USA), FRCP (Glasgow)", specialization: "Skin, Allergy & Sexual Diseases Specialist", hospital: "Holy Family Red Crescent Medical College & Hospital", image: "image/Prof.-Dr.-M.-U.-Kabir-Chowdhury.jpg" },
            { name: "Prof. Dr. M Mujibul Hoque", degree: "MBBS, FCPS, FRCP, DDV (DU), DDV (Austria)", specialization: "Skin, Allergy, Leprosy, Hair & Sexual Diseases Specialist", hospital: "Dhaka Medical College & Hospital", image: "image/Prof.-Dr.-M-Mujibul-Hoque.jpg" },
            { name: "Dr. Bipul Kumer Sarker", degree: "MBBS, FRCS (UK), MRCS (UK), FICO (UK), FCPS", specialization: "Eye Disease, Cataract, Glaucoma Specialist & Phaco Surgeon", hospital: "Ispahani Islamia Eye Institute & Hospital", image: "image/Dr.-Bipul-Kumer-Sarker.jpg" },
            { name: "Prof. Dr. Sheikh M. A. Mannaf", degree: "MBBS, FCPS (EYE), Fellow in Glaucoma (USA)", specialization: "Eye Diseases, Glaucoma, Phaco, Retina & Squint Specialist", hospital: "Harun Eye Foundation Hospital, Dhanmondi", image: "image/Prof.-Dr.-Sheikh-M.-A.-Mannaf.jpg" },
            { name: "Prof. Dr. Sarwar Alam", degree: "MBBS, DO, FCPS (EYE)", specialization: "Eye Specialist, Cornea & Cataract Surgeon", hospital: "•  Ispahani Islamia Eye Institute & Hospital", image: "image/Prof.-Dr.-Sarwar-Alam.jpg" },
            { name: "Prof. Dr. Golam Haider", degree: "MBBS, FCPS (EYE), MCPS (EYE), Fellow in Oculoplasty (India)", specialization: "Eye Lid. Orbit & Ocuplastic Surgeon", hospital: "National Institute of Ophthalmology & Hospital", image: "image/Prof.-Dr.-Golam-Haider.jpg" },
            { name: "Prof. Dr. Md. Salehuddin", degree: "MBBS, FCPS (BD), MS (EYE), MHPED (AU), FCPS (PK), FICS", specialization: "Eye Specialist & Surgeon", hospital: "Bangabandhu Sheikh Mujib Medical University Hospital", image: "image/Prof.-Dr.-Md.-Salehuddin.jpg" },
            { name: "Prof. Dr. Md. Abid Hossain Mollah", degree: "MBBS, FCPS (Pediatrics), D-MED (UK), FACP (USA), FRCP (UK)", specialization: "Neonatal & Child Diseases Specialist", hospital: "Birdem General Hospital & Ibrahim Medical College", image: "image/Prof.-Dr.-Md.-Abid-Hossain-Mollah.jpg" },
            { name: "Prof. Dr. Narayan Chandra Saha", degree: "MBBS, FCPS (Pediatrics), Fellow (Pediatric Neurology)", specialization: "Child Neurology & Autism Specialist", hospital: "National Institute of Neurosciences & Hospital", image: "image/Prof.-Dr.-Narayan-Chandra-Saha.jpg" },
            { name: "Dr. Kanij Fatema", degree: "MBBS, FCPS (Pediatrics), FCPS (Pediatric Neurology)", specialization: "Child Neurology & Autism Specialist", hospital: "Institute of Pediatric Neurodisorder & Autism (IPNA), BSMMU", image: "image/Dr.-Kanij-Fatema.jpg" },
            { name: "Dr. Ahmed Nazmul Anam", degree: "MBBS, BCS (Health), FCPS (Pediatrics), MD (Child Cardiology), PGPN (USA)", specialization: "Child, Child Cardiology & Nutrition Specialist", hospital: "Institute of Child & Mother Health", image: "image/Dr.-Ahmed-Nazmul-Anam.jpg" },
            { name: "Brig. Gen. Prof. Dr. Nurunnahar Fatema Begum", degree: "MBBS, FCPS, FRCP, FACC, FSCAI", specialization: "Child Heart Diseases Specialist & Interventional Pediatric Cardiologist", hospital: "Combined Military Hospital, Dhaka", image: "image/Dr.-Nurunnahar-Fatema-Begum.jpg" },
            { name: "Asst. Prof. Dr. Sharmin Akter Liza", degree: "MBBS, FCPS (OBGYN)", specialization: "Gynecology, Infertility Specialist & Laparoscopic Surgeon", hospital: "Institute of Child and Mother Health (ICMH)", image: "image/Dr.-Sharmin-Akter-Liza.jpg" },
            { name: "Dr. Asma Khatun Aurora", degree: "MBBS, FCPS (Obstetrics & Gynaecology), BCS (Health), CMU (Ultrasound, BTEB),MS (Thesis, Dhaka Medical College Hospital), MRCOG (FP, London, United Kingdom)", specialization: "Obstetrics & Gynaecology Specialist & Surgeon", hospital: "Dhaka Medical College & Hospital", image: "image/Dr.-Most.-Asma-Khatun.jpg" },
            { name: "Asst. Prof. Dr. Rowshan Ara", degree: "MBBS, FCPS (Gynae & Obs), FCPS (Reproductive Endocrinology & Infertility)", specialization: "Infertlity, Obstetrics, Gynaecology & Reproductive Endrocrinology Specialist,Gynaecological, Laparoscopic & Hysteroscopic Surgeon", hospital: "Directorate General of Health Services, Mohakhali, Dhaka", image: "image/Asst.-Prof.-Dr-Rowshan-Ara.jpg" },
            { name: "Dr. Raihana Shawgat", degree: "MBBS (Dhaka), FCPS (Gynae & Obs), FCPS (Reproductive Endocrinology & Infertility)", specialization: "Gynaecologist and Infertility Specialist", hospital: "Dhaka Medical College & Hospital", image: "image/Dr-Raihana-Shawgat.jpg" },
            { name: "Prof. Dr. T. A. Chowdhury", degree: "MBBS, FRCS, FRCOG, FRCP, FCPS (PK), FCPS (BD)", specialization: "Gynecology & Infertility Specialist", hospital: "Birdem General Hospital & Ibrahim Medical College", image: "image/Prof.-Dr.-T.-A.-Chowdhury.jpg" },
            { name: "Prof. Brig. Gen. Dr. Kumrul Hasan", degree: "MBBS, MCPS, MPHIL (Psychiatry), MMEd, Fellow Child Psychiatry (Pakistan), MACP (USA), FRCP (UK)", specialization: "Psychiatry, Brain, Drug Addiction, Sex Specialist & Neuro Psychiatrist", hospital: "Combined Military Hospital, Dhaka", image: "image/Prof.-Brig.-Gen.-Dr.-Kumrul-Hasan.jpg" },
            { name: "Dr. Mekhala Sarkar", degree: "MBBS, FCPS (Psychiatry), Fellow WPA (Turkey),International Fellow, American Psychiatric Association (USA)", specialization: "Mental Health Specialist & Psychiatrist", hospital: "National Institute of Mental Health & Hospital", image: "image/Dr.-Mekhala-Sarkar.jpg" },
            { name: "Dr. Redwana Hossain", degree: "MBBS, BCS (Health), MD (Psychiatry)", specialization: "Psychiatry, Drug Addiction, Dementia & Female Psychosexual Disorder Specialist", hospital: "Shaheed Suhrawardy Medical College & Hospital", image: "image/Dr-Redwana-Hossain.jpg" },
            { name: "Prof. Dr. M. A. Mohit Kamal", degree: "MBBS, MPhil (Psychiatry), PhD (Psychiatry), FWPA (USA), CME-WCP", specialization: "Psychiatry (Mental Diseases) Specialist & Psychotherapist", hospital: "National Institute of Mental Health & Hospital", image: "image/Prof.-Dr.-M.-A.-Mohit-Kamal.jpg" },
            { name: "Prof. Dr. Jhunu Shamsun Nahar", degree: "MBBS, FCPS (Psychiatry),International Fellow of American Psychiatric Association (USA)", specialization: "Psychiatrist & Psychotherapist", hospital: "Bangabandhu Sheikh Mujib Medical University Hospital", image: "image/Prof.-Dr.-Jhunu-Shamsun-Nahar.jpg" },
            { name: "Prof. Dr. Md. Kamrul Islam", degree: "MBBS, FCPS (Surgery), MS (Urology), FRCS (UK)", specialization: "Kidney Transplant Surgeon & Urologist", hospital: "Centre for Kidney Diseases and Urology Hospital", image: "image/Prof.-Dr.-Md.-Kamrul-Islam.jpg" },
            { name: "Dr. Ahmed Sharif", degree: "MBBS, MS (Urology), FACS (USA)", specialization: "Urology, Andrology, Kidney Tumor, Stone Surgery, Prostate Gland Diseases Specialist", hospital: "Holy Family Red Crescent Medical College & Hospital", image: "image/Dr.-Ahmed-Sharif.jpg" },
            { name: "Dr. Shahriar Md. Kabir Hasan", degree: "MBBS, BCS (Health), MS (Urology)", specialization: "Kidney, Ureter, Bladder, Prostate, Male Genitalia, Male Infertility, Sexual Disease Specialist, Endoscopic & Laparoscopic Surgeon", hospital: "National Institute of Kidney Diseases & Urology", image: "image/Dr.-Shahriar-Md.-Kabir-Hasan.jpg" },
            { name: "Prof. Dr. M. A. Salam", degree: "MBBS, FCPS, FICS (USA), WHO Fellow (UK)", specialization: "Urology & Andrology Specialist", hospital: "Bangabandhu Sheikh Mujib Medical University Hospital", image: "image/Prof.-Dr.-M.-A.-Salam.jpg" },
            { name: "Prof. Dr. ATM Mowladad Chowdhury", degree: "MBBS, MS (Urology), FCPS (Surgery), MRCS (Edinburgh), MRCPS (Glasgow)", specialization: "Urology Specialist & Surgeon", hospital: "Birdem General Hospital & Ibrahim Medical College", image: "image/Dr.-ATM-Mowladad-Chowdhury.jpg" },
            { name: "Dr. Sarah Lee", degree: "MD", specialization: "Neurology", hospital: "Neuro Care Hospital", image: "image/doc-5.jpg" },
            { name: "Dr. David Kim", degree: "MD", specialization: "Dermatology", hospital: "Skin Health Clinic", image: "image/doc-6.jpg" },
            { name: "Dr. Jessica Wang", degree: "MD", specialization: "Gynecology", hospital: "Women's Wellness Center", image: "image/doc-7.jpg" },
            { name: "Dr. Christopher Brown", degree: "MD", specialization: "Psychiatry", hospital: "Mind Health Institute", image: "image/doc-8.jpg" },
            { name: "Dr. Daniel Taylor", degree: "MD", specialization: "Urology", hospital: "Urologic Center", image: "image/doc-9.jpg" },
            { name: "Dr. Daniel Taylor", degree: "MD", specialization: "Urology", hospital: "Urologic Center", image: "image/doc-9.jpg" },
            { name: "Dr. Sarah Lee", degree: "MD", specialization: "Neurology", hospital: "Neuro Care Hospital", image: "image/doc-5.jpg" },
            { name: "Dr. David Kim", degree: "MD", specialization: "Dermatology", hospital: "Skin Health Clinic", image: "image/doc-6.jpg" },
            { name: "Dr. Jessica Wang", degree: "MD", specialization: "Gynecology", hospital: "Women's Wellness Center", image: "image/doc-7.jpg" },
            { name: "Dr. Christopher Brown", degree: "MD", specialization: "Psychiatry", hospital: "Mind Health Institute", image: "image/doc-8.jpg" },
            { name: "Dr. Daniel Taylor", degree: "MD", specialization: "Urology", hospital: "Urologic Center", image: "image/doc-9.jpg" }
            // Add more doctors as needed
        ];

        const boxContainer = document.getElementById("box-container");
        const searchInput = document.getElementById("searchInput");

        function renderDoctors(doctorsArray) {
            boxContainer.innerHTML = "";
            doctorsArray.forEach(doctor => {
                const box = document.createElement("div");
                box.className = "box";

                const img = document.createElement("img");
                img.src = doctor.image;
                img.alt = doctor.name;

                const name = document.createElement("h3");
                name.textContent = doctor.name;

                const degree = document.createElement("span");
const degreeLabel = document.createElement("strong");
degreeLabel.textContent = "Degree: ";
degree.appendChild(degreeLabel);
degree.appendChild(document.createTextNode(doctor.degree));
degree.className = "degree-label";

degree.appendChild(document.createElement("br")); // Line break

const specialization = document.createElement("span");
const specializationLabel = document.createElement("strong");
specializationLabel.textContent = "Specialization: ";
specialization.appendChild(specializationLabel);
specialization.appendChild(document.createTextNode(doctor.specialization));
specialization.className = "specialization-label";

specialization.appendChild(document.createElement("br")); // Line break



               
const hospital = document.createElement("span");
hospital.className = "hospital-label";

// Create a strong element for "Hospital: "
const hospitalLabel = document.createElement("strong");
hospitalLabel.textContent = "Hospital: ";

// Append the strong element and hospital name
hospital.appendChild(hospitalLabel);
hospital.appendChild(document.createTextNode(doctor.hospital));

hospital.appendChild(document.createElement("br")); // Line break


                const share = document.createElement("div");
                share.className = "share";
                const socialLinks = ["facebook-f", "twitter", "instagram", "linkedin"];
                socialLinks.forEach(link => {
                    const a = document.createElement("a");
                    a.href = "#";
                    a.className = "fab fa-" + link;
                    share.appendChild(a);
                });

                box.appendChild(img);
                box.appendChild(name);
                box.appendChild(degree);
                box.appendChild(specialization);
                box.appendChild(hospital);
                box.appendChild(share);

                boxContainer.appendChild(box);
            });
        }

        function filterDoctors(searchTerm) {
            const filteredDoctors = doctors.filter(doctor =>
                doctor.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                doctor.specialization.toLowerCase().includes(searchTerm.toLowerCase()) ||
                doctor.hospital.toLowerCase().includes(searchTerm.toLowerCase())
            );
            renderDoctors(filteredDoctors);
        }

        searchInput.addEventListener("input", function() {
            filterDoctors(this.value.trim());
        });

        renderDoctors(doctors);
    });
   
</script>
</body>
</html>
