-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 05:22 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journal_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `associative_editor_information`
--

CREATE TABLE `associative_editor_information` (
  `id` int(11) NOT NULL,
  `associative_editor_name` varchar(100) NOT NULL,
  `associative_editor_designation` varchar(30) NOT NULL,
  `associative_editor_university_name` varchar(200) NOT NULL,
  `associative_editor_email` varchar(200) NOT NULL,
  `associative_editor_contact_no` varchar(11) NOT NULL,
  `associative_editor_country` varchar(200) NOT NULL,
  `associative_editor_password` varchar(200) NOT NULL,
  `associative_editor_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `associative_editor_information`
--

INSERT INTO `associative_editor_information` (`id`, `associative_editor_name`, `associative_editor_designation`, `associative_editor_university_name`, `associative_editor_email`, `associative_editor_contact_no`, `associative_editor_country`, `associative_editor_password`, `associative_editor_status`) VALUES
(5, 'Rejwan143342', 'Associate Professor', 'Sust', 'rejwanahmed143342@gmail.com', '01784463834', 'Liberia', '25f9e794323b453885f5181f1b624d0b', '1'),
(6, 'Raya Ahmed', 'Professor', 'UIU', 'raya@gmail.com', '01542478454', 'Namibia', '25f9e794323b453885f5181f1b624d0b', '0'),
(7, 'Ayra Sanam', 'Assistant Professor', 'World University', 'ayra@gmail.com', '01721723344', 'Albania', '25f9e794323b453885f5181f1b624d0b', '0'),
(8, 'Bob', 'Lecturer', 'NUST', 'bob@gmail.com', '01385757378', 'Argentina', '25f9e794323b453885f5181f1b624d0b', '0'),
(9, 'John ashfaq', 'Associate Professor', 'BUET', 'john@gmail.com', '01590048480', 'Bangladesh', '25f9e794323b453885f5181f1b624d0b', '0'),
(10, 'Sophie', 'Professor', 'SAU', 'sophie@gmail.com', '01894858480', 'Singapore', '25f9e794323b453885f5181f1b624d0b', '0'),
(11, 'Bella ', 'Associate Professor', 'BU', 'bella@gmail.com', '01986746445', 'Bhutan', '25f9e794323b453885f5181f1b624d0b', '1'),
(12, 'Aurbey', 'Professor', 'RU', 'aurbey@gmail.com', '01789957899', 'Denmark', '25f9e794323b453885f5181f1b624d0b', '0'),
(13, 'Naira', 'Assistant Professor', 'CU', 'naira@gmail.com', '01947385679', 'Netherlands', '25f9e794323b453885f5181f1b624d0b', '1'),
(14, 'Tashfin', 'Assistant Professor', 'BAU', 'tashfin@gmail.com', '01793345678', 'Finland', '25f9e794323b453885f5181f1b624d0b', '0');

-- --------------------------------------------------------

--
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_designation` varchar(30) NOT NULL,
  `author_university_name` varchar(200) NOT NULL,
  `author_email` varchar(200) NOT NULL,
  `author_contact_no` varchar(11) NOT NULL,
  `author_country` varchar(200) NOT NULL,
  `author_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`id`, `author_name`, `author_designation`, `author_university_name`, `author_email`, `author_contact_no`, `author_country`, `author_password`) VALUES
(4, 'Md. Rejwan Ahmed', 'Assistant Professor', 'RU', 'rejwancse10@gmail.com', '01699543367', 'Bangladesh', '25f9e794323b453885f5181f1b624d0b'),
(5, 'Henri ', 'Assistant Professor', 'Oxford University', 'Henri@gmail.com', '01567988643', 'Bangladesh', '25f9e794323b453885f5181f1b624d0b'),
(6, ' Aaron Ashfan', 'Lecturer', 'CU', 'aaron@gmail.com', '01985356533', 'Belgium', '25f9e794323b453885f5181f1b624d0b'),
(7, 'Taha Khaled', 'Assistant Professor', 'DIU', 'taha@gmail.com', '01896009763', 'Lebanon', '25f9e794323b453885f5181f1b624d0b'),
(8, 'Peter', 'Lecturer', 'DUET', 'peter@gmail.com', '01867755899', 'Paraguay', '25f9e794323b453885f5181f1b624d0b'),
(9, 'Arisha sams', 'Assistant Professor', 'BSMRB', 'arisha@gmail.com', '01586965958', 'Australia', '25f9e794323b453885f5181f1b624d0b'),
(10, 'Chonchol ahmed ', 'Assistant Professor', 'NU', 'chonchol@gmail.com', '01343589940', 'Canada', '25f9e794323b453885f5181f1b624d0b'),
(11, 'Patrik', 'Assistant Professor', 'JU', 'patrik@gmail.com', '01945774349', 'Jamaica', '25f9e794323b453885f5181f1b624d0b'),
(12, 'Divisha', 'Lecturer', 'IU', 'divisha@gmail.com', '01789035667', 'India', '25f9e794323b453885f5181f1b624d0b'),
(13, 'Erram khan', 'Assistant Professor', 'EU', 'erram@gmail.com', '01894437345', 'Egypt', '25f9e794323b453885f5181f1b624d0b'),
(14, 'Mahir', 'Associate Professor', 'MSTU', 'mahir@gmail.com', '01988976070', 'Maldives', '25f9e794323b453885f5181f1b624d0b'),
(15, 'Sanaya', 'Associate Professor', 'AIUB', 'sanaya@gmail.com', '01789094577', 'American Samoa', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `main_editor_information`
--

CREATE TABLE `main_editor_information` (
  `id` int(11) NOT NULL,
  `main_editor_name` varchar(100) NOT NULL,
  `main_editor_designation` varchar(30) NOT NULL,
  `main_editor_university_name` varchar(200) NOT NULL,
  `main_editor_email` varchar(200) NOT NULL,
  `main_editor_contact_no` varchar(11) NOT NULL,
  `main_editor_country` varchar(200) NOT NULL,
  `main_editor_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_editor_information`
--

INSERT INTO `main_editor_information` (`id`, `main_editor_name`, `main_editor_designation`, `main_editor_university_name`, `main_editor_email`, `main_editor_contact_no`, `main_editor_country`, `main_editor_password`) VALUES
(2, 'Election1', 'Professor', 'Jatiya Kabi Kazi Nazrul Islam University', 'jkkniuelection@gmail.com', '01515652901', 'Bangladesh', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `new_paper`
--

CREATE TABLE `new_paper` (
  `id` int(11) NOT NULL,
  `paper_id` varchar(200) NOT NULL,
  `author_id` int(11) NOT NULL,
  `associative_editor_id` varchar(200) NOT NULL,
  `reviewer_id` varchar(200) NOT NULL,
  `paper_title` varchar(1000) NOT NULL,
  `paper_abstract` varchar(5000) NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `paper_type` varchar(50) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_designation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(300) NOT NULL,
  `cover_letter_pdf` varchar(300) NOT NULL,
  `manuscript_image` varchar(300) NOT NULL,
  `supplimentary_file` varchar(300) NOT NULL,
  `paper_status` int(2) NOT NULL,
  `count` int(11) NOT NULL,
  `volume_info` varchar(200) DEFAULT NULL,
  `issue_info` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `published_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_paper`
--

INSERT INTO `new_paper` (`id`, `paper_id`, `author_id`, `associative_editor_id`, `reviewer_id`, `paper_title`, `paper_abstract`, `paper_keywords`, `paper_type`, `authors_name`, `authors_affiliation`, `authors_designation`, `authors_email`, `manuscript_pdf`, `cover_letter_pdf`, `manuscript_image`, `supplimentary_file`, `paper_status`, `count`, `volume_info`, `issue_info`, `created_at`, `updated_at`, `published_status`) VALUES
(41, '1683110322', 4, '5', '12', 'A Rebellious Identity in the Domain of Bangla Literature', 'A Rebellious Identity in the Domain of Bangla Literature', 'bangla\",literature', 'commentary papers', '', '', '', '', '1683110322.pdf', '1683110322.pdf', '', '1683110322.pdf', 100, 1, 'Volume 2', 'Issue 3', '2023-05-03 10:38:42', '2023-05-03 11:39:57', '1'),
(52, '1683351965', 6, '5', '12', 'INNOVATIVE PEDAGOGICAL TECHNOLOGIES IN THE MODERN  EDUCATIONAL SYSTEM', 'The article considers innovative activity in education as a socially \r\nsignificant practice aimed at the moral self-improvement of a person, which \r\nis capable of transforming all existing types of practices in society', '\"system\",\"\"innovative\" innovative technologies, innovative approach to education, pedagogical innovation', 'original research(full paper)', '', '', '', '', '1683351965.pdf', '1683351965.pdf', '', '1683351965.pdf', 99, 1, '', '', '2023-05-06 05:46:05', '2023-05-27 19:01:19', '0'),
(53, '1683352135', 6, '5', '12', 'Religion as a Source of Violence: Contending the Narrative  of Political Violence Perpetrated in the Name of Islam in  Bangladesh', 'Since Bangladesh emerged as an independent country, violence has become a part of \r\nits political process and activism. This paper challenges a dominant narrative that has \r\nbeen discursively constructed and promoted by secularist communities, civil societies, \r\npolitical parties (including the ruling party), and groups in Bangladesh throughout the \r\nyears. A dominant narrative about religious violence claims Islamists are primarily \r\nresponsible for political violence in Bangladesh. However, based on a robust analysis \r\nof thirty years of data on violence and other of credible sources, I have found that the \r\ndominant narrative is not backed by factual and quantitative evidence or a popular \r\nmandate but is constructed primarily to support and legitimize political persecution \r\nin the politics of Bangladesh. This paper offers a counter-narrative and argues that \r\nin Bangladesh, violence has become a political tool for opposition groups to acquire \r\npower and for incumbent regimes to retain power. Moreover, it states that religious \r\nparties are less violent than secular groups in Bangladesh.', 'Religion; Islam; violence; politics; Bangladesh', 'original research(short paper)', '', '', '', '', '1683352135.pdf', '1683352135.pdf', '', '1683352135.pdf', 100, 1, 'Volume 1', 'Issue 1', '2023-05-06 05:48:55', '2023-05-06 16:11:26', '1'),
(54, '1683354769', 4, '5', '12', ' Comparative Literature Analysis between Robert Frost and Kazi  Nazrul Islam', ' Comparative literature is a discipline that involves the study of literature and cultural \r\nexpressions across linguistic, national, and disciplinary boundaries. This paper aims to explore \r\nthe history and scope, Robert Frost’s literary works compared to Kazi Nazrul Islam’s works and \r\nthe importance of comparative literature as a field of study. It will also discuss some of the major \r\ntheoretical frameworks and methodologies employed in comparative literature, and examine the \r\nchallenges and opportunities presented by the globalization of literary culture.', 'Comparative Literature, Analysis, Poem', 'requested paper', '', '', '', '', '1683354769.pdf', '1683354769.pdf', '', '1683354769.pdf', 100, 1, 'Volume 3', 'Issue 1', '2023-05-06 06:32:49', '2023-05-28 19:10:27', '1'),
(55, '1683354925', 4, '5', '12', 'A Stylistic Analysis of \"Bidrohi\": Kazi Nazrul Islam’s Contribution to a NeoRenaissance through Poetry', 'The study focuses on the rebellion poems over world influence, themes, and stylistic \r\nevaluation in \"The Bidrohi\" by Kazi Nazrul Islam. The data source used in this research is \r\nthe poem \"bidrohi\" and \"the rebel,\" where \"the rebel\" is the translated form of the \"Bidrohi\" \r\npoem. To analyze the data, the author used a linguistics-grammatical perspective, qualitative \r\ndescriptive, and quantitative data research methodology. With the use of numbers, \r\npercentages, and their interpretation, the study analyzes and clarifies the messages that the \r\nauthor wishes to share with the reader. The information was gathered by employing reading, \r\ngathering, and analysis approaches. This research topic demonstrates the terriability of \r\ncolonialism and slavery, as well as how to protect this situation and the renaissance for \r\nfreedom, and some statistics back up the description. The author hopes that this research will \r\nbe beneficial to all nations around the world.', ' The rebel poem; Kazi Nazrul Islam; Bidrohi; Bangladesh poetics', 'original research(short paper)', '', '', '', '', '1683354925.pdf', '1683354925.pdf', '', '1683354925.pdf', 5, 1, '', '', '2023-05-06 06:35:25', '2023-05-29 06:09:50', '0'),
(56, '1683355092', 4, '', '', 'Educational Thoughts of Kazi Nazrul Islam and  Its Relevance in Contemporary Era', 'Twentieth century is revered as the most auspicious epoch of modern Indian civilization. Many dazzling \r\nstars came into the various fields in the aftermath of Indian Renaissance who further removed ancient mist from \r\nsociety. In the period of full flowering of nationalism, Kazi Nazrul Islam appeared to be a pole star to guide the \r\ncommon folk. He is one of the versatile figures in Bengali literature authoring many poems, songs, plays and novels. \r\nHe is well known as ‘Rebel’ poet. His writings are equipped with equal amount of empathy, humanistic principles \r\nand universalism. In the era of Swadeshi he was also of the opinion of Indianization of education framework in \r\nvogue. He had deep respect on the glory, values and age-old tradition of India. He advocated for incorporation of \r\nthese ideals in curriculum but in a scientific line. He uttered relentlessly in his poems for a secular school education \r\nsystem combined with scientific temperament. Though he was a supporter of individualistic learning, he identified \r\nhimself with universal outlook. Moreover he rendered different sets of moralistic tenets for learner and teacher for a \r\nmeaningful teaching learning process. Above all he was vocal for moral development of young students in a \r\nGandhian line. His radical thought pertaining to women education is best exemplified by one of his poem Nari \r\nwhich seems to be a promulgation of crusade at that time. To sum up, his writings are against struggle, injustice, \r\ninequalities of people’s life. By analysing his works at length here the paper will try to interpret his attitude towards \r\neducation. In this background, the present paper has tried to focus on the educational thoughts of Kazi Nazrul IslamConcepts of Education, Aims of Education, Curriculum, Methods of Teaching, Role of Teacher and Relevance of \r\nhis educational thoughts in contemporary era.', 'education, educational thoughts, aims, curriculum, methods of teaching, teacher', 'original research(full paper)', '', '', '', '', '1683355092.pdf', '1683355092.pdf', '', '1683355092.pdf', 1, 1, '', '', '2023-05-06 06:38:12', '2023-05-06 06:38:12', '0'),
(57, '1683355511', 4, '', '', 'Fierce Literary Works of Kazi Nazrul Islam: A Rebellious Identity in the Domain of Bangla Literature', 'As a perennial author Kazi Nazrul Islam upholds the title of ‘Rebel poet’ in Bangla literature as well\r\nas in world literature. Being a Muslim musician, poet and novelist, he used his poetry to inspire Indians to rebel\r\nagainst British colonialism. Thus is the proof of Nazrul’s inflammatory attitudes against oppression. He had\r\nseveral pieces of literature banned by the British government in an attempt to supress the rebellious movements.\r\nBidrohi is one of his famous anti British writing piece, which has immediately placed him in the public eye. In\r\nthe time of rebellion and political unrest, Nazrul’s poetry played a crucial role in uniting the oppressed and\r\nproviding them with an intense sense of nationalism. He joined Swadeshi (self rule) and boycotts British He has\r\ncomposed many songs to sing and let the youths to become enthusiastic for ingrained nationalism, patriotism.\r\nHis literary works were very much against the foreign rule, communalism, imperialism, colonialism,\r\nfundamentalism and exploitation. British government prescribed his books and put him behind bars. Through\r\nhis written Rajbandir jibanbondi (prisoner’s deposition) and his forty days hunger strike, Nazrul protested\r\nagainst the harassment. His writings were full of revolutionary messages that stirred up the spirit of freedom\r\namongnest the grass roots level foiling masses. This made the British government cautious about Nazrul. This\r\npaper is an effort to understand the fierce works of Kazi Nazrul Islam, including some of his famous poems,\r\nsongs, essays and anthologies. ', 'Kazi Nazrul Islam, Poetry, Literature, Song, Anthology, Colonialism, Rebellion', 'original research(short paper)', '', '', '', '', '1683355511.pdf', '1683355511.pdf', '', '1683355511.pdf', 1, 1, '', '', '2023-05-06 06:45:11', '2023-05-06 06:45:11', '0'),
(58, '1683356188', 4, '5', '12', 'The Great War, communal identity and personal emotions in thefiction of Kazi Nazrul Islam', 'This article examines how Kazi Nazrul Islam, litterateur and musicalpolymath, references the First World War in his Bengali prosefiction asa means of constructing and asserting both a personal and a communalidentity. Nazrul was part of the newly formed 49thBengalees or theBengali Double company, which never saw combat and was unceremo-niously dissolved after the War. Several of hisfictional works writtenduring his posting in Karachi cantonment or immediately after it drawon the War as a matrix for staging a multiply inflected persona withautobiographical overtones. These texts often equate military service forthe colonial master with patriotism and evoke an ideal of heroic mascu-linity for the heroism-starved Bengali. Besides, most of these texts try toinscribe Bengali Muslims into an urbane, middle-class literary space andforge an identity for them within the broader rubric of Bengali or Indiannationalism. But more conspicuously, these texts focus on personalemotions revolving around unrequited love. Even in texts depictinggruesome battle scenes and the rigours of military training, the GreatWar does not enjoy thematic centrality but serves only to metaphorise orcatalyse the protagonist’s amatory tribulations. This article argues thatNazrul’s prosefiction deserves attention because of the way it appro-priates and personalises the Great War for emotional self-projection, indialogue with the more public sentiments of heroic masculinity andpatriotism.', 'Kazi Nazrul Islam; First WorldWar; heroic masculinity;Bengali Muslim identity;unrequited loveThis article will illustrate how the early prosefiction of Kazi Nazrul Islam (1899–1976) featuringthe Great War explores the discourse of patriotism and attempts a military re-modelling ofBengali masculinity. Further, it will demonstrate how Nazrul attempts to inscribe the Bengali-speaking Muslims into an urbane, middle-class literary space under the broader rubric of Bengaliidentity and also in adherence to transnational Islam. The article will then consider how Nazrul’sfiction privileges the emotional life of a recurring lovelorn hero while engaging with morecollectivist or communitarian projects. The texts by Nazrul discussed here are the short storyBoundeler Atmakahini(‘Autobiography of a Vagabond’; published May-June 1919), the shortstoryHena(published October-November 1919), the short storyByathar Dan(‘Gift of Pain’;published January-February 1920), the short storyGhumer Ghore(‘In Slumber', 'commentary papers', '', '', '', '', '1683356188.pdf', '1683356188.pdf', '', '1683356188.pdf', 0, 1, '', '', '2023-05-06 06:56:28', '2023-05-28 15:18:44', '0'),
(59, '1683356707', 5, '5', '12', 'Self-diagnosis and self-treatment of malaria in hard-to-reach and mobile populations of the Amazon: results of Malakit, an international multicentric intervention research project.', 'of emergence of resistance linked to improper use of artemisinin-based combination therapy (ACT). The\r\nremoteness of the mines and regulatory issues hinder their access to health care.\r\nMethods: A quasi-experimental researched project (Malakit) implemented in FG borders with Brazil and\r\nSuriname aimed at determining the effectiveness of distributed kits for self-diagnosis and self-treatment\r\nto illegal gold miners, after training, at strategic border staging areas. Evaluation relied on questionnaires\r\nat inclusion and follow-up visits, and pre/post intervention surveys. The primary outcome was the proportion of persons reporting a use of certified ACT after a positive malaria diagnosis. The secondary outcomes assessed antimalarial adherence, kit use and impact on malaria epidemiology.\r\nFindings: The proportion of patients reporting a use of certified ACT after a positive diagnosis increased\r\nafter the intervention (OR 1.8, 95%CI [1.1-3.0]). From April 2018 to March 2020, 3,733 persons participated\r\nin the intervention. The kit was used correctly by 71.7% [65.8-77.7] of the 223 persons reporting having\r\nused a malakit during the follow-up visits. No serious adverse events related to the misuse of malakit\r\nhave been reported. The intervention appears to have accelerated the decline in malaria incidence in the\r\nregion by 42.9%.\r\nInterpretation: This innovative international project showed that people with low education can correctly\r\nself-manage their malaria symptoms. This strategy could be integrated in the malaria control programs\r\nof the countries involved and considered in other regions with residual malaria in remote areas.\r\nFunding: This project was funded by the European Union, the Global Fund, Brazil MoH, Cayenne Hospital\r\nand FG Health Regional Agency.\r\nEditor’s note: This translation in French was submitted by the authors and we reproduce it as supplied.\r\nIt has not been peer reviewed. Our editorial processes have only been applied to the original abstract in\r\nEnglish, which should serve as reference for this manuscript. The Lancet Group takes a neutral position\r\nwith respect to territorial claims in published maps and institutional affiliations.\r\nContexte: Les chercheurs d’or illégaux sont actuellement un réservoir clé du paludisme en Guyane, avec\r\nun risque d’émergence de résistance lié à une mauvaise utilisation des combinaisons thérapeutiques à ∗ Corresponding author: Centre d’Investigation Clinique Antilles-Guyane, Inserm 1424, Cayenne Hospital, Avenue des Flamboyants, BP, 97306 Cayenne, +594 594 39 53 88\r\nE-mail address: Maylis.douine@ch-cayenne.fr (M. Douine).', 'mobile population malaria control self-diagnosis self-treatment quasi-experimental design interventional research Amazon forest Americas vulnerable population', 'commentary papers', '', '', '', '', '1683356707.pdf', '1683356707.pdf', '', '1683356707.pdf', 0, 1, '', '', '2023-05-06 07:05:07', '2023-05-28 19:07:40', '0'),
(60, '1683356949', 5, '', '', 'Racial and Ethnic Disparities in Mental Health and Mental Health Care  During The COVID‑19 Pandemic', 'During the pandemic, the overall mental health of the US population declined. Given higher rates of COVID-19 infections \r\nand deaths experienced by communities of color along with greater exposure to pandemic-related stressors (e.g., unemployment, food insecurity), we expect that the decline in mental health during the pandemic was more pronounced among \r\nBlack, Hispanic, and Asian adults, with these groups also having less access to mental health services. We examine two \r\nnationally representative US surveys: the 2019 National Household Interview Survey (NHIS; N=30,368) and the 2020–2021 \r\nHousehold Pulse Survey (HPS; N=1,677,238). We fnd mental health of Black, Hispanic, and Asian respondents worsened \r\nrelative to White respondents during the pandemic, with signifcant increases in depression and anxiety among racialized \r\nminorities compared to Whites. There is also evidence of especially high mental health burden for Black adults around the \r\nmurder of George Floyd by police and for Asian adults around the murder of six Asian women in Atlanta. White respondents \r\nare most likely to receive professional mental health care before and during the pandemic, and Black, Hispanic, and Asian \r\nrespondents demonstrate higher levels of unmet mental health care needs during the pandemic than White respondents. Our \r\nresults indicate that within the current environment, White adults are at a large and systemic advantage bufering them from \r\nunexpected crises—like the COVID-19 pandemic. Without targeted interventions, the long-term social consequences of the \r\npandemic and other co-occurring events (e.g., death of Black and Hispanic people by police) will likely include widening \r\nmental health disparities between racial/ethnic groups.', 'Racism; Race/ethnicity; Mental health; COVID-19 pandemic; Mental health care; Health disparities', 'requested paper', '', '', '', '', '1683356949.pdf', '1683356949.pdf', '', '1683356949.pdf', 100, 1, '', '', '2023-05-06 07:09:09', '2023-05-28 15:16:14', '0'),
(61, '1683357414', 7, '5', '12', 'The Impact of Gross Domestic Product on the Bangladesh Stock Market: An Empirical Analysis', ' This research paper is an attempt to find out the impact of macroeconomic drivers such as Gross Domestic\r\ngrowth rate, Inflation rate, and Industrial production index on the Dhaka stock exchange i.e., DSE 30 index. To attain this\r\ngoal, secondary data for the period from 2010 to 2021 has been collected from websites (from worldbank.org). This data have\r\nbeen analyzed through statistical techniques such as descriptive statistics, Pearson correlation analysis, Multiple regression\r\nanalysis. The study found a significant and positive relationship between Bangladesh Stock Market index and GDP rate.\r\nOther two selected independent variables i.e., Inflation rate and Industrial Production index have positive relation but not\r\nstatistically and significant association with the Bangladesh stock market returns.', 'Macroeconomic factors, GDP rate, Inflation rate, Dhaka Stock Market', 'original research(short paper)', '', '', '', '', '1683357414.pdf', '1683357414.pdf', '', '1683357414.pdf', 100, 1, 'Volume 2', 'Issue 1', '2023-05-06 07:16:54', '2023-05-27 19:27:06', '1'),
(62, '1683357567', 7, '5', '12', 'The Impact of Social Preferences on Supply Chain Performance: An Application of the Game Theory Model', 'Traditional supply chain literature on contracting only considers agents’ economic motivation. Nowadays, with the development\r\nof behavioral economics, social preference theory has been widely used in supply chain research. Tese social preferences are\r\ndistinct from economic motivation and will infuence agents’ behaviors in the supply chain. Agents will make decisions based on\r\nnot only self-interests but also the interests of others, reciprocity, and fairness. Tis paper introduces the relationship and status\r\npreferences in the utility function. We aim to analyze the impact of social preference on individual competition intensity in the\r\nsupply chain. A Stackelberg game model (tacit collusion) is used as the theoretical framework of the choice behavior between\r\ncompetition and cooperation. Te theoretical results and numerical simulation analysis show that under some conditions,\r\nsuppliers and retailers who take the social preference factors into account can realize multiple-stage channel coordination through\r\nrevenue sharing. Moreover, social preference factors will infuence the choice behavior of agents in competition and cooperation.\r\nSpecifcally, the relationship preference promotes close cooperation among enterprises and signifcantly improves the supply\r\nchain and individual performance. Status preference causes ferce competition among enterprises and adversely afects supply\r\nchain performance and individual performance, making it more unstable. Tese fndings can provide useful insights for supply\r\nchain coordination.', 'impact\",social\"', 'requested paper', '', '', '', '', '1683357567.pdf', '1683357567.pdf', '', '1683357567.pdf', 100, 1, 'Volume 1', 'Issue 1', '2023-05-06 07:19:27', '2023-05-06 16:10:51', '1'),
(63, '1683358279', 8, '', '', 'Predictis: an IoT and machine learning-based  system to predict risk level of cardio-vascular  diseases', 'Background Despite technological advancement in the feld of healthcare, the worldwide burden of illness caused \r\nby cardio-vascular diseases (CVDs) is rising, owing mostly to a sharp increase in developing nations that are undergoing fast health transitions. People have been experimenting with techniques to extend their lives since ancient times. \r\nDespite this, technology is still a long way from attaining the aim of lowering mortality rates.\r\nMethods From methodological perspective, a design Science Research (DSR) approach is adopted in this research. \r\nAs such, to investigate the current healthcare and interaction systems created for predicting cardiac disease for \r\npatients, we frst analyzed the body of existing literature. After that, a conceptual framework of the system was \r\ndesigned using the gathered requirements. Based on the conceptual framework, the development of diferent components of the system was completed. Finally, the evaluation study procedure was developed taking into account the \r\nefectiveness, usability and efciency of the developed system.\r\nResults To attain the objectives, we proposed a system consisting of a wearable device and mobile application, \r\nwhich allows the users to know their risk levels of having CVDs in the future. The Internet of Things (IoT) and Machine \r\nLearning (ML) techniques were adopted to develop the system that can classify its users into three risk levels (high, \r\nmoderate and low risk of having CVD) with an F1 score of 80.4% and two risk levels (high and low risk of having CVD) \r\nwith an F1 score of 91%. The stacking classifer incorporating best-performing ML algorithms was used for predicting \r\nthe risk levels of the end-users utilizing the UCI Repository dataset.\r\nConclusion The resultant system allows the users to check and monitor their possibility of having CVD in near future \r\nusing real-time data. Also, the system was evaluated from the Human-Computer Interaction (HCI) point of view. Thus, \r\nthe created system ofers a promising resolution to the current biomedical sector.\r\nTrial Registration Not Applicable.', 'Cardio-vascular disease, Internet of Things, Machine learning, Stacking classifer, Prediction, Risk level', 'original research(short paper)', '', '', '', '', '1683358279.pdf', '1683358279.pdf', '', '1683358279.pdf', 100, 1, 'Volume 2', 'Issue 3', '2023-05-06 07:31:19', '2023-05-27 19:11:04', '1'),
(64, '1683359866', 9, '', '', 'Applying Systems Thinking to Education:  Using the RISE Systems Framework to Diagnose  Education Systems1', 'Most education systems in low- and middle-income \r\ncountries are experiencing a learning crisis. The last \r\n30 years have seen dramatic success in the expansion \r\nof schooling access and attainment for children around \r\nthe world. Education systems in the majority of low- and \r\nmiddle-income countries have become very successful \r\nat achieving schooling for all (or nearly all) children. \r\nHowever, they persistently fail to produce learning for all \r\n(Pritchett, 2013, World Bank, 2018). Prior to the pandemic, \r\nthe World Bank estimated that 53 percent of children in \r\nlow- and middle-income countries, and nearly 80 percent \r\nof children in low-income countries will reach the end of \r\nprimary school without being able to read a simple text \r\n(World Bank, 2019). Recent analysis also shows that \r\nthis problem has been getting worse, not better over \r\ntime. Analysing repeated cross-sectional data across \r\n88 countries shows that the “quality” of education—\r\ndefined as the literacy rate of adults with a given level \r\nof schooling—was either stagnant or declining in most \r\ndeveloping countries between 1960 and 2000 (Le Nestour \r\net al., 2022).', ' education systems', 'requested paper', '', '', '', '', '1683359866.pdf', '1683359866.pdf', '', '1683359866.pdf', 100, 1, 'Volume 2', 'Issue 2', '2023-05-06 07:57:46', '2023-05-27 19:27:53', '1'),
(65, '1683373822', 10, '', '', 'Conservation and Preservation of Manuscripts in the Nazrul Conservation and Preservation of Manuscripts in the Nazrul  Academy Town Library: A Study and Proposal for their Academy Town Library: A Study and Proposal for their  Modernization', 'Presently information technology age, most of \r\nuser’s are dependent on digital information, but \r\nwe have to go to library for very rear and \r\nancient information. Manuscripts are the major \r\nsource of information to know about the \r\nhistorical facts, cultural heritage and bygone \r\ntraditions of the previously. Libraries are the \r\nonly safe place were preserved manuscripts, old \r\nrecords like hand written, poems, documents, letters etc. The manuscripts collection and \r\npreservation are influence to the human community, researcher can measure the usefulness of \r\nworth collection, who they are able to access them. The present study represents to conserve \r\nand preserve the available of manuscripts and rear documents of Kazi Nazrul Islam adopted \r\nat Nazrul Academy Town Library, West Bengal, India. The paper also highlights the present \r\nstatus and management of collection, services, staff strength, budget and policy of Nazrul \r\nAcademy Town Library and find out the gap of awareness about the collection, which are \r\nfacing many problems at the present time.', ' Manuscripts, Conservation, Preservation, Digital Preservation, Nazrul Academy  Town Library', 'commentary papers', '', '', '', '', '1683373822.pdf', '1683373822.pdf', '', '1683373822.pdf', 100, 1, 'Volume 1', 'Issue 3', '2023-05-06 11:50:22', '2023-05-27 19:09:06', '1'),
(66, '1683373934', 10, '5', '12', 'Challenges and Opportunities for Education Systems with the Current Movement toward Digitalization at the Time of COVID-19', 'The spread of coronavirus has caused the shutdown of businesses and classroom participation to enable social distancing. It has led to the promotion of digitalization in societies and online\r\nactivities. This manuscript presents an overview of the measures education systems could take to\r\npresent appropriate courses in accordance with the present movement toward digitalization, and\r\nother requirements of societies in the (post) crisis period.', 'COVID-19; digitalization; education system; innovation', 'original research(full paper)', '', '', '', '', '1683373934.pdf', '1683373934.pdf', '', '1683373934.pdf', 100, 1, 'Volume 3', 'Issue 1', '2023-05-06 11:52:14', '2023-05-27 19:30:01', '1'),
(67, '1683374686', 11, '5', '12', 'Prospective Directions of Implementation of Modern  Information Technologies in Education', 'After the independence of Uzbekistan, \r\nwide paths were opened for its economic and \r\nsocial development.', 'mordern,information', 'commentary papers', '', '', '', '', '1683374686.pdf', '1683374686.pdf', '', '1683374686.pdf', 100, 1, '', '', '2023-05-06 12:04:46', '2023-05-27 19:25:11', '0'),
(68, '1683374860', 11, '5', '12', 'Physico-mechanical properties evaluation of bottle gourd and okra  plant fiber reinforced polypropylene based composites', 'Bottle gourd and okra plant fiber based reinforced polypropylene composites were fabricated \r\napplying blended technique. The composites were prepared as a composition of 5 % okra plant fibers with \r\nvarying percentages of BGPF (Bottle gourd plant fiber) and polypropylene (pp) as a matrix. The thermomechanical and physical properties performed for evaluating the properties development and industrial \r\napplication. A composition of \"35% bottle guard + 5% okra + 60% pp\" was able to achieve remarkable \r\nmechanical properties, including tensile strength, tensile modulus, elongation at break, bending strength, \r\nbending modulus, impact strength, and hardness, with respective values of 26.95 MPa, 3.16 MPa, 1.71%, \r\n52.53 MPa, 3.45 MPa, 14.25 kJ/m2\r\n, and 69.', 'fibre,uptake,water,SEM', 'requested paper', '', '', '', '', '1683374860.pdf', '1683374860.pdf', '', '1683374860.pdf', 0, 1, '', '', '2023-05-06 12:07:40', '2023-05-27 19:25:36', '0'),
(69, '1683375433', 12, '5', '12', 'Development of an IOT Based Industrial Fault  Detection and Diagnosis System', 'This paper has proposed an IoT based industrial \r\nfault detection and diagnosis system. The IoT (Internet of \r\nthings) based industry protection system employing Arduino is\r\nintended to safeguard industries from losses brought on by\r\naccidents and monitoring the faults. Industrial accidents such \r\nas gas leakage causes fire resulting in significant industrial \r\nsetbacks. Due to furnace explosions, electrical short circuits, or\r\nother circumstances, quick fire detection is also required. The \r\nproposed system uses flame sensor along with gas sensor to\r\ndetect fire as well as gas leakage to avoid any industrial \r\nmishaps and prevent economic damage. The system consists of \r\ntemperature detector to detect the high/low temperature, the \r\nphase fault detector (either single or three phases), voltage \r\ncontroller (high/low), and frequency monitoring. Flame and \r\nGas sensors are also interfaced with arduino and LCD screen. \r\nThe sensor data is constantly scanned to record values and \r\ncheck for fire, gas leakage and then this data is transmitted to\r\nonline. The wifi module is used to achieve internet \r\nfunctionality. GSM module is sent message to specific numbers \r\nin case human operators aren’t present in online always. IP\r\ncamera monitor the whole system from anywhere in the world.', 'automation, fault detection, iot, safety, protection', 'original research(short paper)', '', '', '', '', '1683375433.pdf', '1683375433.pdf', '', '1683375433.pdf', 5, 1, '', '', '2023-05-06 12:17:13', '2023-05-27 19:36:46', '0'),
(70, '1683375574', 12, '5', '', 'Digital Transformation of Educational Management System', 'The article is devoted to the modernization of the education \r\nmanagement system at the municipal level based on the use of the \r\nideas of \"educational districts\" for education management and the \r\nconcept of digital transformation, meso-municipal approach to the \r\nmanagement of educational systems, management of socioeconomic systems \"Smart City\".', ' education  management, educational district,  digital transformation, Smart  City, meso-municipal approach.', 'original research(short paper)', '', '', '', '', '1683375574.pdf', '1683375574.pdf', '', '1683375574.pdf', 3, 1, '', '', '2023-05-06 12:19:34', '2023-05-27 19:20:02', '0'),
(71, '1683376210', 13, '5', '', 'Early childhood development and its association with maternal parity', 'Maternal parity, which is usually measured as the number of children\r\nborn to a mother, has a substantial impact on the social and environmental factors\r\naround children and their development. This paper estimates the Early Childhood\r\nDevelopment Index (ECDI) of 3- and 4-year-old children in Bangladesh and examines\r\nthe relationship between maternal parity and early childhood development.', 'child development, cognitive ability, delayed language, developmental delay, emotional well-being, physical health', 'original research(short paper)', '', '', '', '', '1683376210.pdf', '1683376210.pdf', '', '1683376210.pdf', 2, 1, '', '', '2023-05-06 12:30:10', '2023-05-27 19:16:00', '0'),
(72, '1683376395', 13, '', '', 'Effects of short birth interval on different forms of child mortality in Bangladesh: Application of propensity score matching technique with inverse probability of treatment weighting', 'This study analyzed data from 5,941 mothers and 1,594 health facilities extracted from the\r\n2017/18 Bangladesh Demographic and Health Survey and the 2017 Bangladesh Health\r\nFacility Survey. The exposure variable was SBI (defined as the interval between two subsequent births <33 months: yes, no), while the outcome variables were neonatal mortality\r\n(defined as mortality within 28 days of birth: yes, no), infant mortality (defined as mortality\r\nwithin 1 year of birth: yes, no), and under-five mortality (defined as mortality within 5 years of\r\nbirth: yes, no). Multilevel Poisson regression based on inverse probability treatment weights\r\nwas used to determine the association between exposure and outcome variables.', 'birth,effects', 'commentary papers', '', '', '', '', '1683376395.pdf', '1683376395.pdf', '', '1683376395.pdf', 100, 1, 'Volume 1', 'Issue 2', '2023-05-06 12:33:15', '2023-05-27 19:08:37', '1'),
(73, '1683376725', 14, '', '', 'Masculine Traits in Women Characters: A Comparative  Study between Lady Macbeth and Clytemnestra', 'Ancient and modern societies both have a binary way of observing gender. Through this dual \r\nthinking, gender roles are imposed on men and women. They were judged according to their gender roles. \r\nModern mentality also could not bring about much change in this fact about gender stereotypes, which has \r\nbeen happening since the beginning of the world. Masculine gender roles portray men to be physically \r\nstrong, intelligent, and aggressive. Feminine gender roles portray women to be physically weak, \r\nemotionally fragile, and submissive to a man’s whims and fancies. Historically, there have been some \r\niconic women who have challenged these gender stereotypes which became inspiration for those women \r\nwho are struggling for their rights.', 'Equality, femininity, masculinity, manhood, womanhood', 'original research(short paper)', '', '', '', '', '1683376725.pdf', '1683376725.pdf', '', '1683376725.pdf', 3, 1, '', '', '2023-05-06 12:38:45', '2023-05-27 19:12:10', '0'),
(74, '1683377188', 14, '', '', 'Methodology and Reports of Systematic Reviews and Meta-analyses', 'The acceleration in developments in \r\ncommunication technology has led to a consequent increase in the \r\nvulnerability of data due to penetration attacks. These attacks \r\noften came from outside where non-qualified companies develop \r\nIT projects.', 'reports,systematic', 'requested paper', '', '', '', '', '1683377188.pdf', '1683377188.pdf', '', '1683377188.pdf', 100, 1, 'Volume 1', 'Issue 2', '2023-05-06 12:46:28', '2023-05-27 19:08:13', '1'),
(75, '1683378500', 15, '', '', 'Sample Selection in Systematic Literature Reviews of Management Research', 'Systematic review techniques are about to become the “new normal” in reviews of management\r\nresearch. However, there is not yet much advice on how to organize the sample selection process as\r\npart of such reviews. This article addresses this void and analyzes this vital part of systematic reviews\r\nin more detail. In particular, it offers a critical review of systematic literature reviews published in the\r\nAcademy of Management Annals and the International Journal of Management Reviews between 2004 and\r\n2018. Based on this methodological literature review, the article presents issues to consider in the\r\nmost critical choices during the sample selection process. Furthermore, this review identifies several\r\ndescriptive features such as the mean number of research items included in systematic reviews, the\r\nmean number of databases used, and the mean coverage period of such reviews. These numbers may\r\nbe used as benchmark figures in future reviews.', 'literature review, systematic review, sample selection, articles, databases, search', 'commentary papers', '', '', '', '', '1683378500.pdf', '1683378500.pdf', '', '1683378500.pdf', 99, 1, '', '', '2023-05-06 13:08:20', '2023-05-27 19:03:15', '0'),
(76, '1683378638', 15, '5', '12', 'Socio-Economic Impact of Freelancing: Evidence From Bangladesh', 'In a third-world acute jobless society like Bangladesh, working-aged youth are continuously seeking for every\r\npossible source of employment through which the economic as well as social lives and realities see at least a\r\nstable going on. This analytical paper aims to examine freelancing as a device to sustain the socioeconomic\r\nactualities of the people in Bangladesh. Along with demographic data, different socioeconomic\r\ndeterminants-related information from 200 freelancers was collected through a structured questionnaire. The\r\nchi-square test was applied to the hypotheses to obtain the result. The findings revealed that freelancing as an\r\nemployment opportunity contributes to increasing income, upgrading living standards, improving the economic\r\nstability, alleviating poverty, improving health and nutrition, continuing education, improving the social status\r\nand recognition, and having substantial future prospects. It is to publicize the concept more to raise acquaintance\r\nand take initiatives to train interested youth, especially women and provide various opportunities in prospective\r\nfreelancing sources. This study will be helpful to the freelancers as they will have a clear view of the existing\r\npromising results and to future researchers also as there are numerous perspectives of the field in developing\r\ncountries, notably Bangladesh.', 'socio-economic, freelancing, Bangladesh', 'original research(short paper)', '', '', '', '', '1683378638.pdf', '1683378638.pdf', '', '1683378638.pdf', 6, 1, '', '', '2023-05-06 13:10:38', '2023-05-28 19:04:40', '0'),
(77, '1683378930', 15, '5', '12', 'Synaptic plasticity and mental health: methods, challenges and opportunities', 'Activity-dependent synaptic plasticity is a ubiquitous property of the nervous system that allows neurons to communicate and change their connections as a function of past experiences. Through reweighting of synaptic strengths, the nervous system can remodel itself, giving rise to durable memories that create the biological basis for mental function. In healthy individuals, synaptic plasticity undergoes characteristic developmental and aging trajectories. Dysfunctional plasticity, in turn, underlies a wide spectrum of neuropsychiatric disorders including depression, schizophrenia, addiction, and posttraumatic stress disorder. From a mechanistic standpoint, synaptic plasticity spans the gamut of spatial and temporal scales, from microseconds to the lifespan, from microns to the entire nervous system. With the numbers and strengths of synapses changing on such wide scales, there is an important need to develop measurement techniques with complimentary sensitivities and a growing number of approaches are now being harnessed for this purpose.', 'health,method', 'requested paper', '', '', '', '', '1683378930.pdf', '1683378930.pdf', '', '1683378930.pdf', 4, 1, '', '', '2023-05-06 13:15:30', '2023-05-27 19:32:32', '0'),
(78, '1683379127', 15, '5', '', 'System coherence for learning:  applications of the RISE education  systems framework', 'In recent decades, the education systems in most low- and middle-income countries (LMICs) have succeeded in rapidly expanding access to schooling so that, today, most children attend at least some amount \r\nof schooling. However, this expansion in access to schooling has not produced commensurate improvements in learning outcomes. A global \r\nlearning crisis has been widely acknowledged (World Bank, 2018; Angrist et al., 2021; Beatty et al., 2021; UNESCO et al., 2021).', 'education,schooling', 'original research(full paper)', '', '', '', '', '1683379127.pdf', '1683379127.pdf', '', '1683379127.pdf', 2, 1, '', '', '2023-05-06 13:18:47', '2023-05-27 19:16:54', '0'),
(79, '1683394140', 4, '5', '', 'The Protective Role of Glutathione Peroxidase in Apoptosis Induced by Reactive Oxygen Species .', 'Selenium-dependent glutathione peroxidase (GPx) plays a protective role in oxidative stress-induced apoptosis. In this study, we demonstrated that MDBK cells, a bovine renal epithelial cell line, exhibited internucleosomal DNA fragmentation characteristic of apoptotic cell death under selenium-deficient conditions with lower doses of hydrogen peroxide (H2O2) than under selenium-supplemented ones. This was due to a decreased amount of GPx in the cells under selenium-deficient conditions, because other antioxidative enzyme activities were not affected by the selenium supplementation. Cumene hydroperox-ide also induced DNA fragmentation in selenium-deficient cells but no ladder formation was observed. ', 'apoptosis, catalase, glutathione peroxidase, hydrogen peroxide, selenium deficiency', 'requested paper', '', '', '', '', '1683394140.pdf', '1683394140.pdf', '', '1683394140.pdf', 3, 1, '', '', '2023-05-06 17:29:00', '2023-05-27 19:32:01', '0'),
(80, '1685283438', 4, '5', '12', '174 Niaz Zaman. “I am Keats: Kazi Nazrul Islam and the Romantic Poet.” CROSSINGS: VOL. 12 | 2021 | pp. 174-181 | ISSN 2071–1107 I am Keats: Kazi Nazrul Islam and the Romantic Poet', 'In a letter to Qazi Motahar Hossain, Kazi Nazrul Islam described how close he\r\nfelt to Keats. He even feared that his sore throat was a sign of tuberculosis and\r\nhe would succumb to it as Keats did. He was also in love, like Keats, with a\r\nwoman who did not reciprocate his love. However, it was not only in his personal\r\nletters that Nazrul talked about Keats, but also in his essays. It is possible that the\r\ninspiration for “Amar Sundar” (My Beauty) came from Keats’ oft-quoted line.\r\nTh is paper will examine selected letters and essays by Nazrul to show how he\r\nappropriated the youngest English Romantic in his writings', 'Qazi Motahar Hossain, Kazi Nazrul Islam, Keats, letters, essays, “Amar Sundar”', 'commentary papers', '', '', '', '', '1685283438.pdf', '1685283438.pdf', '', '1685283438.pdf', -1, 1, '', '', '2023-05-28 14:17:18', '2023-05-28 14:28:06', '0'),
(81, '1685283438', 4, '5', '12', 'I am Keats: Kazi Nazrul Islam and the Romantic Poet.', 'In a letter to Qazi Motahar Hossain, Kazi Nazrul Islam described how close he\r\nfelt to Keats. He even feared that his sore throat was a sign of tuberculosis and\r\nhe would succumb to it as Keats did. He was also in love, like Keats, with a\r\nwoman who did not reciprocate his love. However, it was not only in his personal\r\nletters that Nazrul talked about Keats, but also in his essays. It is possible that the\r\ninspiration for “Amar Sundar” (My Beauty) came from Keats’ oft-quoted line.\r\nTh is paper will examine selected letters and essays by Nazrul to show how he\r\nappropriated the youngest English Romantic in his writings                                ', 'Qazi Motahar Hossain, Kazi Nazrul Islam, Keats, letters, essays, “Amar Sundar”', 'commentary papers', '', '', '', '', '1685284086.pdf', '1685284086.pdf', '', '1685284086.pdf', 1, 2, '', '', '2023-05-28 14:28:06', '2023-05-28 14:28:06', '0'),
(82, '1685300264', 4, '', '', 'A Comparative Study between Nazrul’s ‘The Rebel’ (Bidrohi) and Shelley’s ‘Ode to the West Wind’ Voice against Corruption', 'Both Nazrul and Shelley raise their voice against corruption which lies almost in every society and\r\nimpedes the development process by shaking the normal human relationships. Their words unmask the oppressors\r\nand exploiters who create an obvious gap between social classes, human relationships, and social institutions\r\nwhere people thrive for peace and harmony. This paper will analyze the poems ‘The Rebel’(Bidrohi) by\r\nBangladeshi national poet Kazi Nazrul Islam and ‘Ode to the West Wind’ by the English Romantic poet P.B.\r\nShelley to show the deprivation and suffering of the subalterns, and the voice of the poets against the corruption\r\nand anomalies in their respective societies. This will be qualitative research where data will be collected by\r\nanalyzing the texts and the renowned related critiques and articles from different sources. ‘Theory of Subaltern’\r\nby Antonio Gramsci and Gayatri Chakravorty Spivak will be observed in the study to bolster the voices of the\r\npoets. The people in the society who are dominated and deprived by the ruling class for long cannot speak of their\r\nmisery to us. Thus the poets shoulder their responsibilities to carry their voice against injustice and inequalities\r\ntake place in the society through their immortal verses. This study will help us to observe the unseen misery and to\r\nunderstand the unheard suffering of the subordinate class of the society who has been being oppressed by the\r\nruling class for many years.', 'Corruption, Exploiters, Injustice and Inequalities, Ruling Class, Subalterns.', 'original research(short paper)', '', '', '', '', '1685300264.pdf', '1685300264.pdf', '', '1685300264.pdf', 1, 1, '', '', '2023-05-28 18:57:44', '2023-05-28 18:57:44', '0');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_comment`
--

CREATE TABLE `reviewer_comment` (
  `id` int(11) NOT NULL,
  `paper_id` varchar(200) NOT NULL,
  `reviewer_id` varchar(200) NOT NULL,
  `options` varchar(50) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewer_comment`
--

INSERT INTO `reviewer_comment` (`id`, `paper_id`, `reviewer_id`, `options`, `comments`, `count`) VALUES
(33, '1683109720', '12', 'Required Minor Revision', '', 1),
(34, '1683109720', '12', 'Required Major Revision', '', 2),
(35, '1683109849', '12', 'Accept', '', 1),
(36, '1683110322', '12', 'Accept', '', 1),
(37, '1683110188', '12', 'Accept', '', 1),
(38, '1683110435', '12', 'Accept', '', 1),
(39, '1683116473', '12', 'Reject', '', 1),
(40, '1683352135', '12', 'Accept', '', 1),
(41, '1683357414', '12', 'Accept', '', 1),
(42, '1683357567', '12', 'Accept', '', 1),
(43, '1683351965', '12', 'Required Minor Revision', '', 1),
(44, '1683356707', '12', 'Reject', '', 1),
(45, '1683373934', '12', 'Accept', '', 1),
(46, '1683374686', '12', 'Accept', '', 1),
(47, '1683374860', '12', 'Required Major Revision', '', 1),
(48, '1683375433', '12', 'Required Minor Revision', '', 1),
(49, '1685283438', '12', 'Reject', '', 1),
(50, '1683356188', '12', 'Required Minor Revision', '', 1),
(51, '1683378638', '12', 'Accept', '', 1),
(52, '1683354769', '12', 'Accept', '', 1),
(53, '1683354925', '12', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_information`
--

CREATE TABLE `reviewer_information` (
  `id` int(11) NOT NULL,
  `reviewer_name` text NOT NULL,
  `reviewer_designation` varchar(30) NOT NULL,
  `reviewer_university_name` varchar(200) NOT NULL,
  `reviewer_email` varchar(200) NOT NULL,
  `reviewer_contact_no` varchar(11) NOT NULL,
  `reviewer_country` varchar(200) NOT NULL,
  `reviewer_password` varchar(200) NOT NULL,
  `reviewer_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewer_information`
--

INSERT INTO `reviewer_information` (`id`, `reviewer_name`, `reviewer_designation`, `reviewer_university_name`, `reviewer_email`, `reviewer_contact_no`, `reviewer_country`, `reviewer_password`, `reviewer_status`) VALUES
(12, 'Election2', 'Associate Professor', 'BUET', 'jkkniuelection2@gmail.com', '01916078904', 'Austria', '25f9e794323b453885f5181f1b624d0b', '1'),
(13, 'Ameli Reviewer', 'Assistant Professor', 'JNU', 'ameli@gmail.com', '01975456670', 'Azerbaijan', '25f9e794323b453885f5181f1b624d0b', '0'),
(14, 'zayan reviewer', 'Associate Professor', 'Ju', 'zayan@gmail.com', '01856056456', 'Malawi', '25f9e794323b453885f5181f1b624d0b', '0'),
(15, 'Rohan Reviewer', 'Associate Professor', 'EWU', 'rohan@gmail.com', '01686267327', 'Japan', '25f9e794323b453885f5181f1b624d0b', '0'),
(16, 'Chinmoy Sani', 'Lecturer', 'PUST', 'chinmoy@gmail.com', '01694066956', 'Pakistan', '25f9e794323b453885f5181f1b624d0b', '1'),
(17, 'Hailey Reviewer', 'Professor', 'EWU', 'hailey@gmail.com', '01984653322', 'Hong Kong', '25f9e794323b453885f5181f1b624d0b', '0'),
(18, 'Westin Reviewer', 'Associate Professor', 'NU', 'westin@gmail.com', '01934856789', 'Western Sahara', '25f9e794323b453885f5181f1b624d0b', '0'),
(19, 'Sarah Reviewer', 'Lecturer', 'CBST', 'sarah@gmail.com', '01965098756', 'Saudi Arabia', '25f9e794323b453885f5181f1b624d0b', '0'),
(20, 'Arora Reviewer', 'Lecturer', 'AIUB', 'arora@gmail.com', '01795789434', 'Zimbabwe', '25f9e794323b453885f5181f1b624d0b', '0'),
(21, '	Alexander Ars', 'Associate Professor', 'AHMC', 'alex@gmail.com', '01678945678', 'Germany', '25f9e794323b453885f5181f1b624d0b', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associative_editor_information`
--
ALTER TABLE `associative_editor_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_information`
--
ALTER TABLE `author_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_editor_information`
--
ALTER TABLE `main_editor_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_paper`
--
ALTER TABLE `new_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer_comment`
--
ALTER TABLE `reviewer_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer_information`
--
ALTER TABLE `reviewer_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associative_editor_information`
--
ALTER TABLE `associative_editor_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `main_editor_information`
--
ALTER TABLE `main_editor_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_paper`
--
ALTER TABLE `new_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `reviewer_comment`
--
ALTER TABLE `reviewer_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reviewer_information`
--
ALTER TABLE `reviewer_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
