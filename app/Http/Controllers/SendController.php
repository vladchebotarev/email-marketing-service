<?php

namespace App\Http\Controllers;

use App\Mail\MilanoMailCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$when = Carbon\Carbon::now()->addSeconds(20);
        $recipients_test = [
            'vlad.milanodoors@gmail.com',
            'vlad.bmx4@gmail.com',
            'wczebotarew@gmail.com',
            'milanodoorsfinance@gmail.com'
        ];

        $recipients = [
            'info@miltoncemetery.com',
            'jmiller@naelectric.com',
            'nathan.rawding@state.ma.us',
            'jbuffington@taunton-ma.gov',
            'steve@jjcontractor.com',
            'mhinterlong@vertexeng.com',
            'kmacgregor@concordnh.gov',
            'ruth.whitner@whrsd.org',
            'info@leekennedy.com',
            'townmanager@dracut-ma.us',
            'jhustins@tyngsboroughma.gov',
            'jstegman@stegmanassociates.com',
            'ac@framinghamma.gov',
            'jwallace@baycoastbank.com',
            'jhume@mrpc.org',
            'agallien@nhhfa.org',
            'aborton@gilboneco.com',
            'peterlowitt@devensec.com',
            'kateclisham@devensec.com',
            'jeanne.edwards@ferc.gov',
            'bdangelo@vanguardmodular.com',
            'elambiaso@sasaki.com',
            'sgongal@massport.com',
            'gregory.rooney@boston.us',
            'info@gainc.com',
            'kkelleher@cogincorp.com',
            'peterlowitt@devensec.com',
            'snauman@duxbury.k12.ma.us',
            'office@lynnfield-ccc.org',
            'info@pawtuckethma.com',
            'info@pjkeating.com',
            'info@populous.com',
            'info@fmarchitecture.com',
            'ndfdwater@comcast.net',
            'mpakstis@wellesleyma.gov',
            'nmcnealy@norfolkcounty.org',
            'mcullinan@nahant.org',
            'tcoyne@therta.com',
            'dnorris@mail.danvers-ma.org',
            'jhubbard@northhampton-nh.gov',
            'ksweet@townofmaynard.net',
            'info@prmulch.com',
            'hopeyc@merrimack.edu',
            'ahansen@townofcandia.org',
            'alafferty@northreadingma.gov',
            'mznamierowski@essextech.net',
            'bbnhsinvoices@massmail.state.ma.us',
            'lincolnlynch@norton.k12.ma.us',
            'khall@mbta.com',
            'joseph.previte@massmail.state.ma.us',
            'ob@hutterconstruction.com',
            'admin@ceiengineers.com',
            'employment@gcairnsinc.com',
            'security@inner-tite.com',
            'bidding@wright-pierce.com',
            'genereuxd@leicesterma.org',
            'james.kolb@stvinc.com',
            'dkrugman@incontrolri.com',
            'kduggan@massport.com',
            'ssetchell@masselec.com',
            'kdriscoll@pasek.com',
            'mod-bids@worcesterha.org',
            'info@ablecrane.com',
            'ebarry@pasek.com',
            'artjordan@inandoutinc.com',
            'royvinton@vbuiltcustomhomes.com',
            'claudine@jjcardosi.com',
            'anichols@lhma.org',
            'dhtgolf@yahoo.com',
            'jmiranda@sandstoneconstructioninc.com',
            'janwrona@derrynh.org',
            'coneill@ghama.com',
            'aramy@beaconenergy.net',
            'drakehort@gmail.com',
            'rnastasia@nasdidemo.com',
            'jdunham@sovereignbuilders.com',
            'mdnorton@ddesllc.com',
            'cdebba54@aol.com',
            'verrengiawilliamsinc@gmail.com',
            'brice@pelhamweb.com',
            'moriah.gavrish@icloud.com',
            'darek@jddconstruction.com',
            'sbouvier@wenhamma.gov',
            'crystal@bartlettconsolidated.com',
            'jimd@premier-fence.com',
            'bjohnson@pelhamweb.com',
            'matt@einsteinsinc.com',
            'bmyles@minlib.net',
            'mary.gorham@jud.state.ma.us',
            'paul_tanski@vrtx.com',
            'ltucker@qcap.org',
            'jasprinio@parecorp.com',
            'mithani2@gmail.com',
            'dji@context-studios.com',
            'asmith@weldpower.com',
            'jmccarthy@rhwhite.com',
            'michaell@hatchincorporated.com',
            'info@pappasco.com',
            'dgraves@spencerma.gov',
            'joseph.dorsett@environmentalandenergy.com',
            'contact@stellarbt.com',
            'wellesleyhousing@aol.com',
            'ledwards@ambienttemperature.com',
            'david@mancinisheetmetal.com',
            'service@thechimneychap.com',
            'info@glassandmirror.us',
            'kbartels@llbarchitects.com',
            'jpd@radsports.com',
            'bpeacock@bedfordhousing.org',
            'vsmith@neschool.com',
            'ahaexecutive@comcast.net',
            'bids@bostonhousing.org',
            'frank.lenfest@lenfestcontracting.com',
            'lhowland@westboylston-ma.gov',
            'mail@brewsterthornton.com',
            'rleventrv@qreenenvironmental.com',
            'pclary@refocusinc.org',
            'khogan@hdb.com',
            'pastor@ebcmass.org',
            'dswanson@cramandferguson.com',
            'jjimenez@smsenterprises.com',
            'chris.williams@ejprescott.com',
            'norman.acme@gmail.com',
            'dbagget@greenenvirmental.com',
            'sstrobridae@uspavement.com',
            'steveo@doorsys.com',
            'karen.e.glass@state.ma.us',
            'davidbenjamin@yahoo.com',
            'admin@kingstonnh.org',
            'eparker@ssgpools.com',
            'jpedulla@city.waltham.ma.us',
            'grant@cookfpi.com',
            'burneyj@lincolntown.org',
            'watermaintenance@cityofattleboro.us',
            'sjmoriarty44@gmail.com',
            'jti@jtropeano.com',
            'kbergman@littletonma.org',
            'amybrage@atlanticelevatorsouth.com',
            'amyr@weco-group.com',
            'glazaro@fgxi.com',
            'purchasing@cityofboston.gov',
            'jverner@wellesleyma.gov',
            'pjudy@brookstone.com',
            'eugene.j.deutsch@state.ma.us',
            'info@howeleryoon.com',
            'karl@kacconstruction.com',
            'croy@aulson.com',
            'dstack@sumcoeco.com',
            'lisa@wrwc.org',
            'ethan@westmillpreservation.com',
            'wellinowood@msn.com',
            'dudleyha@verizon.net',
            'rwhite@cracksealinginc.com',
            'lcosta@tauntonhousing.com',
            'jgates@knottslandcare.com',
            'gooberr@wseinc.com',
            'anthony.paprocki@perkinswill.com',
            'bethp@bldllc.net',
            'rhaexdir@verizon.net',
            'david.mark@uscg.mil',
            'info@lombardidesign.com',
            'office@roxburyprep.org',
            'justin@carbonfiltrationsystems.com',
            'info@aalanco.com',
            'oe_scanlon@wrsd.net',
            'mproulx@mdrconstruction.com',
            'acullinane@weymouth.ma.us',
            'robert@buildoutconstruction.com',
            'neil@dixonsaloarchitects.com',
            'aaulson@aulson.com',
            'jkissell@ondecksports.com',
            'tina@performancepandh.com',
            'jhlcinc@aol.com',
            'pcamail@prellchil.com',
            'admin@hydratechwater.com',
            'rickter3@aol.com',
            'kevin.leavitt@boston.gov',
            'gmt2025@gmail.com',
            'dstork@pjdionne.com',
            'swhite@cracksealing.com',
            'dketchen@lelwd.com',
            'megcarell@carellgroup.com',
            'bmorgenstem@dectam.com',
            'etlinfo@etlcorp.com',
            'sara-anne.poirier@swarovski.com',
            'rmahoney@quincyha.com',
            'doug.cameron@state.ma.us',
            'manager@town.oxford.ma.us',
            'roger@malcolmconstruction.com',
            'ritewayconst@hotmail.com',
            'mattnswd@comcast.net',
            'tedconstruction@hotmail.com',
            'nancy@starlocllc.com',
            'tlambert@town.rye.nh.us',
            'joelal@comcast.net',
            'mcavilla@townofmarshfield.org',
            'soojianp@leicester.k12.ma.us',
            'info@ondecksports.com',
            'chrisd@safariconstructionllc.com',
            'pdonlan@scit.org',
            'dhorsman@townofmilton.org',
            'michael.milanoski@carverma.org',
            'mike@ddcconstructioninc.com',
            'claylars@gmail.com',
            'denise@leominsterha.com',
            'timothy@superiorsealcoat.com',
            'info@piper-electric.com',
            'abington.housing@comcast.net',
            'ifrontiero@manchestermnha.org',
            'robert@acmdemogroup.com',
            'aepservice@yahoo.com',
            'zaksoulong@yahoo.com',
            'rbouchard@gloucester.k12.ma.us',
            'fenchen90@gmail.com',
            'rweare@glsd.org',
            'nparnell@newtonma.gov',
            'ted.morine@denislmaher.com',
            'adanner@tauntonhousing.com',
            'estimating-services@stateelectriccorp.com',
            'sgt.newhook@comcast.net',
            'rlum@randolph-ma.gov',
            'marcel.valois@commerceri.com',
            'kari@wbna.org',
            'mike@signaturearchitects.com',
            'costelloc@hingham-ma.com',
            'baa@beaconarch.com',
            'akremodels@hotmail.com',
            'manuelawag@gmail.com',
            'peter@waterfire.org',
            'cheidenblad@library.windham.nh.us',
            'jcook@consigli.com',
            'lee.stromberg@jetaviation.com',
            'ryoung@bhplus.com',
            'joseph.w.mahoney.w.civ@mail.mil',
            'michael.a.dion11.civ@mail.mil',
            'rdefusco@cityofhaverhill.com',
            'ecardini@wje.com',
            'info@ameresco.com',
            'jbugbee@franklinma.gov',
            'efigueroa@providenceri.com',
            'casey.gerken@lbpa.com',
            'info.dcam@state.ma.us',
            'tzaslow@luxurybrandholdings.com',
            'dan.sullivan@massbayelectric.com',
            'jim@mattuchioconstruction.com',
            'architects@jffdesign.com',
            'pert.wenton@leightonawhite.com',
            'dave@groundhog.com',
            'jrossi@smrtinc.com',
            'mbarrett@lexingtonma.gov',
            'v.low@dinisco.com',
            'ryan@mcginleykalsow.com',
            'patrick@design-associates.com',
            'wts@westborotennissurfaces.com',
            'jstevens@harringtonsavers.com',
            'alana.swiec@state.ma.us',
            'john@mcnultyconstruction.com',
            'bids@bostonhousing.org',
            'info@guardian-energy.com',
            'solutions@beretrofit.com',
            'peterm@lightec.net',
            'info@pmoorepainting.com',
            'webmaster@aogroup.net',
            'dcronin@townofdighton.com',
            'clnaha@conversent.net',
            'dean.harris@state.ma.us',
            'dzecchini@randolph-ma.gov',
            'info@mcginleykalsow.com',
            'townclerk@townofrowley.org',
            'jdarby@aalanco.com',
            'bmullen@rmullenassociates.com',
            'janwrona@derrynh.org',
            'tim.stevens@scb.com',
            'gpalmisciano@parecorp.com',
            'bpl@activitas.com',
            'toakman@oakmanenterprisesinc.com',
            'idealpropertycorp@verizon.net',
            'adam.gautie@fallriverha.org',
            'info@royalsteamheater.com',
            'hviens@hotmail.com',
            'pat.kozak@watermarkenv.com',
            'cccashman@nhahousing.com',
            'joseph@courtst-architects.com',
            'speraino@bostonpaintco.com',
            'pronan@apcne.com',
            'mforte@forte-llc.com',
            'info@smrtinc.com',
            'jbrennan@jtbarchitects.com',
            'dieremycampbell77@gmail.com',
            'dmotew@lccps.org',
            'driendeau@plymha.org',
            'stevek@dillonblr.com',
            'mikem@pbsboston.com',
            'whrevoli@hotmail.com',
            'casey.fennell@swarovski.com',
            'dsnow@townofnorwell.net',
            'ksheehan@attleboroschools.com',
            'info@pavilionfloors.com',
            'gerryr@russcoinc.com',
            'sales@childscapes.net',
            'dpw@townofbolton.com',
            'operation@lushbeautylounge.net',
            'cheryl.mcgurn@purchasing.ri.gov',
            'marmarasm@scituateri.org',
            'info@fmgenerator.com',
            'mguerrera@masconomet.org',
            'monique@markingsinc.com',
            'info@cbiconsultingllc.com',
            'info@rawnarch.com',
            'jdossantos@cbiconsultinginc.com',
            'info@ajwoodconstruction.net',
            'jdirico@state.ma.us',
            'contact@bautistamasonry.com',
            'svetere@tford.com',
            'hfc3@ymail.com',
            'jpongsa@habeebarch.com',
            'info@burlmass.org',
            'jmcasey@braintreema.gov',
            'twhalen@braintreema.gov',
            'klafferty@cornerstone-serv.com',
            'gavin.s.driscoll@gmail.com',
            'info@loureiro.com',
            'khunt@lelwd.com',
            'cmara@nps-architects.com',
            'info@bphc.org',
            'pguthrie@spencervogt.com',
            'cornerstonebs.info@gmail.com',
            'd.griffiths@forbeshousemuseum.org',
            'rdeloreto@gmail.com',
            'kginnand@dimeo.com',
            'selectmen@southboroughma.com',
            'christialitech430@gmail.com',
            'mayot@hingham-ma.gov',
            'kmiranda@sandstoneconstructioninc.com',
            'mountva@gmail.com',
            'mleitzel@townofbourne.com',
            'info@araujobrosplumbing.com',
            'l_kerman@stoughtonschools.org',
            'skubinski@bergmeyer.com',
            'jbibo@framha.org',
            'ewojcik@edwojcikarchitect.com',
            'mail@kneelandconstruction.com',
            'sandra@lalmasonry.com',
            'info@bostongreencompany.com',
            'maryb@mechanicalaircontrols.com',
            'raffaelecorp@gmail.com',
            'amahan@avcollaborative.org',
            'nharris@masselec.com',
            'bond@bondbrothers.com',
            'info2@nsaarch.com',
            'ray.moore@aggregate-us.com',
            'ktravers@felixamarino.com',
            'pavaoco1892@aol.com',
            'zracine@bojconstruction.com',
            'bschmidtchen@spansystemsinc.com',
            'theo.kindermans@stantec.com',
            'ldecesare@ric.edu',
            'mburke@jumbocapital.com',
            'mkaplan@bkaarchs.com',
            'maisa.nohra@cvshealth.com',
            'allen.leonard@dunkinbrands.com',
            'hallkeen@hallkeen.com',
            'danu@weco-group.com',
            'jboothaia48@gmail.com',
            'amy.shatten@matcheducation.org',
            'esimonson@qualitycontracting.us',
            'nmarcoux@marbleheadha.org',
            'info@pjkeating.com',
            'bids@kingstonmass.org',
            'jr1998@verizon.net',
            'beau@activitas.com',
            'shorowitz@zeroenergy.com',
            'info@crja.com',
            'jmccarthy@rhwhite.com',
            'dlynch@triconstruction.com',
            'procurement@mrta.us',
            'rdance@everettwa.gov',
            'mail@bealsandthomas.com',
            'diacobucci@baypath.net',
            'jlever@rowsearch.com',
            'massimiliano.torchia@th3standard.com',
            'rocurement@swampscott.k12.ma.us',
            'acg@acgllc.comcastbiz.net',
            'eileen.ramcostakes@gmail.com',
            'info@leones-landscaping.com',
            'dan@suburbangmw.com',
            'info@gainc.com',
            'info@classicseal.com',
            'andy.calvanese@state.ma.us',
            'firechief@manchester.ma.us',
            'walter.parker@mansfieldschools.com',
            'myoungk@fishdesignlab.com',
            'maiwest@meridianassoc.com',
            'david.cooper@wspgroup.com',
            'customersupport@nanepashemet.com',
            'bill@kontseptual.com',
            'hollydbj@gmail.com',
            'dibaracontracting@yahoo.com',
            'davidatsalem@comcast.net',
            'iinfo@waynerooing.com',
            'mike@corollaroofing.com',
            'info@warnerlarson.com',
            'whubbell@hubbelldesigngroup.com',
            'jfernandes@plainville.ma.us',
            'adam.davies@state.ma.us',
            'info@dpi-boston.com',
            'chugo@town.auburn.ma.us',
            'dbriggs@ashburnham-ma.gov',
            'info@haynesgroupinc.com',
            'cbizzacco@ebrooke.org',
            'steven@nelcorporation.com',
            'dightonhwy@comcast.net',
            'jdallesander@sumcoeco.com',
            'jspinney@aemechanicalinc.com',
            'frank@mcci-nh.com',
            'edward.donoghue@mansfieldschools.com',
            'nazar@avatarconstructioninc.com',
            'cdefilippo@mm-t.com',
            'info@nationwideconst.com',
            'clancyconstructioncoinc@gmail.com',
            'office@mjsconstructioninc.com',
            'mpmmcc@comcast.net',
            'info@sbra.com',
            'norfolkha@verizon.net',
            'info@ssgpools.com',
            'nitsone@bartlettconsolidated.com',
            'matheson@methuenconstruction.com',
            'jaceti@concordma.gov',
            'dcwelding@verizon.net',
            'kenkaszowski@live.com',
            'davids@capitalcarpetonline.com',
            'drbird.cca@comcast.net',
            'chatziliadis@gmail.com',
            'swood@southboroughma.com',
            'jmckinnell@mm-t.com',
            'mbonnette@qualitycontracting.us',
            'rotherms@suttonschools.net',
            'jmurray@murraybrothersconstruction.com',
            'dmorgado@th.ci.shrewsbury.ma.us',
            'morrell@massremodel.com',
            'wenhamhousing@verizon.net',
            'hrservices@frea.biz',
            'ggould@rmullenassociates.com',
            'blackstoneha@verizon.net',
            'tdogden@comcast.net',
            'insoconnor@cornerstone-serv.com',
            'rburlingame@edwojcikarchitect.com',
            'wepavenico@nicori.com',
            'dmeinke@encorefireprotection.com',
            'ewhite@cracksealinginc.com',
            'fgay@gatra.org',
            'info@russobarr.com',
            'bfitzpatrick@americancapitalenergy.com',
            'info@aalanco.com',
            'ir@federalrealty.com',
            'kabdus@boston.k12.ma.us',
            'minister@firstparishbeverly.org',
            'stefan.hedio@state.ma.us',
            'bids@ci.everett.ma.us',
            'info@dntanks.com',
            'james@sarraengineering.com',
            'davisoncompany@gmail.com',
            'rpineo@rhwhite.com',
            'gouellette@ahsinc.org',
            'inna.lodato@gmail.com',
            'north42v@charter.net',
            'kimhfd@verizon.net',
            'jbitner@rowsearch.com',
            'jnosek@sla-browning.org',
            'rhanson@oconnells.com',
            'jpratt@windhamsd.org',
            'info@riconconstruction.net',
            'wcraig@manchesternh.gov',
            'emily.crutcher@am.jll.com',
            'gpeters@pcsdma.org',
            'kristinflynn@acushnetschools.us',
            'swalker@bergmeyer.com',
            'cledford@westwarwickpublicschools.com',
            'rhaxton@ameresco.com',
            'jsaley@cmacbiz.com',
            'rickysilva@anicetoinc.com',
            'gpagliarini@centralnurseries.com',
            'dcolton@easton.ma.us',
            'rowse@rowsearch.com',
            'kdavignon@vision3architects.com',
            'dhunniford@aegion.com',
            'bmezzetti@beverlyma.gov',
            'jcaprarella@bkaarchs.com',
            'jhons@envirotrac.com',
            'pcote@concordma.gov',
            'cadreani@wlfrench.com',
            'snorris@ultiplayus.com',
            'nerg@nerecgroup.com',
            'andy@stilesco.com',
            'hill@cbtarchitects.com',
            'gcullati@bondbrothers.com',
            'rcsmitharch@verizon.net',
            'office@sargenthouse.org',
            'aflynn@mbta.com',
            'eanderson@brookstone.com',
        ];

        foreach ($recipients as $recipient){
            Mail::to($recipient)
                ->queue(new MilanoMailCampaign());
        }

        /*Mail::to('vlad.bmx4@gmail.com')
            // ->later($when, new MilanoMailCampaign());
            ->queue(new MilanoMailCampaign());*/

        return 'Mail send';
    }
}
