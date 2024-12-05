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
      
/* Existing styles */
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

#menu-btn {
    display: initial;
    position: absolute;
    top: 50%;
    right: 20px; /* Adjust this value according to your design */
    transform: translateY(-50%);
}

.header .navbar {
    position: absolute;
    top: 115%;
    right: 2rem;
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

.header .navbar.active {
    transform: scale(1);
    opacity: 1;
    transition: .2s ease-out;
}

.header .navbar a {
    font-size: 2rem;
    display: block;
    margin: 2rem;
}

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1001; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
}

.modal-content {
    background-color: white;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    border-radius: 10px;
    position: relative;
    text-align: center;
}

.modal-content p {
    text-align: left;
}

.modal-content h4 {
    font-size: 15px;
    color: var(--green);
    margin-top: 10px;
}

.modal-content img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.close {
    color: #aaa;
    position: absolute;
    top: 10px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.similar-medicines {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
}

.similar-medicines .box {
    cursor: pointer;
    flex: 1 1 calc(25% - 20px); /* Responsive card size */
    max-width: calc(25% - 20px); /* Max width for each card */
    box-sizing: border-box;
    padding: 15px;
    margin: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
    text-align: center;
}

.similar-medicines .box img {
    width: 100px; /* Set a fixed width for all images */
    height: 100px; /* Set a fixed height for all images */
    object-fit: cover; /* Crop the image to cover the box */
    border-radius: 5px; /* Optional: rounded corners */
    margin-bottom: 10px;
}

.similar-medicines .box h3 {
    font-size: 14px;
    margin: 10px 0 5px 0;
}

/* Responsive styles for the modal */
@media screen and (max-width: 600px) {
    .modal-content {
        width: 90%;
        margin: 30% auto;
    }
}

/* Media query for smaller devices */
@media screen and (max-width: 600px) {
    .search-bar {
        top: 8px;
        width: calc(70% - 20px); /* Adjusted width for smaller devices */
        max-width: 250px; /* Limiting maximum width for smaller devices */
        left: calc(5% - 10px); /* Slightly move to the right */
        transform: translateX(0%);
    }
    .header {
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
        padding-top: 70px;
    }
}

.box:hover {
    transform: scale(1.05);
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
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
        <div class="search-bar">
            <input type="text" class="search-input" id="searchInput" placeholder="Search by name, specialization, or hospital">
        </div>
    </header>
    
    <section class="doctors" id="doctors">
        <h1 class="heading">Medicine <span>Info</span> </h1>
        <div class="box-container" id="box-container"></div>
    </section>
    
    <!-- Modal structure -->
    <div id="medicineModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImg" src="" alt="Medicine Image">
            <h3 id="modalName"></h3>
            <p><strong>Ingredients: </strong><span id="modalIngredients"></span></p>
            <p><strong>Indication: </strong><span id="modalIndication"></span></p>
            <p><strong>Company: </strong><span id="modalCompany"></span></p>
            <h4>Similar Medicines:</h4>
            <div id="similarMedicines" class="similar-medicines"></div>
        </div>
    </div>
    
    <footer class="footer">
        <!-- Footer content if needed -->
    </footer>
    
    <script src="script.js"></script>
    </body>
    
    
<script src="script.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const medicines = [
        // Category: Fever/Pain Relief
        { name: "Napa", Ingredients: "Paracetamol 500mg", indication: "Fever, Pain relief", company: "Beximco Pharmaceuticals Ltd", image: "napa-500-mg-1634182813132.jpg" },
        { name: "Ace", Ingredients: "Paracetamol 500mg", indication: "Fever, Pain relief", company: "Square Pharmaceuticals Ltd", image: "ace-500-mg-tablet.jpg" },
        { name: "Dolo 650", Ingredients: "Paracetamol 650mg", indication: "Fever, Pain relief", company: "HealthCare Pharma", image: "dolo-650mg.jpg" },
        { name: "Napa Extra", Ingredients: "Paracetamol 500mg, Caffeine 65mg", indication: "Fever, Pain relief", company: "Beximco Pharmaceuticals Ltd", image: "napa-extra.jpg" },
        { name: "Tylenol", Ingredients: "Paracetamol 500mg", indication: "Fever, Pain relief", company: "Johnson & Johnson", image: "tylenol.jpg" },
        { name: "Amdocal", Ingredients: "Amlodipine 5mg", indication: "Hypertension, Angina", company: "Square Pharmaceuticals Ltd", image: "amdocal.jpg" },
        { name: "Cef-3", Ingredients: "Cefixime 200mg", indication: "Bacterial infections", company: "Square Pharmaceuticals Ltd", image: "cef3.jpg" },
        { name: "Flamex", Ingredients: "Ibuprofen 400mg", indication: "Pain, Inflammation", company: "ACI Limited", image: "flamex.jpg" },
        { name: "Panadol", Ingredients: "Paracetamol 500mg", indication: "Fever, Pain relief", company: "GSK", image: "panadol.jpg" },
        { name: "Amoxil", Ingredients: "Amoxicillin 500mg", indication: "Bacterial infections", company: "Beximco Pharmaceuticals Ltd", image: "amoxil.jpg" },
        { name: "Zithrin", Ingredients: "Azithromycin 500mg", indication: "Respiratory infections", company: "Square Pharmaceuticals Ltd", image: "zithrin.jpg" },
        { name: "Ciprocin", Ingredients: "Ciprofloxacin 500mg", indication: "Bacterial infections", company: "Opsonin Pharma Ltd", image: "ciprocin.jpg" },
        { name: "Adrox", Ingredients: "Cefuroxime 500mg", indication: "Bacterial infections", company: "Ad-din Pharmaceuticals Ltd", image: "adrox.jpg" },
        { name: "Erythrocin", Ingredients: "Erythromycin 250mg", indication: "Bacterial infections", company: "MedLife Ltd", image: "erythrocin.jpg" },
        { name: "Clamox", Ingredients: "Amoxicillin 500mg, Clavulanic Acid", indication: "Bacterial infections", company: "Opsonin Pharma Limited", image: "clamox.jpg" },
        { name: "Levoflox", Ingredients: "Levofloxacin 500mg", indication: "Bacterial infections", company: "Drug International Ltd.", image: "levoflox.jpg" },
        { name: "Moxaclav", Ingredients: "Amoxicillin 500mg, Clavulanic Acid", indication: "Bacterial infections", company: "Incepta Pharmaceuticals Ltd", image: "moxaclav.jpg" },
        { name: "Losectil", Ingredients: "Omeprazole 20mg", indication: "GERD, Peptic ulcers", company: "Incepta Pharmaceuticals Ltd", image: "losectil.jpg" },
        { name: "Panoral", Ingredients: "Pantoprazole 40mg", indication: "Acid reflux, GERD", company: "Eskayef Pharmaceuticals Ltd", image: "panoral.jpg" },
        { name: "Nexum", Ingredients: "Esomeprazole 20mg", indication: "GERD, Acid reflux", company: "Square Pharmaceuticals Ltd", image: "nexum.jpg" },
        { name: "Ranitid", Ingredients: "Ranitidine 150mg", indication: "Heartburn, GERD", company: "Square Pharmaceuticals Ltd", image: "rantid.jpg" },
        { name: "Omeprazole", Ingredients: "Omeprazole 20mg", indication: "GERD, Peptic ulcers", company: "Ad-din Pharmaceuticals Ltd", image: "Omrazole-20.jpg" },
        { name: "Alatrol", Ingredients: "Cetirizine Hydrochloride 10mg", indication: "Allergic rhinitis", company: "Square Pharmaceuticals Ltd", image: "alatrol.jpg" },
        { name: "Cetrim", Ingredients: "Cetirizine 10mg", indication: "Allergic rhinitis", company: "Square Pharmaceuticals Ltd", image: "ciprocin.jpg" },
        { name: "Allergex", Ingredients: "Chlorpheniramine 4mg", indication: "Allergic reactions", company: "ACI Limited", image: "ciprocin.jpg" },
        { name: "Fexo", Ingredients: "Fexofenadine 180mg", indication: "Allergic rhinitis", company: "Incepta Pharmaceuticals Ltd", image: "ciprocin.jpg" },
        { name: "Loratin", Ingredients: "Loratadine 10mg", indication: "Allergic rhinitis", company: "Square Pharmaceuticals Ltd", image: "ciprocin.jpg" },
        { name: "Xyzal", Ingredients: "Levocetirizine 5mg", indication: "Allergic rhinitis", company: "Square Pharmaceuticals Ltd", image: "ciprocin.jpg" },
        { name: "Benadryl", Ingredients: "Diphenhydramine 25mg", indication: "Allergic reactions", company: "Johnson & Johnson", image: "ciprocin.jpg" },
        { name: "Zyrtec", Ingredients: "Cetirizine 10mg", indication: "Allergic rhinitis", company: "Johnson & Johnson", image: "ciprocin.jpg" },
        { name: "Claritin", Ingredients: "Loratadine 10mg", indication: "Allergic rhinitis", company: "Bayer", image: "ciprocin.jpg" },
        { name: "Alatrol", Ingredients: "Cetirizine 10mg", indication: "Allergic rhinitis", company: "Incepta Pharmaceuticals Ltd", image: "ciprocin.jpg" },
        { name: "Histacough", Ingredients: "Dextromethorphan 10mg", indication: "Cough relief", company: "Beximco Pharmaceuticals Ltd", image: "" },
        { name: "Colgin", Ingredients: "Dextromethorphan 10mg", indication: "Cough relief", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Tussin", Ingredients: "Dextromethorphan 20mg", indication: "Cough relief", company: "ACI Limited", image: "" },
        { name: "Tuska", Ingredients: "Dextromethorphan 15mg", indication: "Cough relief", company: "Eskayef Pharmaceuticals Ltd", image: "" },
        { name: "Vicks Cough", Ingredients: "Dextromethorphan 10mg", indication: "Cough relief", company: "Procter & Gamble", image: "" },
        { name: "Benylin", Ingredients: "Dextromethorphan 7.5mg", indication: "Cough relief", company: "Johnson & Johnson", image: "" },
        { name: "Triaminic", Ingredients: "Chlorpheniramine 1mg, Phenylephrine 2.5mg", indication: "Cold, Cough", company: "Novartis", image: "" },
        { name: "Mucinex", Ingredients: "Guaifenesin 600mg", indication: "Cough, Chest congestion", company: "Reckitt Benckiser", image: "" },
        { name: "Robitussin", Ingredients: "Dextromethorphan 10mg", indication: "Cough relief", company: "Pfizer", image: "" },
        { name: "Dextro", Ingredients: "Dextromethorphan 15mg", indication: "Cough relief", company: "Opsonin Pharma Ltd", image: "" },
        { name: "Imodium", Ingredients: "Loperamide 2mg", indication: "Diarrhea relief", company: "Johnson & Johnson", image: "" },
        { name: "Diarex", Ingredients: "Loperamide 2mg", indication: "Diarrhea relief", company: "Eskayef Pharmaceuticals Ltd", image: "" },
        { name: "Entamizole", Ingredients: "Metronidazole 500mg, Diloxanide Furoate 500mg", indication: "Amoebic dysentery", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Flagyl", Ingredients: "Metronidazole 400mg", indication: "Bacterial infections", company: "Sanofi", image: "" },
        { name: "Orsaline-N", Ingredients: "Oral Rehydration Salts", indication: "Dehydration", company: "ACME Laboratories Ltd", image: "" },
        { name: "Dioralyte", Ingredients: "Oral Rehydration Salts", indication: "Dehydration", company: "Roche", image: "" },
        { name: "Pedialyte", Ingredients: "Oral Rehydration Salts", indication: "Dehydration", company: "Abbott", image: "" },
        { name: "Oral Saline", Ingredients: "Oral Rehydration Salts", indication: "Dehydration", company: "Beximco Pharmaceuticals Ltd", image: "" },
        { name: "Metronidazole", Ingredients: "Metronidazole 400mg", indication: "Bacterial infections", company: "ACI Limited", image: "" },
        { name: "Zincet", Ingredients: "Zinc Sulfate 20mg", indication: "Diarrhea, Zinc deficiency", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Amdocal", Ingredients: "Amlodipine 5mg", indication: "Hypertension, Angina", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Cardovas", Ingredients: "Bisoprolol 5mg", indication: "Hypertension, Heart failure", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Concor", Ingredients: "Bisoprolol 5mg", indication: "Hypertension, Heart failure", company: "Merck", image: "" },
        { name: "Losartan", Ingredients: "Losartan 50mg", indication: "Hypertension", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Natrilix", Ingredients: "Indapamide 1.5mg", indication: "Hypertension", company: "Servier", image: "" },
        { name: "Aten", Ingredients: "Atenolol 50mg", indication: "Hypertension, Angina", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Olmetec", Ingredients: "Olmesartan 20mg", indication: "Hypertension", company: "Daiichi Sankyo", image: "" },
        { name: "Norvasc", Ingredients: "Amlodipine 5mg", indication: "Hypertension, Angina", company: "Pfizer", image: "" },
        { name: "Plendil", Ingredients: "Felodipine 5mg", indication: "Hypertension, Angina", company: "AstraZeneca", image: "" },
        { name: "Amlodipine", Ingredients: "Amlodipine 5mg", indication: "Hypertension, Angina", company: "ACI Limited", image: "" },
        { name: "Metfor", Ingredients: "Metformin 500mg", indication: "Type 2 Diabetes", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Diabetmin", Ingredients: "Metformin 500mg", indication: "Type 2 Diabetes", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Gluformin", Ingredients: "Metformin 500mg", indication: "Type 2 Diabetes", company: "Beximco Pharmaceuticals Ltd", image: "" },
        { name: "Glyset", Ingredients: "Miglitol 25mg", indication: "Type 2 Diabetes", company: "Pfizer", image: "" },
        { name: "Glucophage", Ingredients: "Metformin 500mg", indication: "Type 2 Diabetes", company: "Merck", image: "" },
        { name: "Jardiance", Ingredients: "Empagliflozin 10mg", indication: "Type 2 Diabetes", company: "Boehringer Ingelheim", image: "" },
        { name: "Galvus", Ingredients: "Vildagliptin 50mg", indication: "Type 2 Diabetes", company: "Novartis", image: "" },
        { name: "Amaryl", Ingredients: "Glimepiride 1mg", indication: "Type 2 Diabetes", company: "Sanofi", image: "" },
        { name: "Diaben", Ingredients: "Gliclazide 80mg", indication: "Type 2 Diabetes", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Diabex", Ingredients: "Metformin 500mg", indication: "Type 2 Diabetes", company: "HealthCare Pharma", image: "" },
        { name: "Celin", Ingredients: "Vitamin C 500mg", indication: "Vitamin C deficiency", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Beplex Forte", Ingredients: "B-Complex, Vitamin C", indication: "Vitamin B deficiency", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Neurobion", Ingredients: "Vitamin B1, B6, B12", indication: "Vitamin B deficiency", company: "Merck", image: "" },
        { name: "Calci-D", Ingredients: "Calcium, Vitamin D3", indication: "Calcium & Vitamin D deficiency", company: "Beximco Pharmaceuticals Ltd", image: "" },
        { name: "Ferros", Ingredients: "Ferrous Sulfate", indication: "Iron deficiency anemia", company: "Square Pharmaceuticals Ltd", image: "" },
                { name: "Calcit", Ingredients: "Calcium Carbonate, Vitamin D3", indication: "Calcium & Vitamin D deficiency", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Zincovit", Ingredients: "Zinc, Vitamin C", indication: "Zinc deficiency, Immunity", company: "Eskayef Pharmaceuticals Ltd", image: "" },
        { name: "Centrum", Ingredients: "Multivitamins, Multiminerals", indication: "General health", company: "Pfizer", image: "" },
        { name: "Vitrum", Ingredients: "Multivitamins, Multiminerals", indication: "General health", company: "Pharmaton", image: "" },
        { name: "Cavit", Ingredients: "Calcium, Vitamin D3", indication: "Calcium & Vitamin D deficiency", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Ferovit", Ingredients: "Ferrous Sulfate, Folic Acid", indication: "Iron deficiency anemia", company: "Beximco Pharmaceuticals Ltd", image: "" },
        { name: "Ventolin", Ingredients: "Salbutamol 2mg", indication: "Asthma, COPD", company: "GSK", image: "" },
        { name: "Asmalin", Ingredients: "Salbutamol 2mg", indication: "Asthma, COPD", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Bricanyl", Ingredients: "Terbutaline 2.5mg", indication: "Asthma, COPD", company: "AstraZeneca", image: "" },
        { name: "Montelukast", Ingredients: "Montelukast 10mg", indication: "Asthma, Allergies", company: "ACI Limited", image: "" },
        { name: "Singulair", Ingredients: "Montelukast 10mg", indication: "Asthma, Allergies", company: "Merck", image: "" },
        { name: "Combivent", Ingredients: "Ipratropium Bromide, Salbutamol", indication: "Asthma, COPD", company: "Boehringer Ingelheim", image: "" },
        { name: "Budecort", Ingredients: "Budesonide 200mcg", indication: "Asthma", company: "Cipla", image: "" },
        { name: "Seretide", Ingredients: "Fluticasone, Salmeterol", indication: "Asthma, COPD", company: "GSK", image: "" },
        { name: "Flixonase", Ingredients: "Fluticasone 50mcg", indication: "Allergic rhinitis", company: "GSK", image: "" },
        { name: "Aerolin", Ingredients: "Salbutamol 2mg", indication: "Asthma, COPD", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Sertraline", Ingredients: "Sertraline 50mg", indication: "Depression, Anxiety", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Fluoxetine", Ingredients: "Fluoxetine 20mg", indication: "Depression, OCD", company: "ACI Limited", image: "" },
        { name: "Clonazepam", Ingredients: "Clonazepam 0.5mg", indication: "Anxiety, Panic disorders", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Escitalopram", Ingredients: "Escitalopram 10mg", indication: "Depression, Anxiety", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Alprazolam", Ingredients: "Alprazolam 0.5mg", indication: "Anxiety, Panic disorders", company: "ACI Limited", image: "" },
        { name: "Venlafaxine", Ingredients: "Venlafaxine 75mg", indication: "Depression, Anxiety", company: "Eskayef Pharmaceuticals Ltd", image: "" },
        { name: "Amitriptyline", Ingredients: "Amitriptyline 25mg", indication: "Depression, Neuropathic pain", company: "Incepta Pharmaceuticals Ltd", image: "" },
        { name: "Mirtazapine", Ingredients: "Mirtazapine 15mg", indication: "Depression, Insomnia", company: "Square Pharmaceuticals Ltd", image: "" },
        { name: "Diazepam", Ingredients: "Diazepam 5mg", indication: "Anxiety, Muscle spasms", company: "Beximco Pharmaceuticals Ltd", image: "" },
        { name: "Paroxetine", Ingredients: "Paroxetine 20mg", indication: "Depression, Anxiety", company: "Square Pharmaceuticals Ltd", image: "" }
    ];

    const boxContainer = document.getElementById("box-container");
    const searchInput = document.getElementById("searchInput");
    const modal = document.getElementById("medicineModal");
    const modalImg = document.getElementById("modalImg");
    const modalName = document.getElementById("modalName");
    const modalIngredients = document.getElementById("modalIngredients");
    const modalIndication = document.getElementById("modalIndication");
    const modalCompany = document.getElementById("modalCompany");
    const similarMedicinesContainer = document.getElementById("similarMedicines");
    const closeModal = document.querySelector(".close");

    function renderMedicines(medicinesArray) {
        boxContainer.innerHTML = "";
        medicinesArray.forEach(medicine => {
            const box = document.createElement("div");
            box.className = "box";

            const img = document.createElement("img");
            img.src = medicine.image;
            img.alt = medicine.name;

            const name = document.createElement("h3");
            name.textContent = medicine.name;

            const ingre = document.createElement("span");
            const ingreLabel = document.createElement("strong");
            ingreLabel.textContent = "Ingredients: ";
            ingre.appendChild(ingreLabel);
            ingre.appendChild(document.createTextNode(medicine.Ingredients));
            ingre.className = "ingre-label";
            ingre.appendChild(document.createElement("br"));

            const indication = document.createElement("span");
            const indicationLabel = document.createElement("strong");
            indicationLabel.textContent = "Indication: ";
            indication.appendChild(indicationLabel);
            indication.appendChild(document.createTextNode(medicine.indication));
            indication.className = "indication-label";
            indication.appendChild(document.createElement("br"));

            const company = document.createElement("span");
            const companyLabel = document.createElement("strong");
            companyLabel.textContent = "Company: ";
            company.appendChild(companyLabel);
            company.appendChild(document.createTextNode(medicine.company));
            company.className = "company-label";
            company.appendChild(document.createElement("br"));

            box.appendChild(img);
            box.appendChild(name);
            box.appendChild(ingre);
            box.appendChild(indication);
            box.appendChild(company);

            // Add click event to open modal with medicine details
            box.addEventListener("click", () => {
                modalImg.src = medicine.image;
                modalName.textContent = medicine.name;
                modalIngredients.textContent = medicine.Ingredients;
                modalIndication.textContent = medicine.indication;
                modalCompany.textContent = medicine.company;
                showSimilarMedicines(medicine);
                modal.style.display = "block";
            });

            boxContainer.appendChild(box);
        });
    }

    function showSimilarMedicines(selectedMedicine) {
    similarMedicinesContainer.innerHTML = "";
    
    const similarMedicines = medicines.filter(medicine => 
        medicine !== selectedMedicine && 
        (medicine.Ingredients === selectedMedicine.Ingredients || medicine.indication === selectedMedicine.indication)
    );
    
    similarMedicines.forEach(medicine => {
        const box = document.createElement("div");
        box.className = "box";

        const img = document.createElement("img");
        img.src = medicine.image;
        img.alt = medicine.name;

        const name = document.createElement("h3");
        name.textContent = medicine.name;

        box.appendChild(img);
        box.appendChild(name);

        box.addEventListener("click", () => {
            modalImg.src = medicine.image;
            modalName.textContent = medicine.name;
            modalIngredients.textContent = medicine.Ingredients;
            modalIndication.textContent = medicine.indication;
            modalCompany.textContent = medicine.company;
            showSimilarMedicines(medicine);
        });

        similarMedicinesContainer.appendChild(box);
    });
}
function filterMedicines(searchTerm) {
        const filteredMedicines = medicines.filter(medicine =>
            medicine.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
            medicine.Ingredients.toLowerCase().includes(searchTerm.toLowerCase()) ||
            medicine.indication.toLowerCase().includes(searchTerm.toLowerCase()) ||
            medicine.company.toLowerCase().includes(searchTerm.toLowerCase())
        );
        renderMedicines(filteredMedicines);
    }

    searchInput.addEventListener("input", function() {
        filterMedicines(this.value.trim());
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    renderMedicines(medicines);
});

</script>
</body>
</html>

    searchInput.addEventListener("input", function() {
        filterMedicines(this.value.trim());
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    renderMedicines(medicines);
});


</script>
</body>
</html>