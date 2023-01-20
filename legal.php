<?php
session_start();
define('BASEPATH', true);
$title = 'Do It 4 Vendée - Panier';
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
?>
<section id="legalPage">
    <h2 class="titlePage">
        Politique de confidentitalité
    </h2>
    <div class="buttonContainer">
        <input type="button" value="CGV" class="optionSelected optionButton" id="cgvButton" onclick="switchLegal('cgv');">
        <input type="button" value="Mentions Légales" class="optionButton" id="mlButton" onclick="switchLegal('ml');">
    </div>
    <hr style="margin: 20px 0;">
    <p id="cgvContent">
        Les présentes conditions de vente sont conclues d’une part par la société DO IT 4 VENDEE au capital social de …………………. dont le siège social est situé à Challans, immatriculée au Registre du Commerce et des Sociétés de La Roche-Sur-Yon sous le numéro 909830978. ci-après dénommée "DO IT 4 VENDEE" et gérant le site https://doit4vendee.fr/ et, d’autre part, par toute personne physique ou morale souhaitant procéder à un achat via le site internet https://doit4vendee.fr/ dénommée ci-après " l’acheteur ".<br/><br/>
 
        <span class="boldText">Article 1. Objet</span><br/><br/>
 
        Les présentes conditions de vente visent à définir les relations contractuelles entre DO IT 4 VENDEE et l’acheteur et les conditions applicables à tout achat effectué par le biais du site internet https://doit4vendee.fr/. L’acquisition d’un produit à travers le présent site implique une acceptation sans réserve par l’acheteur des présentes conditions de vente dont l’acheteur reconnaît avoir pris connaissance préalablement à sa commande. Avant toute transaction, l’acheteur déclare d’une part que l’achat de produits sur le site https://doit4vendee.fr/ est sans rapport direct avec son activité professionnelle et est limité à une utilisation strictement personnelle et d’autre part avoir la pleine capacité juridique, lui permettant de s’engager au titre des présentes conditions générales de ventes.<br/><br/>
        La société DO IT 4 VENDEE conserve la possibilité de modifier à tout moment ces conditions de ventes, afin de respecter toute nouvelle réglementation ou dans le but d'améliorer l’utilisation de son site. De ce fait, les conditions applicables seront celles en vigueur à la date de la commande par l’acheteur.<br/><br/>
 
        <span class="boldText">Article 2. Produits</span><br/><br/>
 
        Les produits proposés sont ceux qui figurent sur le site https://doit4vendee.fr/ de la société DO IT 4 VENDEE, dans la limite des stocks disponibles. La société DO IT 4 VENDEE se réserve le droit de modifier à tout moment l’assortiment de produits. Chaque produit est présenté sur le site internet sous forme d’un descriptif reprenant ses principales caractéristiques techniques (contenance, utilisation, composition…). Les photographies sont les plus fidèles possibles mais n’engagent en rien le Vendeur. La vente des produits présentés dans le site https://doit4vendee.fr/ est destinée à tous les acheteurs résidants dans les pays qui autorisent pleinement l’entrée sur leur territoire de ces produits.<br/><br/>
 
        <span class="boldText"> 3. Tarifs</span><br/><br/>
 
        Les prix figurant sur les fiches produits du catalogue internet et sont des prix en Euros (€) toutes taxes comprises (TTC) tenant compte de la TVA applicable au jour de la commande. Tout changement du taux de la TVA pourra être répercuté sur le prix des produits. La société DO IT 4 VENDEE se réserve le droit de modifier ses prix à tout moment, étant toutefois entendu que le prix figurant au catalogue le jour de la commande sera le seul applicable à l’acheteur. Les prix indiqués ne comprennent pas les frais de livraison, facturés en supplément du prix des produits achetés suivant le montant total de la commande. En France métropolitaine, pour toute commande supérieure ou égale à 50 euros TTC, les frais de port sont offerts ; pour toute commande strictement inférieure à 50 euros TTC, un forfait de participation aux frais d’expédition sera facturé à l’acheteur d'un montant de 6 euros TTC.<br/><br/>
 
        <span class="boldText">Article 4. Commande et modalités de paiement<br/><br/></span>
 
        Avant toute commande, l’acheteur doit créer un compte sur le site https://doit4vendee.fr/. La rubrique de création de compte est accessible directement depuis la barre de menu latérale. A chaque visite, l’acheteur, s’il souhaite commander ou consulter son compte (état des commandes, profil…), devra s’identifier à l’aide de ces informations. La société DO IT 4 VENDEE propose à l’acheteur de commander et régler ses produits en plusieurs étapes, avec 3 options de paiement au choix :
        - Paiement par virement bancaire : l’acheteur sélectionne les produits qu’il souhaite commander dans le « panier », modifie si besoin (quantités, références…), vérifie l’adresse de livraison ou en renseigne une nouvelle. Puis, les frais de port sont calculés et soumis à l’acheteur, ainsi que le nom du transporteur. Ensuite, l’acheteur choisit le mode de paiement de son choix : « Paiement par virement ». Enfin, la dernière étape lui propose de vérifier l’ensemble des informations, prendre connaissance et accepter les présentes conditions générales de vente en cochant la case correspondante, puis l’invite à valider sa commande en cliquant sur le bouton « Confirmer ma commande ». Ce dernier clic forme la conclusion définitive du contrat. Dès validation, l’acheteur reçoit un bon de commande confirmant l’enregistrement de sa commande. Afin de finaliser son paiement et déclencher le traitement de sa commande, l’acheteur doit contacter sa banque afin d'effectuer le virement correspondant au montant de sa commande vers le compte bancaire de ......................... (NOM SOCIÉTÉ), dont les coordonnées sont communiquées à l'acheteur. Dès réception du virement, la commande sera traitée et l’acheteur en sera informé par e-mail. La société ......................... (NOM SOCIÉTÉ) expédiera les produits au plus tôt 2 jours ouvrés après réception du virement correspondant à la commande, sous réserve de provisions.<br/><br/>
        - Paiement sécurisé par Paypal ou carte bancaire (via le système PAYPAL) : l’acheteur sélectionne les produits qu’il souhaite commander dans le « panier », modifie si besoin (quantités, références…), vérifie l’adresse de livraison ou en renseigne une nouvelle. Puis, les frais de port sont calculés et soumis à l’acheteur, ainsi que le nom du transporteur. Ensuite, l’acheteur choisit le mode de paiement de son choix : « Paiement par Paypal ». L’étape suivante lui propose de vérifier l’ensemble des informations, prendre connaissance et accepter les présentes conditions générales de vente en cochant la case correspondante, puis l’invite à valider sa commande en cliquant sur le bouton « Confirmer ma commande ». Enfin, l’acheteur est redirigé sur l’interface sécurisée PAYPAL afin de renseigner en toute sécurité ses références de compte Paypal ou de carte bleue personnelle. Si le paiement est accepté, la commande est enregistrée et le contrat définitivement formé. Le paiement par compte Paypal ou par carte bancaire est irrévocable. En cas d’utilisation frauduleuse de celle-ci, l’acheteur pourra exiger l’annulation du paiement par carte, les sommes versées seront alors recréditées ou restituées. La responsabilité du titulaire d’une carte bancaire n’est pas engagée si le paiement contesté a été prouvé effectué frauduleusement, à distance, sans utilisation physique de sa carte. Pour obtenir le remboursement du débit frauduleux et des éventuels frais bancaires que l’opération a pu engendrer, le porteur de la carte doit contester, par écrit, le prélèvement auprès de sa banque, dans les 70 jours suivant l’opération, voire 120 jours si le contrat le liant à celle-ci le prévoit. Les montants prélevés sont remboursés par la banque dans un délai maximum d’un mois après réception de la contestation écrite formée par le porteur. Aucun frais de restitution des sommes ne pourra être mis à la charge du titulaire.<br/><br/>
        La confirmation d’une commande entraîne acceptation des présentes conditions de vente, la reconnaissance d’en avoir parfaite connaissance et la renonciation à se prévaloir de ses propres conditions d’achat. L’ensemble des données fournies et la confirmation enregistrée vaudront preuve de la transaction. Si l’acheteur possède une adresse électronique et s’il l’a renseignée sur son bon de commande, la société ......................... (NOM SOCIÉTÉ) lui communiquera par courrier électronique la confirmation de l’enregistrement de sa commande.<br/><br/>
        Si l’acheteur souhaite contacter la société ......................... (NOM SOCIÉTÉ), il peut le faire soit par courrier à l’adresse suivante : ......................... (NOM SOCIÉTÉ, adresse) ; soit par email à l’adresse suivante : ………………………………, soit par téléphone au ………………………….<br/><br/>
 
        <span class="boldText">Article 5. Réserve de propriété<br/><br/></span>
 
        La société DO IT 4 VENDEE conserve la propriété pleine et entière des produits vendus jusqu'au parfait encaissement du prix, en principal, frais et taxes compris.<br/><br/>
 
        <span class="boldText">Article 6. Rétractation<br/><br/></span>
 
        En vertu de l’article L121-20 du Code de la consommation, l’acheteur dispose d'un délai de quatorze jours ouvrables à compter de la livraison de leur commande pour exercer son droit de rétractation et ainsi faire retour du produit au vendeur pour échange ou remboursement sans pénalité, à l’exception des frais de retour.<br/><br/>
 
        <span class="boldText">Article 7. Livraison<br/><br/></span>
 
        Les livraisons sont faites à l’adresse indiquée sur le bon de commande qui ne peut être que dans la zone géographique convenue. Les commandes sont effectuées par La Poste via COLISSIMO, service de livraison avec suivi, remise sans signature. Les délais de livraison ne sont donnés qu’à titre indicatif ; si ceux-ci dépassent trente jours à compter de la commande, le contrat de vente pourra être résilié et l’acheteur remboursé. La société ......................... (NOM SOCIÉTÉ) pourra fournir par e-mail à l’acheteur le numéro de suivi de son colis. L’acheteur est livré à son domicile par son facteur. En cas d’absence de l’acheteur, il recevra un avis de passage de son facteur, ce qui lui permet de retirer les produits commandés au bureau de Poste le plus proche, pendant un délai indiqué par les services postaux. Les risques liés au transport sont à la charge de l'acquéreur à compter du moment où les articles quittent les locaux de la société ......................... (NOM SOCIÉTÉ). L’acheteur est tenu de vérifier en présence du préposé de La Poste ou du livreur, l’état de l’emballage de la marchandise et son contenu à la livraison. En cas de dommage pendant le transport, toute protestation doit être effectuée auprès du transporteur dans un délai de trois jours à compter de la livraison.<br/><br/>
 
        <span class="boldText">Article 8. Garantie<br/><br/></span>
 
        Tous les produits fournis par la société DO IT 4 VENDEE bénéficient de la garantie légale prévue par les articles 1641 et suivants du Code civil. En cas de non conformité d’un produit vendu, il pourra être retourné à la société DO IT 4 VENDEE qui le reprendra ou l’échangera. Toutes les réclamations, demandes d’échange doivent s’effectuer par voie postale à l’adresse suivante : 53 rue de la rive 85300 Challans, dans un délai de trente jours après livraison.<br/><br/>
 
        <span class="boldText">Article 9. Responsabilité<br/><br/></span>
 
        La société DO IT 4 VENDEE, dans le processus de vente à distance, n’est tenue que par une obligation de moyens. Sa responsabilité ne pourra être engagée pour un dommage résultant de l’utilisation du réseau Internet tel que perte de données, intrusion, virus, rupture du service, ou autres problèmes involontaires.<br/><br/>
        <span class="boldText">Article 10. Propriété intellectuelle<br/><br/></span>
        Tous les éléments du site https://doit4vendee.fr/ sont et restent la propriété intellectuelle et exclusive de la société DO IT 4 VENDEE. Personne n’est autorisé à reproduire, exploiter, ou utiliser à quelque titre que ce soit, même partiellement, des éléments du site qu’ils soient sous forme de photo, logo, visuel ou texte.<br/><br/>
 
        <span class="boldText">Article 11. Données à caractère personnel<br/><br/></span>
 
        La société DO IT 4 VENDEE s'engage à préserver la confidentialité des informations fournies par l’acheteur, qu'il serait amené à transmettre pour l'utilisation de certains services. Toute information le concernant est soumise aux dispositions de la loi n° 78-17 du 6 janvier 1978. A ce titre, l'internaute dispose d'un droit d'accès, de modification et de suppression des informations le concernant. Il peut en faire la demande à tout moment par courrier à l’adresse suivante : 53 rue de la rive 85300 Challans.<br/><br/>
 
        <span class="boldText">Article 12. Règlement des litiges<br/><br/></span>
 
        Les présentes conditions de vente à distance sont soumises à la loi française. Pour tous litiges ou contentieux, le Tribunal compétent sera celui des Sables d'olonne<br/><br/>
    </p>
    <p id="mlContent" class="hiddenElement">
        Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses pages. En vous connectant sur ce site, vous acceptez, sans réserves, les présentes modalités.<br/>
 
        Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie numérique, les responsables du présent site internet https://doit4vendee.fr sont :<br/><br/>
 
        <span class="boldText">Éditeur du Site :</span><br/><br/>
 
        Entrepreneur individuel DO IT 4 VENDEE <br/>
        
        Numéro de SIRET : 90983097800013<br/>
 
        Responsable éditorial : DO IT 4 VENDEE<br/>
 
        53 rue de la rive, 85300 Challans<br/>
 
        Téléphone : 07 86 54 66 02<br/>
 
        Email : contact@doit4vendee.fr<br/>
 
        Site Web : https://doit4vendee.fr/<br/><br/>
 
        <span class="boldText">Hébergement :</span><br/><br/>
 
        Hébergeur : OVH SAS<br/>
        2 rue Kellermann, 59100 Roubaix<br/>
        Site Web : https://www.ovh.com<br/><br/>
 
        <span class="boldText">Développement :</span><br/><br/>
 
        Léo Nourrisson<br/>
 
        Adresse : 6 lieu dit la Boulaie, 79140 Cirières<br/>
 
        Site Web : https://leonrs.fr</span><br/><br/>
 
        <span class="boldText">Conditions d’utilisation :</span><br/><br/>
 
        Ce site (https://doit4vendee.fr) est proposé en différents langages web (HTML, HTML5, Javascript, CSS, etc…) pour un meilleur confort d’utilisation et un graphisme plus agréable.<br/>
 
        Nous vous recommandons de recourir à des navigateurs modernes comme Internet explorer, Safari, Firefox, Google Chrome, etc…<br/>
 
        Notre développeur met en œuvre tous les moyens dont il dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet.<br/>
 
        Toutefois, des erreurs ou omissions peuvent survenir. L’internaute devra donc s’assurer de l’exactitude des informations auprès de DO IT 4 VENDEE, et signaler toutes modifications du site qu’il jugerait utile. Do It 4 Vendée n’est en aucun cas responsable de l’utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.<br/>
 
        Cookies : Le site https://doit4vendee.fr peut-être amené à vous demander l’acceptation des cookies pour des besoins de statistiques et d’affichage. Un cookie est une information déposée sur votre disque dur par le serveur du site que vous visitez.<br/>
 
        Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel un serveur accède pour lire et enregistrer des informations . Certaines parties de ce site ne peuvent être fonctionnelles sans l’acceptation de cookies.<br/>
 
        Liens hypertextes : Les sites internet de peuvent offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet. DO IT 4 VENDEE ne dispose d’aucun moyen pour contrôler les sites en connexion avec ses sites internet.<br/>
 
        DO IT 4 VENDEE ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l’internaute, qui doit se conformer à leurs conditions d’utilisation.<br/>
 
        Les utilisateurs, les abonnés et les visiteurs des sites internet  ne peuvent pas mettre en place un hyperlien en direction de ce site sans l’autorisation expresse et préalable de SARL Do It 4 Vendée.<br/>
 
        Dans l’hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d’un des sites internet de DO IT 4 VENDEE, il lui appartiendra d’adresser un email accessible sur le site afin de formuler sa demande de mise en place d’un hyperlien.<br/>
 
        DO IT 4 VENDEE se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en justifier sa décision.<br/><br/>
 
        <span class="boldText">Services fournis :</span><br/><br/>
 
        L’ensemble des activités de la société ainsi que ses informations sont présentés sur notre site https://doit4vendee.fr.<br/>
 
        DO IT 4 VENDEE s’efforce de fournir sur le site https://doit4vendee.fr des informations aussi précises que possible. Les renseignements figurant sur le site https://doit4vendee.fr ne sont pas exhaustifs et les photos non contractuelles.<br/>
 
        Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. Par ailleurs, tous les informations indiquées sur le site https://doit4vendee.fr sont données à titre indicatif, et sont susceptibles de changer ou d’évoluer sans préavis.<br/><br/>
 
        <span class="boldText">Limitation contractuelles sur les données :</span><br/><br/>
 
        Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour à différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des omissions.<br/>
 
        Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par courriel, à l’adresse contact@doit4vendee.fr, en décrivant le problème de la manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur utilisé, …).<br/>
 
        Tout contenu téléchargé se fait aux risques et périls de l’utilisateur et sous sa seule responsabilité. En conséquence, ne saurait être tenu responsable d’un quelconque dommage subi par l’ordinateur de l’utilisateur ou d’une quelconque perte de données consécutives au téléchargement.<br/>
 
        De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour.<br/>
 
        Les liens hypertextes mis en place dans le cadre du présent site internet en direction d’autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de DO IT 4 VENDEE.<br/><br/>
 
        <span class="boldText">Propriété intellectuelle :</span><br/><br/>
 
        Tout le contenu du présent site https://doit4vendee.fr, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société à l’exception des marques, logos ou contenus appartenant à d’autres sociétés partenaires ou auteurs.<br/>
 
        Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l’accord exprès par écrit de DO IT 4 VENDEE. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.<br/><br/>
 
        <span class="boldText">Déclaration à la CNIL :</span><br/><br/>
 
        Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l’égard des traitements de données à caractère personnel) relative à l’informatique, aux fichiers et aux libertés, ce site a fait l’objet d’une déclaration 1656629 auprès de la Commission nationale de l’informatique et des libertés (www.cnil.fr).<br/><br/>
 
        <span class="boldText">Litiges :</span><br/><br/>
 
        Les présentes conditions du site https://doit4vendee.fr sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l’interprétation ou de l’exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société. La langue de référence, pour le règlement de contentieux éventuels, est le français.<br/><br/>
 
        <span class="boldText">Données personnelles :</span><br/><br/>
 
        De manière générale, vous n’êtes pas tenu de nous communiquer vos données personnelles lorsque vous visitez notre site Internet https://doit4vendee.fr.<br/>
 
        Cependant, ce principe comporte certaines exceptions. En effet, pour certains services proposés par notre site, vous pouvez être amenés à nous communiquer certaines données telles que : votre nom, votre prénom, votre adresse électronique, votre adresse postale et votre numéro de téléphone. Tel est le cas lorsque vous remplissez le formulaire qui vous est proposé en ligne, dans la rubrique « contact ».<br/>
 
        Dans tous les cas, vous pouvez refuser de fournir vos données personnelles. Dans ce cas, vous ne pourrez pas utiliser les services du site, notamment celui de solliciter des renseignements sur notre société, ou de recevoir les lettres d’information.<br/>
 
        Enfin, nous pouvons collecter de manière automatique certaines informations vous concernant lors d’une simple navigation sur notre site internet, notamment : des informations concernant l’utilisation de notre site, comme les zones que vous visitez et les services auxquels vous accédez, votre adresse IP, le type de votre navigateur, vos temps d’accès.<br/>
 
        De telles informations sont utilisées exclusivement à des fins de statistiques internes, de manière à améliorer la qualité des services qui vous sont proposés. Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.<br/>
    </p>
</section>
 
<?php require('assets/template/footer.php'); ?>