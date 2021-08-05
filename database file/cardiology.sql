-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2015 at 09:24 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cardiology`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `image`, `comments`, `created_at`) VALUES
(2, 'Administration', 'Contact Detail:Cell: 0302 863 0006Our aim is to develop this institute, a research and academic center of international standards linked with university of Health Sciences, College of Physicians and Surgeons Pakistan and Higher Education Commission, which can provide the best Cardiac care facilities. Moreover we desire to evolve a robust Hospital Automation & Clinical Management System, reducing the conventional use of paper based environment.', 'is (6).jpg', 'No Comments', '2015-10-09 07:27:30'),
(3, 'Cardiac Surgery', 'The Department of Cardiac Surgery at CPEIC Multan is one of the leading centres of cardiac surgery in Pakistan. The department started working in 2007 when 34 open heart surgeries were done. Two great cardiac surgeons Prof. Dr. Haider Zaman and Prof. Dr. Anjum Jalal were the pioneers,  who by the help of their surgical and administrative skills, took this unit to such heights that now over 1800 open heart surgeries are being done annually. This is the maximum number of operations being done in any other centre of Pakistan. To date, more than 5500 patients have been benefited by these services. Moreover, the results of Cardiac Surgery are comparable with the international standards according to our database. Not only the routine procedures are being performed here but the centre is well known for aortic surgery e.g. aortic root replacement, beating heart surgery and various complex procedures. Moreover, all sorts of complex pediatric heart surgical procedures are alse being performed with excellent results.Not only the department is providing international standard services to the patients but it has the honour of producing many qualified and trained new cardiac surgeons as well. In the past 5 years, six residents of the cardiac surgery department have done FCPS in cardiac surgery, two of whome Dr. Iftikhar Paras and Dr. Mujtaba Ali Siddiqui are now working as Assistant Professor of Cardiac Surgery at two different cardiac centres of Punjab. our faculty at the moment comprises of one Professor, three Assistant Professors and five Senior Registrars. Our faculty is:\n1.	Prof. Dr. Haider Zaman                       FRCS(GS), FCPS(CS), FRCS-CTh(UK)         Chief Cardiac Surgeon\n2.	Dr. Naseem Ch.                                 FCPS(GS), FCPS(CS)                                 Assistant Professor\n3.	Dr. Shafqat                                        FCPS(CS)                                                 Assistant Professor\n4.	Dr. Tariq Waqar                                 FCPS, FRCS(UK)                                       Assistant Professor Peads Cardiac Surgery\nWe have five Senior Registrars of Cardiac Surgery\n1.	Dr. Ghulam Hussain Qureshi              FCPS(GS), FCPS(CS)\n2.	Dr. Sher-e-Murtaza                            FCPS(GS), FCPS(CS)\n3.	Dr. Allah Bakhsh Khakhi                    FCPS(GS), FCPS(CS)\n4.	Dr. Muhammad Moeen                      FCPS(GS)\n5.	Dr. Muhammad Yasir Khan                MCPS,FCPS(GS),FCPS(CS),MRCS(UK)', 'is (7).jpg', 'No Comments', '2015-12-22 08:23:46'),
(4, 'Anesthesia and critical care Department', 'Anesthesia and critical care Department in CPEIC Multan is working since 2007, under supervision of Professor Dr Rana Altaf Ahmad, Founder Cardiac Anesthetist of the department in South Punjab.\r\nThe Anesthesia and critical care department is working hard day and night under supervision of Professor Dr Rana Altaf Ahmed , Head of Anesthesia and ICU. Anesthesia team consists of qualified and experienced persons, including Consultants (anesthetists and pulmonologist), Medical officers and staff nurses, providing two ICU units , unit-I contain 8 beds with well equipped ventilators and monitoring, Unit-II having 16 beds services round the clock, in operation theaters and ICU. The department is also providing 24 hours emergency services to all other departments.\r\nThere are five operation theaters and two ICU, equipped with latest anesthesia machines, ventilators, monitors and other equipment .Both invasive and noninvasive monitoring is applied to patients. Intra-operative TEE and Bronchoscopy facilities are also available. in case of malfunctioning, backup anesthesia machines, ventilators and oxygen supply system are also available. Another 24 bedded ICU block, including a separate bay for pediatric patients, has been added to improve patient care.\r\nAnesthesia and critical care Department in CPEIC is a recognized department for post-graduation in field of Anesthesiology (MCPS , FCPS ), and also for Cardio-thorasic Anesthesia (FCPS). Anesthesia and critical care Department of CPEIC is the only recognized institution for Cardio-thorasic Anesthesia fellowship by College Of Physicians And SurgeonsPakistan in Punjab.', 'is (8).jpg', '', '2015-10-09 07:31:59'),
(5, 'Radiology', 'The Department of Radiology provides comprehensive state-of-the-art diagnostic imaging facilities. The radiologists, radiographers, and support staff all team up to provide effective and efficient services round-the-clock.\r\nThe services offered are: CT Scanning, Ultrasound/Colour Doppler, General Radiography, Special Radiography, Interventional Radiology, Vascular, Hepatobiliary, Urologic, . All general X-rays are digital using Computed Radiography. All IV Iodinated contrast injections are by Osmolar Contrast Agents, in line with international recommendations for higher patient safety.\r\n Digital Radiography (X-Ray) \r\nThe Department of Radiology at Ch. Pervaiz Elahi Institute of Cardiology Multan (CPEIC, Multan) has two general radiography rooms with floating tabletops that enable high output and features like high KV, which facilitates visualising the contents of the mediastinum, lungs and heart in chest radiography. Our long cassettes for single films enable us to view the whole spine or the whole lower extremity. Digital radiography (X-ray) is a simple and non-invasive examination which also minimises chance of repeated exposure, thus decreasing the radiation dose.\r\nUltrasound \r\nradiology section provides routine procedures of adult and paediatrics whole body colour Doppler, obstetrics and 4D foetal imaging, musculoskeltal imaging, and transvaginal and transrectal prostate ultrasound. The service also facilitates intervention procedure like FNAs, diagnostic and therapeutic aspiration, and taps and core biopsies. We also provide portable ultrasound services within hospital premises.\r\nComputerised Tomography (CT Scan)\r\nWe will provide high quality images by using a 128-slice CT system, which makes exam time shorter and accurate. The CT scanner, also called a CAT scanner, has become one of the most important tools to diagnose head and spine injuries, lung and liver disease, cancer, tumours, blood clots, internal bleeding and other diseases and illnesses. Under the guidance of qualified staff, radiologists and cardiologists, the 64-slice CT scan allows physicians to easily capture precise, motion-free images of the heart and coronary arteries to identify soft plaque or measure coronary blockage and detect signs of disease at its earliest stages, reducing the need for high-risk interventional procedures. Computed Tomography\r\nComputed Tomography (CT) sees inside your body into areas that cannot be visualised by standard X-ray examinations. The results of CT allow your physician to diagnose certain diseases earlier and more precisely. And since diseases are treated more successfully when diagnosed early, CT scans can help to save lives.\r\nCT is a radiological method which has been used since 1974 to visualise certain regions of your body slice by slice.\r\nToday, CT technology is an indispensable tool in medicine. It is used for routine examinations of the entire body. For example, CT can assist your physician in:\r\nâ€¢	Detecting strokes, head injuries and abscesses;\r\nâ€¢	Locating fractures;\r\nâ€¢	Determining the extent of bone and soft tissue damage in trauma patients (in such cases it is especially helpful to have an imaging procedure which allows a fast first diagnosis);\r\nâ€¢	Diagnosing changes in various pathological processes.\r\nCT scan allows true-to-detail three dimensional images of the inside of the heart and other parts of the body:\r\nâ€¢	CT Angiography (CTA): With the aid of computed tomography, physicians are now able to look into the coronary arteries without having to introduce a catheter.CTA is a much less invasive and more patient-      friendly procedure â€“ contrast material is injected into a small peripheral vein by using a small needle or catheter. This type of exam has been used to screen large numbers of individuals for arterial disease.\r\nâ€¢	Coronary Calcium Scoring: Coronary Calcium Scoring scan is a non-invasive way of obtaining information about the location and extent of calcified plaque in the coronary arteries â€“ the vessels that supply oxygen-containing blood to the heart wall. Plaque is a build-up of fat and other substances, including calcium, which can, over time, narrow the arteries or even close off blood flow to the heart.Because calcium is a marker of coronary artery disease, the amount of calcium detected on a cardiac CT scan is a helpful diagnostic tool.\r\nVirtual Colonoscopy: CT colonography uses CT scanning to obtain an interior view of the colon (the large intestine) that is ordinarily only seen with an endoscope inserted into the rectum.\r\nThe major reason for performing CT colonography is to screen for polyps and other lesions in the large intestine. Polyps are benign growths that arise from the inner lining of the intestine. Some polyps may grow and turn into cancers.', 'is (10).jpg', '', '2015-10-09 07:36:28'),
(6, 'Cardiac Emergency', 'Well trained doctors and nursing staff take care of every individual patient round the clock where services are provided to every patient free of cost. In setting of emergency services â€“ acute medical care, ambulance services and other emergency medical services are provided to assess the patientâ€™s cardiac rhythm.\r\nQuality medicines and disposables are procured and dispensed to all patients with out any discrimination. Qualified personnel are available for patient counseling.\r\n21 bedded emergency ward is equipped with cardiac monitors, central oxygen supply, ventilators facility, pulse oximetery, infusion pumps and cardiac defibrillators. Well trained doctors and nursing staff take care of every individual patient round the clock. Thrombolysis, Defibrillation, Ventilatory support and even temporary pacemaker is inserted on bedside in the emergency ward. More than 70000 (seventy thousand) patients are being benefited through emergency services annually', '0_is (2).jpg', '', '2015-10-09 07:37:48'),
(7, 'Pathology', 'The Department of Pathology is serving the patients at CPEIC since August 2005. This department consist of Chemistry Section, Hematology Section and Microbiology Section. Pathology Department is headed by Dr. Javed Masood (M.Phil Chemical Pathology) Assistant Professor of Pathology. Other staff includes one Pathologist, two Hematologist, one Bio Chemist and one Microbiologist.\r\nSERVICES\r\nThe Department of Pathology provides a complete array of routine and specialized services. The services are related to all branches of pathology including Haematology, blood bank, clinical chemistry, clinical microbiology. Many routine and specialized tests such as general biochemical profiles, enzyme profiles, endocrine assays, , are available along with several other special tests which are not available elsewhere in Pakistan. Laboratory testing is also provided for the diagnosis and management of Haematological disorders such as anaemias and thrombocytic disorders. Diagnostic microbiological services include the determination and identification of bacteria, fungi, viruses and parasites.\r\nThe Department of Pathology is well equipped with the following instruments.\r\nCHEMISTRY\r\nâ€¢	Modular P-800 Chemistry Analyzer integrated with Immuno-assay\r\nâ€¢	Olympus AU-400 Chemistry Analyzer\r\nâ€¢	Easylite Electrolyte Analyzer\r\nâ€¢	Horron Electrolyte Analyzer\r\nâ€¢	Vitros Immunoassay â€” Seico\r\nâ€¢	Elecsys Immunoassay â€” Roche\r\nHEMATOLOGY\r\nâ€¢	Sysmex XS-1000i, 05 Part Differentials CBC Analyzer\r\nâ€¢	Sysmex KX-21, 03 Part Differentials CBC Analyzer\r\nâ€¢	KC-4 âˆ† Coagulation Analyzers\r\nMICROBIOLOGY\r\nâ€¢	Autoclave\r\nâ€¢	Incubator\r\nFACILITIES AND SERVICES AVAILABLE\r\nThe department of Pathology CPEIC Multan is equipped with a capacity of serving about 500 patients/ day. The following services are currently available in the department.\r\nCHEMISTRY:\r\n Cardiac Enzymes                      (CK, CK-MB, LDH)\r\nLipid Profile                              (T.Cholesterol, S.Triglycerides. HDL, LDL, VLDL)\r\nLiver Function Tests                 (Total Bilirubin. ALT, AST, ALP, Serum Albumin. Total Protein.)\r\nRenal Parameters                      (Urea, Creatinine, Uric Acid)\r\nDiabetic Profile             FBS , RBS, HbA1C)\r\n SPECIAL CHEMISTRY:\r\n Trop-T.\r\nThyroid Profile.\r\nABGs (Arterial Blood Gases).\r\nHEMATOLOGY:\r\nCBC (Complete Blood Counts).\r\nPT/INR, APTT.\r\nMalarial Parasite.\r\nPeripheral Blood Film.\r\nMICROBIOLOGY:\r\n Urine R/E.\r\nCulture & Sensitivity.\r\nFUTURE PLANS TO ACHIEVE\r\n1.	Automation in Coagulation.\r\n2.	Automation in Blood Culture System.\r\n3.	Development of Online Reporting System.', 'is (11).jpg', '', '2015-10-09 07:39:57'),
(8, 'Dental Section', 'This department established & started its function along with CPEIC  in August 2005.  It is the first associated dental department with Cardiac Institute in Pakistan.\r\nDental Section of this hospital is modern and well equipped, located on the first floor, providing excellent dental facilities. It has contributed significantly to the field of cardiac surgery in very short period of time regarding dental clearance of the patient having rheumatic heart disease leading to Sub acute bacterial Endocarditis.\r\nThe Primary aim of this department is to provide Pre-operative dental clearance of the patient undergoing valvular heart surgery. However any patient requiring dental treatment is provided this facility within the institute saving them hassle and the cost of visiting to other dental Hospitals.\r\nThis department is working under two consultant Dental Surgeons, one Dental Technician and two Dental Assistants and following procedures being performed routinely in this department.\r\nâ€¢	Dental X-Rays\r\nâ€¢	Composite/Aesthetic Filling\r\nâ€¢	Glass Ionomer Filling\r\nâ€¢	Silver Amalgum Filling\r\nâ€¢	Scaling & Polishing of full teeth\r\nâ€¢	Dental Abscess Treatment\r\nâ€¢	Treatment of Pyorrhea/Gingivitis\r\nâ€¢	Apicoectomy\r\nâ€¢	Gingivactomy\r\nâ€¢	Operculectomy\r\nâ€¢	Root Canal Treatment\r\nâ€¢	Treatment of Cyst\r\nâ€¢	Pulpectomy\r\nâ€¢	Surgical Excision of Impacted Tooth', 'is (12).jpg', '', '2015-10-09 07:41:52'),
(9, 'Pharmacy', 'Pharmacy Department of CPEIC, Multan is functioning since August, 2005, i.e., from the start of the institute. Department is comprising of its OPD dispensing and central supply of medicaments (medicines and disposables) to indoor sections like emergency, C.C.Us, ICUs and O.Ts etc.\r\nQuality of Medicines\r\nQuality medicines and disposables are being procured and dispensed to all poor and entitled patients. OPD pharmacy is catering almost five to six hundred (500-600) patients per day and one month medicine is being given. Qualified personals are available for patient counseling and ensuring that patients are taking medicines in proper dosage regimen and time. In one calendar year OPD pharmacy issue medicines to more than one hundred and fifty thousand patients approximately. Beside this, storage conditions of medicaments are also in accordance with the set protocols / standards and various segments of the store are under the supervision of qualified pharmacists. Quality of medicines not only assured at the time of purchase but medicines from the store is dispensed after getting satisfactory report from Drug Testing Laboratory (DTL). Judicial dispensing is also being ensured at wards level as one of the professional pharmacist is deputed for execution of the same.\r\nInternship Programme\r\nInternship Programme for the professional development of fresh graduates is also being carried out at Pharmacy department. Under government direction vide to notification no. SO (DC) 814/92 (69) dated October 10th 2009, here all pharmacists are authorized to register from Assistant PharmacistÂ for it.\r\nRetail\r\nIn hospital premises, for general user and paying category patients Retail Pharmacy is also functioning on no profit no loss basis and medicines and disposables (interventional and surgical) are available at subsidized rates. Pharmacy department is playing vital role in order to provide health care facilities to cardiac patients and in the development of this newly established institute too.\r\n', 'is (13).jpg', '                                                    ', '2015-10-09 07:43:05'),
(10, 'Blood Bank', '                                   Department of Blood Bank is Headed by Assistant Professor of Pathology & Blood Bank Dr. Javed Masood. Other Staff members include Dr. Manzoor Hussain (FCPS Hematologist) and Dr. Bushra Khan (Blood Bank Officer).\r\nBlood Bank and Blood Transfusion Lab. of the institution serving the patients since August 2007 and provides the following services to the cardiac patients.\r\n1.	Blood Grouping & Cross Matching\r\n2.	Screening by ELISA for HbsAg, Anti. HCV & HIV\r\n3.	Preparation of Whole Blood for Transfusion\r\n4.	Preparation of RBC Concentrates for Transfusion\r\n5.	Preparation of FFP Concentrates for Transfusion\r\n6.	Preparation of Random Donor Platelets for Transfusion\r\nBlood Bank is well equipped with the following:-\r\nâ€¢	Blood Bank Refrigerators\r\nâ€¢	Plasma Freezers\r\nâ€¢	Platelet Incubater\r\nâ€¢	Cryofuge Machine\r\nâ€¢	Elisa Plate Reader\r\nâ€¢	Centrifug Machine\r\nFuture Plans\r\nâ€¢	To achieve Gel Technology for Blood Grouping & Cross Matching\r\nâ€¢	To achieve Automation in Blood Grouping & Cross Matching\r\nâ€¢	To achieve Software System\r\n', 'is (14).jpg', '                                                    ', '2015-10-09 07:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE IF NOT EXISTS `diseases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `description`, `image`, `category`, `comments`, `created_at`) VALUES
(1, 'Rheumatic heart disease', 'Rheumatic heart disease is caused by one or more attacks of rheumatic fever, which then do damage to the heart, particularly the heart valves. Rheumatic fever usually occurs in childhood, and may follow a streptococcal infection. In some cases, the infection affects the heart and may result in scarring the valves, weakening the heart muscle, or damaging the sac enclosing the heart. The valves are sometimes scarred so theydo not open and close normally.', 'download.jpg', '', '', '2015-10-09 13:10:43'),
(2, 'Hypertensive heart disease', 'High blood pressure of unknown origin (primary hypertension) or caused by (secondary hypertension) certain specific diseases or infections, such as tumor in the adrenal glands, damage to or disease of the kidneys or their blood vessels. High blood pressure may overburden the heart and blood vessels and cause disease.', 'download (1).jpg', '', '', '2015-10-09 13:12:14'),
(3, 'Ischemic heart disease', 'Heart ailments caused by narrowing of the coronary arteries and therefore a decreased blood supply to the heart.', 'download (2).jpg', '', '', '2015-10-09 13:13:47'),
(4, 'Cerebrovascular disease', 'Disease pertaining to the blood vessels in the brain. A cerebrovascular accident or stroke is the result of an impeded blood supply to some part of the brain.', 'download (3).jpg', '', '', '2015-10-09 13:15:07'),
(5, 'Inflammatory heart disease', 'Inflammation of the heart muscle (myocarditis), the membrane sac (pericarditis) which surround the heart, the inner lining of the heart (endocarditis) or the myocardium (heart muscle). Inflammation may be caused by known toxic or infectious agents or by an unknown origin.', 'download (4).jpg', '', '', '2015-10-09 13:16:40'),
(7, 'Valvular heart disease', 'The heartâ€™s valves keep blood flowing through the heart in the right direction.  But a variety of conditions can lead to valvular damage.  Valves may narrow (stenosis), leak (regurgitation or insufficiency) or not close properly (prolapse). You may be born with valvular disease, or the valves may be damaged by such conditions as rheumatic fever, infections connective tissue disorders, and certain medications or radiation treatments for cancer.\r\nHypertensive heart disease', '0_download (6).jpg', '', '', '2015-10-09 13:22:07'),
(8, 'Aneurysm', 'An aneurysm is a bulge or weakness in the wall of a blood vessel.  Aneurysms can enlarge over time and may be life threatening if they rupture. They can occur because of high blood pressure or a weak spot in a blood vessel wall. Aneurysms can occur in arteries in any location in your body. The most common sites include the abdominal aorta and the arteries at the base of the brain.', 'download (7).jpg', '', '', '2015-10-09 13:23:58'),
(9, 'Atherosclerosis', 'In atherosclerosis the walls of your arteries become thick and stiff because of the build up fatty deposits. The fatty deposits are called plaques.  When this happens, the flow of blood is restricted. Atherosclerosis can happen throughout the body.  In the arteries of the heart it is known as coronary artery disease, in the legs, peripheral arterial disease. Atherosclerosis happens over a period of time and its consequences can be grave and include heart attack and stroke', 'download (8).jpg', '', '', '2015-10-09 13:26:29'),
(11, 'Peripheral arterial disease', 'Peripheral arterial disease (PAD) is caused by atherosclerosis, which is the narrowing and / or blockage of the blood vessels in the legs.  PAD manifests as pain in the legs when walking, which is relieved by rest. If you have PAD you are at greater risk of developing gangrene in your legs.', 'download (9).jpg', '', '', '2015-10-09 13:28:17'),
(12, 'Angina', 'Angina manifests as pain in the chest that results from reduced blood supply to the heart (ischemia). Blood carries oxygen around your body and depriving the heart of oxygen has serious consequences.\r\n\r\nAngina is caused by atherosclerosis, that is the narrowing and / or blockage of the blood vessels that supply the heart.\r\n\r\nThe typical pain of angina is in the chest but it can often radiate to the left arm, shoulder or jaw. If you have angina you will have noticed that the pain is related to exertion and is relieved by rest.\r\n\r\nAn angina attack is also associated with shortness of breath and sweating. If you are a woman you may experience angina slightly differently. Women appear to have more pain in their shoulder and middle back area, and more throat, neck, and jaw pain than men.\r\nIf your angina symptoms rapidly worsen and occur at rest this may presage an impending heart attack (myocardial infarction) and you should seek medical help immediately.', 'download (10).jpg', '', '', '2015-10-09 13:30:04'),
(13, 'Peripheral arterial disease', '        Peripheral arterial disease (PAD) is caused by atherosclerosis, which is the narrowing and / or blockage of the blood vessels in the legs.  PAD manifests as pain in the legs when walking, which is relieved by rest. If you have PAD you are at greater risk of developing gangrene in your legs.                                            ', 'download (11).jpg', '', '                                                    ', '2015-10-09 13:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL DEFAULT '202cb962ac59075b964b07152d234b70',
  `recovery_token` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `post` varchar(20) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `name`, `fname`, `email`, `password`, `recovery_token`, `phone`, `mobile`, `cnic`, `city`, `address`, `image`, `qualification`, `institute`, `speciality`, `gender`, `facebook`, `twitter`, `linkedin`, `post`, `designation`, `comments`, `created_at`) VALUES
(1, 0, 'Rana Altaf Ahmad', 'Ahmad Hussain', 'altaf@gmail.com', '202cb962ac59075b964b07152d234b70', '', '06123456', '03000123456', '3302-74867683-8', 'Multan', 'Gulgusht Multan', 'BRIG ZAMEER.jpg', 'FCPS', 'IMC', 'Professor of Anaesthesia , Peripheral arterial disease', 'Male', 'https://www.facebook.com/ali', '', '', '', 'Senior Doctor', '', '2015-10-12 08:08:49'),
(2, 0, 'Haider Zaman', 'Zaman Saeed', 'ahmad@gmail.com', '202cb962ac59075b964b07152d234b70', '', '06123487', '03000123456', '36104_65429866_2', 'Multan', 'Gulgusht Multan', 'dr._shahid_javaid.jpg', 'FCPS', 'IMC', 'Professor of Cardiac Surgery , Angina', 'Male', 'https://www.facebook.com/ahmad', '', '', '', 'Senior Doctor', '', '2015-10-12 08:20:25'),
(3, 0, 'Ijaz Ahmad', 'Muhammad Sharif', 'maijazt@gmail.com', '202cb962ac59075b964b07152d234b70', '', '061657456', '03462121821', '38102_65429866_5', 'Lahore', 'Shah Rukne Alam', 'salaman.jpg', 'FCPA', 'Cardiology Hospital', 'Rheumatic heart disease', 'Male', 'https://www.facebook.com/ijaz', '', '', '', 'Senior Doctor', 'He is a very good person', '2015-10-12 08:17:19'),
(4, 0, 'Muhammad Younas', 'Muhammad Younas', 'myounas@gmail.com', '202cb962ac59075b964b07152d234b70', '', '040678655', '0300987654', '38102_65429866_9', 'Multan', 'Nishtar Road', 'scan0003_1.jpg', 'FCPS', 'Cardiology Hospital', 'Cerebrovascular disease', 'Male', 'https://www.facebook.com/younas', '', '', '', 'Senior Prof.', 'He is a very good person', '2015-10-12 08:17:31'),
(5, 0, 'Rana akram ', 'Ahmad Nawaz', 'rana@gmail.com', '202cb962ac59075b964b07152d234b70', '', '061234567', '03465699866', '38102_65879866_2', 'Lahore', 'Bosan Road', 'scan0007-20140405-152110.jpg', 'MBBS, DA,FCPS Ans, Msc Pain Medicine', 'Cardiology Hospital', 'Inflammatory heart disease', 'Male', 'https://www.facebook.com/rana', '', '', '', 'professor', 'He is a very good person', '2015-10-12 08:17:52'),
(6, 0, 'Ahmad khan', 'Mustafa Khan', 'ahmadkhan@yahoo.com', '202cb962ac59075b964b07152d234b70', '', '06123409', '0300534231', '38102_65429866_2', 'Multan', '      Shah Rukne Alam                                              ', '0_is (1).jpg', 'FCPS', 'Cardiology Hospital', 'Hypertensive heart disease', 'Male', 'https://www.facebook.com/ahmad', '', '', '', 'doctor', '                                                    ', '2015-10-12 08:18:11'),
(7, 0, 'Shah Nawaz Malik', 'Rab Nawaz Malik', 'shahnawaz77@yahoo.com', '202cb962ac59075b964b07152d234b70', '', '061234943', '03337865234', '34182_65246789_7', 'Multan', 'Bosan Road', '0_is.jpg', 'FCPS', 'Cardiology Hospital', 'Rheumatic heart disease', 'Male', 'https://www.facebook.com/nawaz', '', '', '', 'doctor', '', '2015-10-12 08:18:33'),
(8, 0, 'Zain Haris', 'Muhammad Younas', 'drzain@yahoo.com', '202cb962ac59075b964b07152d234b70', '', '061287650', '03457676789', '38102_1234567_9', 'Multan', 'Nishtar Road', 'suresh-20150902-114538.jpg', 'FCPS', 'Cardiology Hospital', 'Valvular heart disease', 'Male', 'https://www.facebook.com/zain', '', '', '', 'doctor', '', '2015-10-12 08:18:45'),
(9, 0, 'Nayyab Hameed', 'Abdul  Hameed', 'nayab@yahoo.com', '202cb962ac59075b964b07152d234b70', '', '06123450', '03017754299', '34182_65246789_4', 'Multan', 'Shah Rukne Alam', '0_is (5).jpg', 'FCPS', 'Cardiology Hospital', 'Ischemic heart disease , High blood pressure (hypertension)', 'Female', 'https://www.facebook.com/nayyab', '', '', '', 'doctor', '', '2015-10-12 08:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_disease`
--

CREATE TABLE IF NOT EXISTS `doctor_disease` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_disease`
--

INSERT INTO `doctor_disease` (`id`, `doctor_id`, `disease_id`, `comments`) VALUES
(1, 1, 1, ''),
(2, 1, 3, ''),
(3, 2, 2, ''),
(4, 2, 4, ''),
(5, 3, 12, ''),
(6, 3, 5, ''),
(7, 4, 1, ''),
(8, 4, 2, ''),
(9, 5, 3, ''),
(10, 5, 4, ''),
(11, 6, 4, ''),
(12, 7, 5, ''),
(13, 7, 6, ''),
(14, 8, 7, ''),
(15, 9, 8, ''),
(16, 10, 9, ''),
(17, 10, 10, ''),
(18, 9, 12, ''),
(19, 8, 11, ''),
(20, 11, 13, ''),
(21, 11, 1, ''),
(22, 11, 4, ''),
(26, 11, 2, ''),
(27, 11, 3, ''),
(28, 1, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `x_by_user` int(11) NOT NULL,
  `x_by_staff` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE IF NOT EXISTS `nurses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `post` varchar(20) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `user_id`, `name`, `fname`, `email`, `phone`, `mobile`, `cnic`, `city`, `address`, `image`, `qualification`, `institute`, `speciality`, `gender`, `facebook`, `twitter`, `linkedin`, `post`, `designation`, `comments`, `created_at`) VALUES
(1, 0, 'Nusrat', 'Ahmad Ali', 'n1@gmail.com', '03001234567', '03112345678', '30145-4542484-1', 'Multan', 'Gulgusht multan', '9.jpg', 'abc deds', 'Cardiology Hospital', 'Nurse', 'Female', '', '', '', '', '', '', '2015-10-26 20:29:41'),
(2, 0, 'sana', 'Hasham', 'nurse2@gmail.com', '03001234567', '03112345678', '30145-4542484-1', 'Multan', 'Gulgusht multan', 'images (6).jpg', 'abc deds', 'Cardiology Hospital', 'Nurse', 'Female', '', '', '', '', '', '', '2015-12-22 08:22:53'),
(3, 0, 'saba', 'Haziq', 'nurse3@gmail.com', '03001234567', '03112345678', '30145-4542484-1', 'Multan', 'Gulgusht multan', 'jack.jpg', 'abc deds', 'Cardiology Hospital', 'Nurse', 'Female', '', '', '', '', '', '', '2015-12-22 08:23:03'),
(4, 0, 'Ahmad', 'Faraz', 'nurse4@gmail.com', '03001234567', '03112345678', '30145-4542484-1', 'Multan', 'Gulgusht multan', 'orlando.jpg', 'abc deds', 'Cardiology Hospital', 'Nurse', 'Male', '', '', '', '', '', '', '2015-10-26 20:29:52'),
(5, 0, 'Rabia', 'Yaqoob', 'nurse5@gmail.com', '03001234567', '03112345678', '30145-4542484-1', 'Multan', 'Gulgusht multan', 'ginna.jpg', 'abc deds', 'Cardiology Hospital', 'Nurse', 'Female', '', '', '', '', '', '', '2015-10-27 19:34:18'),
(6, 0, 'samina', 'Ahmad Habib', 'h@gmail.com', '03001234567', '03112345678', '30145-4542484-1', 'Multan', '                                                    ', 'images (7).jpg', '', 'Cardiology Hospital', '', '', '', '', '', '', 'Nurse', '                                                    ', '2015-12-22 08:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` bigint(11) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `value` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `ref`, `name`, `value`, `image`, `comments`, `created_at`) VALUES
(1, 'mission', 'Mission Statement', 'Our Mission\r\nHealth Care with Compassion for all\r\nOur Vision\r\nTo be the regionâ€™s leader by providing quality healthcare services\r\nOur Values\r\nCompassion, Commitment, Teamwork, Quality, Respect and Accountability\r\nOur Strategic Priorities\r\nâ€¢	Physician Partnership and Enhanced Clinical Quality\r\nâ€¢	Provide Seamless/Easy Access Care Delivery\r\nâ€¢	Financial Strength/Viability\r\nâ€¢	Strategic Growth\r\nAbout us:\r\nWe provide general medical and emergency services to the local population of Central and South Bristol, and a broad range of specialist services across Pakistan\r\nThe Trust''s performance is measured in a number of ways:\r\nâ€¢	Workforce\r\nâ€¢	Clinical quality and effectiveness\r\nâ€¢	Patient experience\r\nâ€¢	Public health\r\nâ€¢	Patient access and targets\r\nA performance report is delivered to the Trust''s Board meetings.', '', 'Dr. Haider Zaman', '2015-10-09 06:29:45'),
(2, 'about_up', 'About Us', 'With the most advanced technology, the backing of the Intermountain Healthcare system, and a visually stunning facility that provides a spectacular mountain backdrop, Multan Institute Of Cardiology truly offers the best.', 'banner2.jpg', '', '2015-10-10 11:05:52'),
(3, 'phone', 'Phone', '561-574-0801', '', '', '2015-09-05 14:48:26'),
(4, 'mobile', 'Mobile', '561-574-0811', '', '', '2015-09-05 12:49:11'),
(5, 'home', 'Welcome to Multan Institute of Cardiology', 'The Multan Institute of Cardiology (MIC) was opened in 2006, designed in partnership with patients, staff and the public and provides a dedicated service for people with heart conditions across Punjab.\r\nHealth in Pakistan, like everywhere else in the world, has become a complex issue. We are working in an environment where a majority is deprived of basic human necessities, let alone healthcare. Complexity of the healthcare provision has multiplied since healthcare has merged with many areas of civilized living like awareness, education, environment and microeconomics etc. No one can think of providing healthcare without addressing the aforesaid aspects of social life.\r\nI am profoundly thankful to Almighty for blessing us with vision and courage to understand and take up the demands of changing scenario in Pakistanâ€™s health sector.\r\nQuality is the value that founders of Cardiology set as a policy principle, one and a half decade ago, when idea of a quality healthcare center like Cardiology was conceived. With this very concept in mind we started our journey. It took us extensive brainstorming, consistent implementation and swift execution. It kept us alert and awake. But itâ€™s what we take pride in. Cardiology International is one and only hospital in northern part of the country where quality medical care and patient satisfaction is our top priority.\r\nAs a responsible corporate body we have a three fold objective. We have set for ourselves a goal to excel in healthcare economics, social and environmental performance. We have brought possible best in healthcare to the country and will continuously be on our toes to improve it. Our patients enjoy the world class healthcare and need not fly abroad for quality anymore. We have the biggest number of US qualified and highly experienced consultants in different specialties.', 'a.jpg', '', '2015-11-01 11:54:47'),
(6, 'about_down', '', 'As residents of this community and planet, we feel a strong obligation to design, build, and operate the hospital in a way that minimizes its impact on the natural environment. We call these our green initiatives:\r\n\r\nBicycle racks, showers, and changing facilities are provided for employees who ride their bikes to work\r\n80% of the hospitalâ€™s 156 acres is dedicated open space for the community to enjoy\r\nTo reduce ozone depletion, our systems and equipment donâ€™t use CFC-based refrigerants\r\nWe built the hospital using local stone to reduce the environmental impact of unnecessary transportation, avoid unnecessary mining, and support the local economy by purchasing stone from a nearby quarry\r\nRecycling bins located throughout the hospital\r\nLaundry is taken to a facility that uses state-of-the-art cleaning technology, limiting the amount of water and energy used\r\nNative, low-water use plants were used in the landscaping to reduce the hospitalâ€™s water use\r\nWe use rapidly renewable commercial linoleum, which is a natural resin-based product, for the hospitalâ€™s flooring\r\nOther recycled products include carpet, ceiling tile, and steel\r\nWe used environmentally friendly adhesives, sealants, paints, and coatings during construction', '', '', '2015-10-09 13:49:55'),
(7, 'testominal', 'Shah Nawaz', 'My stay in Cardiology Hospital was indeed a wonderful experience. The attention we got, especially from the nurses, was quite tender. They are always there for you with love, care and their free of charge smiles. I really appreciate everyone who has made my stay enjoyable.', '', '', '2015-10-09 13:49:57'),
(8, 'doctors', 'Our Doctors', '"People of all different backgrounds join for different reasons, but what we have in common is our commitment to the system and helping others"  .                                                                        \r\n\r\n\r\n\r\n\r\nThe purpose of a doctor or any human in general should not be to simply delay the death of the patient, but to increase the   person''s quality of life', '', '', '2015-10-12 08:55:29'),
(9, 'nurses', 'Our Nerses', 'The world will be a better place when nurses get paid more than pro athletes. We save lives, they throw balls.', '', '', '2015-10-12 08:50:52'),
(10, 'address', 'Address', '2955 Powder House Road Boynton Beach, FL 33436 M', '', 'Cardiology Center Multan', '2015-10-12 10:59:32'),
(11, 'email', 'Email', 'info@cardialogy.com.pk', '', '', '2015-09-05 14:48:26'),
(12, 'contact', '', '', 'vancouver.jpg', '', '2015-09-05 13:02:54'),
(13, 'services', 'Patient Services', 'Hospital services make up the core of a hospital''s offerings. They are often shaped by the needs or wishes of its major users to make the hospital a one-stop or core institution of its local commun ity or medical network. Hospitals are institutions comprising basic services and personnelâ€”usually departments of medicine and surgeryâ€”that administer clinical and other services for specific diseases and conditions, as well as emergency services. Hospital services cover a range of medical offerings from basic health care necessities or training and research for major medical school centers to services designed by an industry-owned network of such institutions as health maintenance organizations (HMOs). The mix of services that a hospital may offer depends almost entirely upon its basic mission(s) or objective(s).', '', '', '2015-10-12 10:54:53'),
(14, 'departments', 'Departments', 'Max Department of Cardiology Hospital strives to provide patients with expert treatment and care. We believe in offering the patients with an ethical and open environment to recover. Our team of expert Cardiologists, Cardiac Surgeons and Vascular Surgeons believe in carrying out an in-depth investigation of patient condition taking into account patientâ€™s complete medical history, therefore strategizing a tailored treatment and top recovery plan for each.\r\n\r\nOur expertise in cardiac care helps us in caring for patients with heart disease by providing complete all-round cardiology care. From diagnosis, prevention, treatment, surgical care to cardiac rehabilitation and wellness services, we look after your heart A to Z.', '', '', '2015-10-12 10:51:53'),
(15, 'diseases', 'Diseases', 'Its our mission to try and give people fighting the disease the same gift of laughter and a positive atitude i had. As Benjamin Franklin said "The best doctor gives the least medicine."', '', '', '2015-10-12 11:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '202cb962ac59075b964b07152d234b70',
  `recovery_token` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `gardian` varchar(255) NOT NULL,
  `refferal` varchar(255) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `name`, `fname`, `cnic`, `email`, `password`, `recovery_token`, `phone`, `mobile`, `city`, `address`, `gender`, `gardian`, `refferal`, `comments`, `created_at`) VALUES
(1, 2, 'Muhammad', 'Ashraf', '236139876136', 'ma@gmail.com', '202cb962ac59075b964b07152d234b70', '', '782478732', '13456789', '', 'address', 'Male', '', '', '', '2015-12-22 08:22:20'),
(2, 1, 'rashid', 'Anwar', '1234566', 'ra@gmail.com', '202cb962ac59075b964b07152d234b70', '', '32465435', '5643225364', 'kljalksjfdlk', 'BZU', 'Female', '', 'kljlkajslkfjl', 'kljlkajfdlk', '2015-12-22 08:22:10'),
(4, 1, 'akram', 'ali', '5425454', 'akram@gmail.com', '202cb962ac59075b964b07152d234b70', '', '123455', '45421', 'Multan', '                                                    ', 'Male', '', '', '                                                    ', '2015-10-20 13:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `category` varchar(20) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `description`, `image`, `category`, `comments`, `created_at`) VALUES
(1, 0, '128-slice CT Scan', 'The institution provides high Computerised Tomography (CT Scan)\r\nquality images by using a 128-slice CT system, which makes exam time shorter and accurate. The CT scanner, also called a CAT scanner, has become one of the most important tools to diagnose head and spine injuries, lung and liver disease, cancer, tumours, blood clots, internal bleeding and other diseases and illnesses. Under the guidance of qualified staff, radiologists and cardiologists, the 64-slice CT scan allows physicians to easily capture precise, motion-free images of the heart and coronary arteries to identify soft plaque or measure coronary blockage and detect signs of disease at its earliest stages, reducing the need for high-risk interventional procedures. Computed Tomography\r\nComputed Tomography (CT) sees inside your body into areas that cannot be visualised by standard X-ray examinations. The results of CT allow your physician to diagnose certain diseases earlier and more precisely. And since diseases are treated more successfully when diagnosed early, CT scans can help to save lives.\r\nCT is a radiological method which has been used since 1974 to visualise certain regions of your body slice by slice.\r\nToday, CT technology is an indispensable tool in medicine. It is used for routine examinations of the entire body. For example, CT can assist the physician in:\r\nâ€¢	Detecting strokes, head injuries and abscesses;\r\nâ€¢	Locating fractures;\r\nâ€¢	Determining the extent of bone and soft tissue damage in trauma patients (in such cases it is especially helpful to have an imaging procedure which allows a fast first diagnosis);\r\nâ€¢	Diagnosing changes in various pathological processes.\r\nCT scan allows true-to-detail three dimensional images of the inside of the heart and other parts of the body:\r\nâ€¢	CT Angiography (CTA): With the aid of computed tomography, physicians are now able to look into the coronary arteries without having to introduce a catheter.CTA is a much less invasive and more patient-friendly procedure â€“ contrast material is injected into a small peripheral vein by using a small needle or catheter. This type of exam has been used to screen large numbers of individuals for arterial disease.\r\nâ€¢	Coronary Calcium Scoring: Coronary Calcium Scoring scan is a non-invasive way of obtaining information about the location and extent of calcified plaque in the coronary arteries â€“ the vessels that supply oxygen-containing blood to the heart wall. Plaque is a build-up of fat and other substances, including calcium, which can, over time, narrow the arteries or even close off blood flow to the heart.Because calcium is a marker of coronary artery disease, the amount of calcium detected on a cardiac CT scan is a helpful diagnostic tool.\r\nâ€¢	Virtual Colonoscopy: CT colonography uses CT scanning to obtain an interior view of the colon (the large intestine) that is ordinarily only seen with an endoscope inserted into the rectum.The major reason for performing CT colonography is to screen for polyps and other lesions in the large intestine. Polyps are benign growths that arise from the inner lining of the intestine. Some polyps may grow and turn into cancers.', 'is.jpg', '', '', '2015-10-09 07:15:17'),
(2, 0, 'Laboratory Analysis', 'The Department has five major sections: Histopathology, Haematology, Blood Banking, Microbiology, Chemical Pathology\nâ€¢	Services\nâ€¢	The Department of Pathology provides a complete array of routine and specialized services. The services are related to all branches of pathology including Haematology, blood bank, clinical chemistry, clinical microbiology. Many routine and specialized tests such as general biochemical profiles, enzyme profiles, endocrine assays, , are available along with several other special tests which are not available elsewhere in Pakistan. Laboratory testing is also provided for the diagnosis and management of Haematological disorders such as anaemias and thrombocytic disorders. Diagnostic microbiological services include the determination and identification of bacteria, fungi, viruses and parasites', 'is (1).jpg', '', '', '2015-12-22 08:21:10'),
(3, 0, 'Nuclear Cardiology', 'In this Department, stress MIBI scan and viability scan are done on OPD basis. The number of patients benefited through this department is around 1000 annually. Nuclear Cardiology Department has been working since 1stNovember, 2010. It is purely diagnostic department for cardiac disease by using radioactivity and radiopharmaceutical. The department is providing the facility of these following non-invasive diagnostic procedures by using radionuclide techniques.\r\n1.	Myocardial Perfusion Stress/Rest SPECT Scan\r\n2.	Myocardial Perfusion Viability SPECT Scan\r\nWe are providing these diagnostic facilities to 30 patients per week.\r\nThe department has a dual head SPECT dedicated Cardiac Gamma Camera with Brand Name IS-2 manufactured by Positron USA. This Gamma Camera is specially designed for cardiac scan with high resolution and compensating sentivity.\r\nWe are using molybdenum (Mo-99) Generator from PINSTECH which is main source of Technetium 99m (Tc-99m), used for disgnosing Cardiac Diseases. Technetium 99m is unique element with 6 hours half life and 140kv photon energy.\r\nFor the purpose of stress, different types of protocols for cardiac stress are used according to patientâ€™s condition including exercise protocol with ETT machine manufactured by QUINTON, Argumeter Cycle and pharmacological stress with Dobutamine, Dipyridamole (persantin) and Adenosine.\r\nFuture Plan\r\nâ€¢	Trying to increase number of patients per day on posiible                                      shortest appointment date.\r\nâ€¢	Muga Scan\r\nâ€¢	V/Q Ventilation Perfusion Scan', 'is (2).jpg', '', '', '2015-10-09 07:19:12'),
(4, 0, 'ECG', 'â€¢	The electrocardiogram (ECG or EKG) is a diagnostic tool that is routinely used to assess the electrical and muscular functions of the heart.  It helps to understand how the heart works. With each heartbeat, an electrical signal spreads from the top of the heart to the bottom. As it travels, the signal causes the heart to contract and pump blood. The process repeats with each new heartbeat.\r\nâ€¢	Doctors use ECG to detect and study many heart problems, such as heart attacks, arrhythmias and heart failure. The testâ€™s results also can suggest other disorders that affect heart function.\r\nâ€¢	ECG is the basic tool in cardiology. These machines are available in all wards, OPD(s) and Emergency room. These machines are operated by skilled technicians', 'is (3).jpg', '', '', '2015-10-09 07:21:03'),
(5, 0, 'Blood Bank', 'Blood Bank and Blood Transfusion Lab. of the institution serving the patients since August 2007 and provides the following services to the cardiac patients.\r\n1.	Blood Grouping & Cross Matching\r\n2.	Screening by ELISA for HbsAg, Anti. HCV & HIV\r\n3.	Preparation of Whole Blood for Transfusion\r\n4.	Preparation of RBC Concentrates for Transfusion\r\n5.	Preparation of FFP Concentrates for Transfusion\r\n6.	Preparation of Random Donor Platelets for Transfusion', 'is (4).jpg', '', '', '2015-10-09 07:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `recovery_token` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `recovery_token`) VALUES
(1, 'M Hussain', 'mh@gmail.com', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `symptoms` varchar(500) NOT NULL,
  `disease` varchar(500) NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `tests` varchar(255) NOT NULL,
  `gardian` varchar(255) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `user_id`, `patient_id`, `doctor_id`, `department_id`, `symptoms`, `disease`, `prescription`, `tests`, `gardian`, `comments`, `status`, `created_at`) VALUES
(1, 0, 1, 1, 0, 'No symptom', 'No disease', 'No Prescription', '', '', 'No comment', 'Approved', '2015-10-20 00:17:17'),
(2, 0, 2, 1, 0, 'No Symptom', 'Thelsemia', 'Not given', '', '', 'Not given\r\n                                                    ', 'Approved', '2015-10-22 03:21:19'),
(3, 0, 2, 1, 0, 'No symptom', 'af', '                                                   dfdfasfzv', '', '', '         bbbbbbbbbbbbbbbbbbbbbcxz                                           ', 'Approved', '2015-10-20 19:00:00'),
(4, 0, 1, 1, 0, '', '', '', '', '', '', 'Approved', '2015-10-14 19:21:00'),
(5, 0, 1, 1, 0, '', '', '                                                    ', '', '', '                                                    ', 'Approved', '2015-10-20 19:00:00'),
(6, 0, 1, 1, 0, '', '', '                                                    ', '', '', '                                                    ', 'Approved', '2015-10-20 19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_disease`
--
ALTER TABLE `doctor_disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`), ADD KEY `doctor_id` (`doctor_id`), ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `doctor_disease`
--
ALTER TABLE `doctor_disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
