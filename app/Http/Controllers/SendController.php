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
            'kasfcgalckaifuwlkalyfffs@gmail.com'
        ];

        $recipients = [
            'cmiller@iconvenue.com',
            'jeff@mlagreen.com',
            'mwilliams@hksinc.com',
            'jauld@altoonpartners.com',
            'fred@woodcliff.net',
            'info@altaenviron.com',
            'javilez@lawa.org',
            'rsalguero@tcco.com',
            'tim.sarre@tutorperini.com',
            'stewartk@metro.net',
            'dboubour@southlandind.com',
            'pjpaia@pitassiarchitects.com',
            'laguilar@aegworldwide.com',
            'bbush@diversifiedpacific.com',
            'lintonm@vmcmail.com',
            'jburesh@shimmick.com',
            'john@finegradeinc.com',
            'mmorgner@morgnerco.com',
            'jquevedo@dpw.lacounty.gov',
            'dstudhalter@arbinc.com',
            'dboughner@pankow.com',
            'kpabbott@abbottce.com',
            'contactca@tortigallas.com',
            'info@morgnerco.com',
            'lfranco@owengroup.com',
            'taylordarby@cometelectric.com',
            'estimating@amgassociatesinc.com',
            'fgehry@gt-global.com',
            'rhashem@octa.net',
            'office_la@i-mad.com',
            'john.saliba@idsgi.com',
            'dsmith@johnsonfain.com',
            'smiller@ahbe.com',
            'contactus@helixelectric.com',
            'amillar@henselphelps.com',
            'info@dgc-us.com',
            'jknudsen@coarchitects.com',
            'scott.lacy@sce.com',
            'sna@toboco.net',
            'csalcedo@sjamoroso.com',
            'skoch@mtglinc.com',
            'jlitzenger@hntb.com',
            'kirk_funkhouser@gensler.com',
            'dpoei@rchstudios.com',
            'esilvera@morleybuilders.com',
            'zelmerc@metro.net',
            'info@solar-reserve.com',
            'dan.herman@som.com',
            'al@colemancon.com',
            'farrell@rmpla.com',
            'mrettig@kempbros.com',
            'vsedagat@geoadvantec.com',
            'kbradley@southlandinc.com',
            'kevin_ramirez@rsconst.com',
            'pmorenol@dragados-usa.com',
            'silvia.avendano@idsgi.com',
            'olivier_sommerhalder@gensler.com',
            'tconverse@selbertperkins.com',
            'bids@carasmussen.com',
            'cody@hansonla.com',
            'noel.sbcc@yahoo.com',
            'bpensick@ferreiraconstruction.com',
            'sborland@tcco.com',
            'mkim@mve-architects.com',
            'jerricor@morilloconstruction.com',
            'estimating@baliconstruction.com',
            'estimating@sully-miller.com',
            'estimatingoc@swinerton.com',
            'marketing@mtglinc.com',
            'ysoneja@simplex-cm.com',
            'pleskow@pleskowarchitects.com',
            'chuss@ohlusa.com',
            'tbrull@klorman.com',
            'nadra.chamaa@aescotech.com',
            'esoneja@simplex-em.com',
            'vancleve@rvca.org',
            'jesse.urquidi@p2seng.com',
            'armand@asgci.com',
            'rfp@altaenviron.com',
            'deltorol@vmcmail.com',
            'sharon.limburg@aecom.com',
            'bob.cram@bayley.net',
            'lori.olivas@jfshea.com',
            'inquiry@cleanfuelconnection.com',
            'jeremy@umcontractors.com',
            'info@ffstech.com',
            'jboren@meisarchitects.com',
            'don.archer@pgminc.com',
            'info@murraycompany.com',
            'houston.hoole@siemens.com',
            'jnabili@gkkworks.com',
            'hr@ftcgc.com',
            'info@leeandrewsgroup.com',
            'jdmadrid@mccarthy.com',
            'dough@webcor.com',
            'jim_young@gensler.com',
            'ggraney@ktgy.com',
            'info@austin-ind.com',
            'ryani@webcor.com',
            'nb@mccarthy.com',
            'peter@citymarketla.com',
            'matthew.dierdorf@som.com',
            'la-info@rtkl.com',
            'ali@gilmanbuilders.com',
            'nguerrero@radoscompanies.com',
            'gmetzger@adamson-associates.com',
            'jake@pubconstruction.com',
            'info@kthomeinc.com',
            'cmathes@dragados-usa.com',
            'peter.johnson@hollico.net',
            'david@newvisionconstruction.ne',
            'jerryb@totorsaliba.com',
            'cbolton@helixelectric.com',
            'estimating@sukut.com',
            'info@shimmick.com',
            'mark@murphy.ac',
            'bidding@usscalbuilders.com',
            'kap_malik@gensler.com',
            'vic_froglia@gensler.com',
            'info@lifescapesintl.com',
            'estimating@baliconstruction.com',
            'nkiriro@westfield.com',
            'toddl@whainc.com',
            'mmclarand@mve-architects.com',
            'duncan_patterson@gensler.com',
            'gary.allen@build-laccd.org',
            'spo@radoscompanies.com',
            'cwong@robprop.com',
            'dewittr@metro.net',
            'info@aecom.com',
            'jscheidel@cuningham.com',
            'laplante@pcl.com',
            'jesse@usscalbuilders.com',
            'eric@abcdrilling.com',
            'tclay@shimmick.com',
            'blevin@levinarch.com',
            'jdunn@rchstudios.com',
            'min.je@exbon.com',
            'info@artukovich.com',
            'msang@ktgy.com',
            'colin@rchstudios.com',
            'estimating@mztco.com',
            'publicinfo@lacma.org',
            'estimating1@pavementrecycling.com',
            'ninacio@sjamoroso.com',
            'rwolf@vtbs.com',
            'mmotonaga@rchstudios.com',
            'avivah.rapoport@perkinswill.com',
            'swen@pcl.com',
            'doug@pacificwaterproofing.com',
            'bnishita@vtbs.com',
            'jeremiah@johnsmeek.com',
            'tpham@hardyandharper.com',
            'ryan@2hconstruction.com',
            'ncherry@rtkl.com',
            'young_lee@gensler.com',
            'bsevy@ktgy.com',
            'todd.spitzer@ocgov.com',
            'barbara.queen@calstatela.edu',
            'joey@shimodadesign.com',
            'jenniferlewis@amesco.com',
            'jfinn@weoneil.com',
            'tmcnamara@us.gititire.com',
            'info@contourentertainment.com',
            'rdauth@westport-inc.com',
            'ssarkauskas@kempbros.com',
            'info@henselphelps.com',
            'dgetman@gmparchitects-la.com',
            'jlincourt@ghpalmer.com',
            'rhensley@wlcarchitects.com',
            'rthomas@csudh.edu',
            'paul.coleman@acmartin.com',
            'john.esudero@brightview.com',
            'scott@buntich.com',
            'anne.takii@longbeach.gov',
            'jpasco@frontierkemper.com',
            'cimatani@arquitectonica.com',
            'wagner@gruenassociates.com',
            'hliddle@colich.com',
            'socal.estimating@atkn.com',
            'glindsey@lawa.org',
            'tim.connors@sabalfin.com',
            'michael@tca-arch.com',
            'rgiebels@vccusa.com',
            'jed.zimmerman@som.com',
            'emily.sullivan@clarkconstruction.com',
            'edgars@ldadesigngroup.com',
            'awuo@rmpla.com',
            'office@fuksas.com',
            'kswingle@altasea.org',
            'sam.yu@stvinc.com',
            'jgrable@corrpro.com',
            'mrich@grantarch.com',
            'ken.rosenthal@csun.edu',
            'chuck@pinnerconstruction.com',
            'estimating@amgassociatesinc.com',
            'craigroth@amesco.com',
            'gvillegas@watg.com',
            'estimating@baliconstruction.com',
            'mahmood.karimzadeh@lacity.org',
            'aaron@laeng.net',
            'lemurray@cnusd.k12.ca.us',
            'tracey.i.daggy@usace.army.mil',
            'mshawver@swinerton.com',
            'estimator@marinaco.com',
            'charles.smith@hok.com',
            'wnord@nordarchitects.com',
            'masseyd@hdcco.com',
            'info@hopscape.com',
            'roberto@omgivning.com',
            'gmf.bosco@gmail.com',
            'bidding@usscalbuilders.com',
            'ksoudani@tca-arch.com',
            'estimating@reyesconstruction.com',
            'dwanderling@shimmick.com',
            'jdelacal@coarchitects.com',
            'thsieh@tsmrinc.com',
            'estimating@leedelectric.com',
            'slichter@irg.cc',
            'dana.privitt@kimley-horn.com',
            'royalclarkdevco@aol.com',
            'dyonkin@nadelarc.com',
            'dan.gehman@humphreys.com',
            'achacon@melendrez.com',
            'justin@pinnerconstruction.com',
            'socalestimating@kiewit.com',
            'info@shimmick.com',
            'justind@pinnerconstruction.com',
            'cboucly@octa.net',
            'donz@westbasin.org',
            'pasqual.gutierrez@hmcarchitects.com',
            'johns@angelescontractor.com',
            'bppatel@hedev.com',
            'kmccloskey@ktgy.com',
            'dschool@mve-architects.com',
            'rmorton@mccarthy.com',
            'ssam@smmusd.org',
            'lmartinez@capnet.ucla.edu',
            'damacinc.millwork@gmail.com',
            'estimating@excelpaving.net',
            'mstinnett@baifourbeaityus.com',
            'robb@architectsorange.com',
            'teresa@hparchs.com',
            'rschotter@sjamoroso.com',
            'info@martinezdzn.com',
            'prhee@s-ehrlich.com',
            'ammiller@tcco.com',
            'msanchez@ocsd.com',
            'isegovia@morgnerco.com',
            'jenniferdeiongh@rjnoblecompany.com',
            'lpiper@calstate.edu',
            'snavarro@warasic.com',
            'alampkin@ortizent.com',
            'yvette@ljcmasonry.com',
            'eastimating@sukut.com',
            'pkinsley@mccarthy.com',
            'officeserviceslax@nbbj.com',
            'paul.morgan@hok.com',
            'bbevans@cpp.edu',
            'jeremy@umcontractors.com',
            'bids@bubalo.com',
            'erik.christopherson@shotcrete.com',
            'ahbe@ahbe.com',
            'smiller@theolinstudio.com',
            'darrell.torres@clarkconstruction.com',
            'cyril.charles@lacity.org',
            'sarah_edmonds@genlser.com',
            'rlangevin@pcl.com',
            'jessica@accesspacificinc.com',
            'joneill@masselec.com',
            'estimating@bestcontracting.com',
            'jnicely@frontierkemper.com',
            'apexfireinc@yahoo.com',
            'estimating@sully-miller.com',
            'charlene_dekker@gensler.com',
            'lynagafu@uci.edu',
            'afordyce@tsmrinc.com',
            'mgzabat@pcl.com',
            'jcriess@sundt.com',
            'guy@ecgcorp.net',
            'bidinfo@bloisconstruction.com',
            'david.takacs@takacsarchitecture.com',
            'jeff@silveradocontractors.com',
            'van@cpengineeringinc.com',
            'jhaim@lblarch.com',
            'alex@kfalosangeles.com',
            'wendell.l.mendoza@usace.army.mil',
            'info@theolinstudio.com',
            'rsoewers@rtkl.com',
            'sharrison@helixelectric.com',
            'alan@hparchs.com',
            'barry@segalrea.com',
            'rsutties@clcoatings.us',
            'kkaiser@sukut.com',
            'hamid.behdad@ccdg-la.cc',
            'richard@cslegacy.net',
            'bctraffic1@gmail.com',
            'johnm@mandsinc.com',
            'pmaloney@circle-industrial.com',
            'rveremian@murravcomoanv.com',
            'miya@lnisigns.com',
            'kdavis@fulcrumconstruction.com',
            'publicworks@allamericanasphalt.com',
            'naldana@pankow.com',
            'margo.gawelko@atkn.com',
            'alabov@coarchitects.com',
            'rhawkes@laytonconstruction.com',
            'ami@idrdemo.com',
            'jwong@elecnor.com',
            'jnelson@laeng.net',
            'simon@nemaninvestments.com',
            'agehring@dlrgroup.com',
            'rarevalo@webcor.com',
            'william.palnet@tutorperini.com',
            'eric@usscalbuilders.com',
            'rgunter@hksinc.com',
            'louis.liu@jushiusa.com',
            'info@regentproperties.com',
            'ed.brown@shotcrete.com',
            'gfong@gfaarchitects.com',
            'joseph@laeng.net',
            'bidinvite@sinanian.com',
            'michael.dunn@amarinecorp.com',
            'shelly@metrobuilders.com',
            'diane.torres@ladwp.com',
            'publicworks@allamericanasphalt.com',
            'pbongiovanni@suffolk.com',
            'ccho@kfarchitects.com',
            'cvalentine@mednet.ucla.edu',
            'lpa@lpainc.com',
            'dleyva@swinerton.com',
            'nfreeman@paragon-partners.com',
            'mhughes@idsrealestate.com',
            'rick.broadrick@nicholsonconstruction.com',
            'info@sukut.com',
            'amuller@dragados-usa.com',
            'jcabal@tsmrinc.com',
            'bhuber@gdiving.com',
            'sergio@japlacek.com',
            'patrick@cwrosser.com',
            'lyan@grantarch.com',
            'krystal@gggdemo.com',
            'droberson@wng.com',
            'gbroussard@amgland.com',
            'ehildebrand@bastienarchitects.com',
            'jmarchbank@mail.cccd.edu',
            'bbustamante@socalcon.com',
            'ryan.e.rivas@usace.army.mil',
            'jmaranowicz@walshgroup.com',
            'kfriedri@nhm.org',
            'jgrable@corrpro.com',
            'michael@urbanarena.com',
            'afarthing@helixelectric.com',
            'peter_barsuk@gensler.com',
            'dgao@nardi-associates.com',
            'general@allamericanasphalt.com',
            'estimating@socalgrading.com',
            'sales@stolocabinets.com',
            'rlorkovic@swinerton.com',
            'deanb@oltmans.com',
            'sbaker@melendrez.com',
            'amir.a@mincoconstruction.com',
            'dcollins@traylor.com',
            'achilds@mve-architects.com',
            'emarquez@woodleyarch.com',
            'darin.marsella@umodularc.com',
            'estimating@ortizent.com',
            'jhart@lpainc.com',
            'evasquez@sva-architects.com',
            'greg@bg-architecture.com',
            'werner.wolf@build-laccd.org',
            'clint.lane@kiewit.com',
            'sarafin@architectsorange.com',
            'ruben@acccontractors.com',
            'jeffc@whainc.com',
            'david.yancosky@p2scx.com',
            'earle.newman@conpaco.com',
            'figo@regentproperties.com',
            'smyers@pinnerconstruction.com',
            'diego@lifescapesintl.com',
            'jfink@centercal.com',
            'idg3@earthlink.net',
            'pcosta@tcco.com',
            'tarrah@kfalosangeles.com',
            'john_wiedner@gensler.com',
            'adam_gumowski@gensler.com',
            'lindsay.lawson@clarkconstruction.com',
            'losangeles@hok.com',
            'lalaine@icon-west.com',
            'sfriar@henselphelps.com',
            'mhong@mhongarchitects.com',
            'jphillips@bigskyelectric.com',
            'greg.otey@aecom.com',
            'estimating@reyesconstruction.com',
            'dgrattan@sukut.com',
            'tonymendez@amesco.com',
            'estimating-water@jfshea.com',
            'donna.smith@lee-ro.com',
            'agallagher@pankow.com',
            'jreyes@teamfwa.com',
            'louis.tsai@ladwp.com',
            'rmcrae@icsinc.tv',
            'dmarks@ieeci.com',
            'josh@alexanderconstruction.com',
            'william.wang@multiwsystems.com',
            'michael.g.robinson@usace.army.mil',
            'chris@rga-architects.com',
            'jgeer@laeng.net',
            'lagroup@pacbell.net',
            'info@tbccontractor.com',
            'info@pacificstarcapital.com',
            'estimating@nsaoffice.com',
            'spo@radoscompanies.com',
            'estimating@tlcinc-ca.com',
            'molly.huddleston@clarkconstruction.com',
            'aludwig@pascalludwig.com',
            'cwhitehead@mztco.com',
            'bids@ebsgeneral.com',
            'socal.estimating@atkn.com',
            'mburke@sei.us.com',
            'angelog@metro.net',
            'info@johnsonfain.com',
            'farnaz@fordecinc.com',
            'kmccarty@snyderlangston.com',
            'ridwan@icon-west.com',
            'jmcritchie@mccarthy.com',
            'ssmith@farwestcorrosion.com',
            'kstockton@stocktonarchitects.com',
            'yong@hparchs.com',
            'estimating@sully-miller.com',
            'rkeating@keatingkhang.com',
            'roy.valadez@jfshea.com',
            'dthelen@witheemalcolm.com',
            'abesler@pcl.com',
            'builders@phhagopian.com',
            'killefer@kfarchitects.com',
            'jeffgeist@amesco.com',
            'scottd@srdengineering.com',
            'andrew.nelson@atkn.com',
            'fpasker@tca-arch.com',
            'lucia.a.carvajal@usace.army.mil',
            'bijan@bijan.la',
            'bids@bubalo.com',
            'scarroll@eptdesign.com',
            'sharonf@colich.com',
            'mike_harrison@cjuhsd.k12.ca.us',
            'cgarner@ensemble.net',
            'bidinfo@bloisconstruction.com',
            'ksmith@landsea.us',
            'ewohlers@amcalhousing.com',
            'tom@charles-company.com',
            'wrasic@warasic.com',
            'theidenrich@newmanmidland.com',
            'apaddock@centercal.com',
            'jryhal@railworks.com',
            'larasass@gmail.com',
            'jharnold@krarchitects.com',
            'vince@humphreys.com',
            'ehalm@bernards.com',
            'kfitzger@capnet.ucla.edu',
            'luramire@dpw.lacounty.gov',
            'bids@securitypaving.com',
            'shogan@pinnerconstruction.com',
            'lsun@tk1sc.com',
            'eric@roadwayengineering.com',
            'wcao@leesak.com',
            'gpalaski@nadelarc.com',
            'jeff.munson@pcg.com',
            'mike_harrison@cjuhsd.net',
            'marissa_lidyoff@rsconst.com',
            'danielj@cpp.edu',
            'luisr@angelescontractor.com',
            'jlutz@bernards.com',
            'publicworks@allamericanasphalt.com',
            'cpak@archeongroup.com',
            'ben.bytheway@goodman.com',
            'mail@harridgedevelopment.com',
            'adam.chamaa@aescotech.com',
            'donbarnett@lennar.com',
            'carlos@mckennagc.com',
            'ssmith@farwestcorrosion.com',
            'dcordova@environcon.com',
            'danp@dancorllc.com',
            'awright@nationalcore.org',
            'info@americanintegrated.com',
            'parrish.scarboro@coronaregional.com',
            'info@faradayfuture.com',
            'fmilani@mve-architects.com',
            'sbehl@bernards.com',
            'ccosta@centrebuilders.com',
            'raoul.amescua@kwcommercial.com',
            'rick.brown@sabalfin.com',
            'info@camphorpartners.com',
            'info@archeongroup.com',
            'bhobza@dlrgroup.com',
            'slopez@hksinc.com',
            'bidding@usscalbuilders.com',
            'lance.leonard@deacon.com',
            'nbanvard@vtbs.com',
            'smootz@sjamoroso.com',
            'sargueta@perse-co.com',
            'info@monetinc.net',
            'contact@nuvis.net',
            'john.gormley@csuci.edu',
            'floyd.almoite@transdev.com',
            'crowe@radoscompanies.com',
            'info@foga.com',
            'clara@stemdahl.com',
            'todd@c-cdev.com',
            'rc@architectsorange.com',
            'jlevin@pfeifferpartners.com',
            'cmartinez@pavementrecycling.com',
            'pavingcontractor@aol.com',
            'melanie_mcartor@gensler.com',
            'cfore@ecapplications.com',
            'irodrigues@corrpro.com',
            'nh@loharchitects.com',
            'cynthia@ueiteam.com',
            'jeriksen@mail.cccd',
            'giles.ganey@deacon.com',
            'lalo@webcor.com',
            'sbudhia@anaheim.net',
            'mromero@tcco.com',
            'mmaltzan@mmaltzan.com',
            'vmartinez@hntb.com',
            'info@lollicup.com',
            'robertkeeler@lw-oc.com',
            'rwe@nexusd.com',
            'kvonspaeth@hntb.com',
            'bidmail@nationaldemolition.com',
            'peggy@pubconstruction.com',
            'dly@dpw.lacounty.gov',
            'mike.stolkin@jfshea.com',
            'kinan@horizonscci.com',
            'girwin@ipaoc.com',
            'park@hparchs.com',
            'conner@novusconstruction.com',
            'ccall@wnc.com',
            'meganl@sandersconstruction.com',
            'estimating@excelpaving.net',
            'madal@metierarch.com',
            'arniel@telenetvoip.com',
            'jkonda@coarchitects.com',
            'bbisno@s-ehrlich.com',
            'kristina.singiser@hmcarchitects.com',
            'ronald.wheelen@tutorperini.com',
            'otilio@2hconstruction.com',
            'samr@construct1.com',
            'ocsd_inc@yahoo.com',
            'nsaravia@bakercorp.com',
            'bpoliquin@pkdg.com',
            'dbailey@simplusmanagement.com',
            'elizabeth.cobb@sheaproperties.com',
            'aherrera@weoneil.com',
            'kadams@phhagopian.com',
            'jlim@cal-city.com',
            'estepien@semaconstruction.com',
            'bret@abcresource.biz',
            'bbochman@jmfiberoptics.com',
            'chlee@austin-ind.com',
            'cdsa@burnsmcd.com',
            'ichiaverini@mccarthv.com',
            'dkim@corbelarchitects.com',
            'dwithee@witheemalcolm.com',
            'mhoward@georgethall.com',
            'adiefenbach@wespactilbury.ca.',
            'designworks@lagroupinc.net',
            'ssindian@ktgy.com',
            'twhite@studio-111.com',
            'fmk@amiranconstruction.com',
            'mlarsen@wng.com',
            'brad@fullmerco.com',
            'dsilva@amgassociatesinc.com',
            'smoore@murphy.ac',
            'khelgevold@mccarthy.com',
            'bcorrie@pavementrecycling.com',
            'mheinrich@architectsorange.com',
            'jperkins@commercelp.com',
            'dpgehman@hedev.com',
            'baustin@griffithcompany.net',
            'mprosperi@corrpro.com',
            'sandy@wdgottconstruction.com',
            'ken.salyer@hmcarchitects.com',
            'pca@dslextreme.com',
            'jgavin@ktgy.com',
            'lellisor@shopoff.com',
            'gconde@jensenpartners.com',
            'astoltz@ktgy.com',
            'gverabian@johnsonfain.com',
            'hao.wu@jhsnyder.net',
            'michael.gardner@csulb.edu',
            'jlee@aclrails.com',
            'khai@kecengineering.com',
            'smbishop@smmusd.org',
            'jspear@griffithcompany.net',
            'eroe@bernards.com',
            'sonnychan@royalconstructionsite.com',
            'nasouth@weoneil.com',
            'mchokshi@baliconstruction.com',
            'estimator@marinaco.com',
            'simon@slarch.com',
            'dennis.gansen@sully-miller.com',
            'estimating@sully-miller.com',
            'mike@rga-architects.com',
            'charlesa@architectsorange.com',
            'skent@kempbros.com',
            'jacob@padelford.com',
            'alisha.fonder@lundgren.net',
            'brett@blueironinc.com',
            'estimating@environcon.com',
            'pablo@doreckconstruction.com',
            'hughr@architectsorange.com',
            'dan@tca-arch.com',
            'ccelis@moorefieldconstruction.com',
            'kdelatorre@sscconstruction.net',
            'anita.flores@abm.com',
            'elaine.hong@servitek-solutions.com',
            'danielle@gpaconsulting-us.com',
            'rosana.caputo@aecom.com',
            'creyes@farwestcorrosion.com',
            'sam@ffstech.com',
            'lglidden@cityofpalmdale.org',
            'matt@preferredmodular.com',
            'katebian@tci-corp.com',
            'justin@swpipeline.com',
            'marcus.z@sjdandb.com',
            'cwc.quote@gmail.com',
            'andrew@elcaminoasphalt.com',
            'commark@nationalcon.com',
            'sirisutd@metro.net',
            'gaa@gaaarchitects.com',
            'sam@wachtarchitects.com',
            'rami.elhassan@idsgi.com',
            'bob.murrin@acmartin.com',
            'jlenherr@huitt-zollars.com',
            'jmckenzie@penhall.com',
            'brandon.gonzales@pepperdine.edu',
            'avalenzuela@calandscape.com',
            'chadmorgan@primegroupconstruction.com',
            'jmagana@malcolmdrilling.com',
            'johnchi@cal-averland.com',
            'carmodyconst@aol.com',
            'bdawadi@civiltec.com',
            'mtinajero@sjamoroso.com',
            'kkurz@dragados-usa.com',
            'justin@sergentconstructionservices.com',
            'sfierce@taylorfierce.com',
            'murat@crownfence.com',
            'april@kazoni-inc.com',
            'kgoodson@wvusd.k12.ca.us',
            'rbettfreund@masselec.com',
            'b.whittle@tci-corp.com',
            'dmcgrew@griffithcompany.net',
            'bd@mnsengineers.com',
            'sean.gamette@polb.com',
            'anna.castillo@tutorsaliba.com',
            'info@masselec.com',
            'krystal@gggdemo.com',
            'seedondig@icsinc.tv',
            'jsykes@sully-miller.com',
            'greg@sterndahl.com',
            'rpolhamus@sitescapes.net',
            'atalkington@jflelectricinc.com',
            'nick@technocoatings.com',
            'karl.hamilton@hmcarchitects.com',
            'bbarker@bernards.com',
            'seaverr@henrymayo.com',
            'estimating@cjwconstruction.com',
            'tbrull@klorman.com',
            'chris.murray@humphreys.com',
            'jeff.heilman@lennar.com',
            'gscott@peakholdings.com',
            'jburroughs@commercelp.com',
            'info@henselphelps.com',
            'billc@urban-concepts.com',
            'msoto@architectsorange.com',
            'chris.lamberth@hok.com',
            'nb@mccarthy.com',
            'contact@laterradev.com',
            'jdinkin@regentproperties.com',
            'smckendry@mdsla.com',
            'ighiam@leoadaly.com',
            'hee.yang@exbon.com',
            'msmith@hcarchitects.com',
            'vtellez@rcbeckerandson.com',
            'karen@neffcon.com',
            'hr@bnbuilders.com',
            'jim@ridgela.com',
            'davido@architectsorange.com',
            'ridwan@icon-west.com',
            'annak@morilloconstruction.com',
            'dbryant@fclp.com',
            'dafna@spfa.com',
            'estimating@diversified.contractors',
            'kyle@pinnerconstruction.com',
            'civil@civil-source.com',
            'emather@ahbe.com',
            'info@morgnerco.com',
            'socalestimating@kiewit.com',
            'contact@lcra-architects.com',
            'david.travers@build-laccd.org',
            'osaifan@saifcoinc.com',
            'pmajich@colich.com',
            'mark@mjsdesigngroup.com',
            'dkline@ewsinc.org',
            'gcongdon@leesaklv.com',
            'jgrady@csigc.com',
            'chircomichael@yahoo.com',
            'sbarth@mryarchitects.com',
            'mike.siciliano@aecom.com',
            'bonnie.markle@tetratech.com',
            'skingsnorth@pfeifferpartners.com',
            'raffi.t@mincoconstruction.com',
            'dobbels@mcmjac.com',
            'bitech@bitechconstruction.com',
            'amankar@johnsonfain.com',
            'tartis@iqasolutions.com',
            'danderson@nadelarc.com',
            'dhorrocks@harborfreight.com',
            'campbell@januscorp.com',
            'gfarber@ladpw.org',
            'sales@oneildata.com',
            'knewman@nggpartners.com',
            'rackerman@bigrockpartners.com',
            'ckirschner@hardyandharper.com',
            'mluer@allamericanasphalt.net',
            'dphan@mackone.com',
            'tci@technioncontractors.com',
            'dduke@arbinc.com',
            'info@runklecanyon.com',
            'mark@pcm-construction.com',
            'jenniferdeiongh@rjnoblecompany.com',
            'kcc@edgrush.com',
            'tiffany.hong@dot.ca.gov',
            'sandradawson@dawson-mauldin.com',
            'dennis@rga-architects.com',
            'lnfo@owengroup.com',
            'cabids@westernemulsions.com',
            'info@hrarch.com',
            'estimating1@pavementrecycling.com',
            'oruiz@nadelarc.com',
            'gmubarak@gmzeng.com',
            'kapel@fullerton.edu',
            'pstamp@pcl.com',
            'dclem@telacu.com',
            'costimating@baliconstruction.com',
            'lilah@harikconstructioninc.com',
            'christopher.king@acmartin.com',
            'jortiz@hple.co',
            'jdixon@tsminc.com',
            'mbermudo@fcccousa.com',
            'abarar@gonzalezgoodale.com',
            'somara@henselphelps.com',
            'spo@radoscompanies.com',
            'info@ewaillc.com',
            'jacquie.gomez@lendlease.com',
            'salbert@tagarch.net',
            'info@whainc.com',
            'edick.ohanion@lacity.org',
            'dhamilton@hamilton-associates.net',
            'jtopolski@bernards.com',
            'rponce@digitalnetworksgroup.com',
            'r-sanchez@sully-miller.com',
            'dackerman@frontierkemper.com',
            'twarren@hollandpartnergroup.com',
            'jeffery.schiferstein@greystar.com',
            'info@mcc-construction.com',
            'paul@paulessickarchitects.com',
            'jgrant@dlrgroup.com',
            'acutner@imadesign.com',
            'ntrammer@henselphelps.com',
            'alynn@mccarthy.com',
            'darren.phelan@rsconst.com',
            'bmaxwell@laytonconstruction.com',
            'btmiller@hedev.com',
            'rfryer@vccusa.com',
            'motavka@hartdistrict.org',
            'dpancake@pancakearchitects.com',
            'nick@securitypaving.com',
            'general@allamericanasphalt.com',
            'jnovoa@rcbo.org',
            'jefff@oltmans.com',
            'kwood@vc-inc.net',
            'jerry@hillcrestcontracting.com',
            'estimating@environcon.com',
            'geraldine@paleosolutions.com',
            'michali@m2a-architects.com',
            'luisr@angelescontractor.com',
            'peter.an@exbon.com',
            'ckurtz@digitalnetworksgroup.com',
            'mel@melsmithelectric.com',
            'mdombrowski@xcelmec.com',
            'gmeade@bernards.com',
            'chris.conaway@zgf.com',
            'harmik.aghanian@arcadis.com',
            'james@prominentinc.com',
            'ssolaas@kempbros.com',
            'edelangel@adamson-associates.com',
            'robbie@nwexc.com',
            'wchang@tca-arch.com',
            'sburan@cimgroup.com',
            'jdelacal@coarchitects.com',
            'coberosler@accoes.com',
            'long@ipicorp.us',
            'jeffw@foga.com',
            'edwin.aleman@kiewit.com',
            'ariel@valliarch.com',
            'jleslie@kdc-systems.com',
            'agrissinger@bernards.com',
            'kevin.work@ocpw.ocgov.com',
            'info@sukut.com',
            'info@securitypaving.com',
            'nikiaa@climatec.com',
            'samuel@sqlainc.com',
            'megan@amarinecorp.com',
            'bernardohernandez@hillintl.com',
            'info@sva-architects.com',
            'young@angelescontractor.com',
            'lsummers@ktgy.com',
            'taylor.david.stone@jci.com',
            'lise@kfarchitects.com',
            'pfu@wrd.org',
            'acisneros@radoscompanies.com',
            'estimating@pcn3.com',
            'jho@nocccd.edu',
            'sharonf@colich.com',
            'grfcoinc@gmail.com',
            'bbuckley@fullmerco.com',
            'jrosin@kearny.com',
            'eric@tca-arch.com',
            'jpollard@isecinc.com',
            'jhighwart@cuningham.com',
            'efields@fieldsholdings.com',
            'larry.villaluna@va.gov',
            'skye9008@yahoo.com',
            'jimq@buildgc.com',
            'david.martin@psomas.com',
            'louis.tsai@ladwp.com',
            'greg.watanabe@ghd.com',
            'info@artukovich.com',
            'ssorensen@wilshirecapital.com',
            'katie.desmith@jfshea.com',
            'cabe@ahbe.com',
            'hibbert@dfhaia.com',
            'estimating1@pavementrecycling.com',
            'bids@calandscape.com',
            'dana@skidrow.org',
            'larry.w@wessex-industries-inc.com',
            'charles@emeraldladesign.com',
            'cmelton@knitter.com',
            'gsoderbergh@vtbs.com',
            'aapler@designarc.net',
            'thsiao@coarchitects.com',
            'danderson@luckman.us',
            'rvelazquez@watg.com',
            'kimberly.kilgour@smithgroupjjr.com',
            'mksikora@caltech.edu',
            'jlockwood@henselphelps.com',
            'tim@drpllc.com',
            'sandi_warneke@gensler.com',
            'tony@vtelectric.net',
            'jmcdavid@wrd.org',
            'nguerrero@semaconstruction.com',
            'scott@gilbertandstearnselectric.com',
            'lilah@harikconstruction.com',
            'asarsam@hillpartnership.com',
            'rcc@rossetticonst.com',
            'jlim@cal-city.com',
            'socalestimating@kiewit.com',
            'gary.allen@build-laccd.org',
            'bdermatoan@sjamoroso.com',
            'estimating@leedelectric.com',
            'daniel@icon-west.com',
            'lgiordano@mccarthy.com',
            'rcathey@ocair.com',
            'dalek@activatedcarbon.com',
            'lori.olivas@jfshea.com',
            'imt2@americall.org',
            'mtweed@htharchitects.com',
            'naha.fakhouri@fcgconsultants.com',
            'carolyn.appelt@coronaca.gov',
            'craig.rothenburger@ibigroup.com',
            'jerickson@bernards.com',
            'rjwocik@radoscompanies.com',
            'vbharne@mparchitects.com',
            'ryan.davis@smithgroupjjr.com',
            'abby.white@perkinswill.com',
            'raragon@jssc.biz',
            'aalper@designarc.net',
            'mmunoz@mznconstruction.com',
            'clarkjh@bv.com',
            'inkon@hparchs.com',
            'menglhard@profiencycapital.com',
            'justind@pinnerconstruction.com',
            'tnaranjo@marneconstruction.com',
            'willcoinc@sbcglobal.net',
            'joel.kriwinski@drilltechdrilling.com',
            'laguna@swagroup.com',
            'dmccarty@designarc.net',
            'tmcdonal@lasd.org',
            'rebecca.elrod@gs.com',
            'casey@fullmerco.com',
            'aperera@bernards.com',
            'ksp@carrierjohnson.com',
            'vely.zajec@humphreys.com',
            'chriso@climatec.com',
            'kwilliams@slaterbuilders.com',
            'bidinfo@biosconstruction.com',
            'mikec@architectsorange.com',
            'sha@steinberg.us.com',
            'wrasic@warasic.com',
            'greg@nazerian.net',
            'ascales@ktgy.com',
            'orbital.construction@gmail.com',
            'dubi@mnrconst.com',
            'trasmussen@metahousing.com',
            'jron@petrolaborforce.com',
            'babby@ftcgc.com',
            'spolyzoides@mparchitects.com',
            'tomb@architectsorange.com',
            'kyle@seawestinc.com',
            'dcollins@traylor.com',
            'yael@yaellir.com',
            'sgonzalez@dlrgroup.com',
            'harry@hjconst.com',
            'shutson@tca-arch.com',
            'info@melia-homes.com',
            'tobins@architectsorange.com',
            'garzabirdme@bv.com',
            'tyler.hart@jameshardie.com',
            'aloizu@hotmail.com',
            'ddo@warasic.com',
            'vdipalma@urenet.com',
            'r.carder@air-ex.com',
            'sales@apsicm.com',
            'abanerjee@oed-inc.com',
            'matt@toroenterprises.com',
            'sam.yu@stvinc.com',
            'wconst@exbon.com',
            'pasadena@mcmjac.com',
            'michael.yang@azuregroupusa.com',
            'jackm@federalsales.com',
            'abid.chowdhry@lacity.org',
            'sbison@scsengineers.com',
            'gerardo@novusconstruction.com',
            'biddesk@digitalnetworksgroup.com',
            'lchiu@lpainc.com',
            'santaanasales@unitedwaterworks.com',
            'gwinco1@aol.com',
            'tom.modica@longbeach.gov',
            'bidcipp@spinielloco.com',
            'richard.schultz@aecom.com',
            'eymurakami@pcl.com',
            'winni@novusconstruction.com',
            'sarlotti@kempbros.com',
            'd.schneider@fhsp.net',
            'barial@dlrgroup.com',
            'info@radoscompanies.com',
            'jhill@pcl.com',
            'robert.cull@hok.com',
            'plloyd@hntb.com',
            'asia@asiagcinc.com',
            'investorinfo@myrgroup.com',
            'bradm@whainc.com',
            'jason@kemcorp.net',
            'info@leedelectric.com',
            'rdsteel.estimating@gmail.com',
            'svanboxtel@craigrealtygroup.com',
            'eclapp@westportcp.com',
            'brad@raa-inc.com',
            'wsturgill@vtbs.com',
            'samirh@hannoucheandkang.com',
            'fred@greenbuildingcorporation.com',
            'ryanagita@ymarch.com',
            'landerson@caltrop.com',
            'klovell@bbarchitects.com',
            'rbonura@elcamino.edu',
            'bids@sscconstruction.com',
            'rjones@sbscorp.us',
            'media@hmcarchitects.com',
            'min.je@exbon.com',
            'shawn@okbarchitects.com',
            'dowens@mbimedia.com',
            'dan@silveradocontractors.com',
            'heather@millerenvironmental.com',
            'brandon@sms-arch.com',
            'info@icon-west.com',
            'jdietze@architectsorange.com',
            'cher@bonannidevelopment.com',
            'kfarrell@rtkl.com',
            'bid@ianthomasinc.com',
            'mtanner@arbinc.com',
            'socalestimating@kiewit.com',
            'jfitch@jzmkpartners.com',
            'info@hrarch.com',
            'tim.jones@lewismc.com',
            'rbianchi@thenewhomecompany.com',
            'swong@kleinfelder.com',
            'kt@kevintsaiarchitecture.com',
            'apullman@studio-111.com',
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
