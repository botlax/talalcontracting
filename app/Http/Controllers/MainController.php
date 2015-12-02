<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ApplicationRequest;
use App\Http\Controllers\Controller;
use App\Project;
use App\Position;
use App\Duty;
use App\Skill;
use App\Requirement;
use App\Applicant;
use App\Photos;
use App\Team;
use Input;
use Mail;
use Flash;

class MainController extends Controller
{   
    /**
     * Display homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('completion_date','DESC')->orderBy('start_date','DESC')->take(10)->get();
        return view('pages.frontpage',compact('projects'));
    }

    /**
     * display about page
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $team = Team::all();
        return view('pages.about',compact('team'));
    }

    /**
     * display projects page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allProjects()
    {
        $projects = Project::orderBy('completion_date','DESC')->orderBy('start_date','DESC')->get();
        return view('pages.project',compact('projects'));
    }

     /**
     * display projects page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function project($project)
    {   
        $title = str_replace('-', ' ', $project);
        $title = ucwords($title);
        $name = str_replace('-', ' ', $project);
        $project = Project::where('name','like','%'.$name.'%')->first();
        $photos = $project->photo()->where('name','NOT LIKE','%featured%')->lists('name')->toArray();
        $zoom = 7;
        $marker = 'false';
        $location = ['25.286493', '51.221566'];
        if($project->location()->first() != null){
            $zoom = 13;
            $marker = 'true';
            $location = explode(', ', $project->location()->first()->name);
        }
        
        if(Project::where('completion_date','=',$project->completion_date)->where('name','NOT LIKE','%'.$name.'%')->count() > 0){
            if(Project::where('completion_date','=',$project->completion_date)->where('start_date','>',$project->start_date)->count() > 0){
                $nextLink = Project::where('completion_date','=',$project->completion_date)->where('name','NOT LIKE','%'.$name.'%')->orderBy('start_date','DESC')->lists('name')->first();
            }
            else{
               $nextLink = Project::where('completion_date','>',$project->completion_date)->orderBy('completion_date','ASC')->orderBy('start_date','ASC')->lists('name')->first();
            }
        }
        else{
            $nextLink = Project::where('completion_date','>',$project->completion_date)->orderBy('completion_date','ASC')->orderBy('start_date','ASC')->lists('name')->first();
        }
        //previous project
        if(Project::where('completion_date','=',$project->completion_date)->where('name','NOT LIKE','%'.$name.'%')->count() > 0){
            if(Project::where('completion_date','=',$project->completion_date)->where('start_date','<',$project->start_date)->count() > 0){
                $prevLink = Project::where('completion_date','=',$project->completion_date)->where('name','NOT LIKE','%'.$name.'%')->orderBy('start_date','ASC')->lists('name')->first();
            }
            else{
               $prevLink = Project::where('completion_date','<',$project->completion_date)->orderBy('completion_date','DESC')->orderBy('start_date','DESC')->lists('name')->first();
            }
        }
        else{
            $prevLink = Project::where('completion_date','<',$project->completion_date)->orderBy('completion_date','DESC')->orderBy('start_date','DESC')->lists('name')->first();
        }
        
        return view('pages.single-project',compact('marker','zoom','title','project','nextLink','prevLink','location','photos'));
    }

    /**
     * Display the contact page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendEmail()
    {
        $data = [];
        $data['name'] = trim(Input::get('name'));
        $data['email'] = trim(Input::get('email'));
        $data['subject'] = trim(Input::get('subject'));
        $data['body'] = trim(Input::get('message'));

        Mail::send('email.inquiry',$data,function($mail)use($data){
            $mail->from('info@talalcontracting.com','Info Talal Contracting');
            $mail->to('info@talalcontracting.com','Website Inquiry');
            $mail->replyTo($data['email']);
            $mail->subject('Inquiry sent from www.talalcontracting.com');
        });

        echo '<img src="{{url("/images/thankyou.png")}}" class="flex">';
    }

    public function careers()
    {
        $positions = Position::orderBy('position','ASC')->get();
        return view('pages.careers',compact('positions'));
    }

    public function career($position)
    {
        $position = str_replace('-', ' ', $position);
        $position = Position::where('position','LIKE','%'.$position.'%')->first();

        $duties = $position->duty()->get();
        $requirements = $position->requirement()->get();
        $skills = $position->skill()->get();

        $terms = explode(' ', $position->position);
        
        $related = Position::where(function($query)use($terms){
            foreach($terms as $term){
                $query->orWhere('position','LIKE','%'.$term.'%');
            }
        });

        $related = $related->where('position','NOT LIKE','%'.$position->position.'%');
        $related = $related->take(5)->get();
        //dd($position);
        if(!empty($related->toArray())){
            $asideTitle = 'Related Jobs';
        }
        else{
            $asideTitle = 'Other Vacant Jobs';
            $related = Position::where('position','NOT LIKE','%'.$position->position.'%')->take(5)->get();
        }

        return view('pages.single-career',compact('position','duties','requirements','skills','related','asideTitle'));
    }
    

    public function apply($position){
        
        $countries = $this->getCountries();
        $position = str_replace('-', ' ', $position);
        $position = Position::where('position','LIKE','%'.$position.'%')->first();
        return view('pages.apply',compact('position','countries'));
    }

    public function storeApplication(ApplicationRequest $request, $position){

        $position = Position::find($position);

        $applicant = [
            'firstname' => trim($request->input('firstname')),
            'lastname' => trim($request->input('lastname')),
            'email' => trim($request->input('email')),
            'country' => $this->getCountryName($request->input('country')),
            'mobile' => trim($request->input('mobile')),
            'coverletter' => trim($request->input('coverletter')),
            'position_id' => $position->id
        ];

        $resume = Input::file('resume');
        if($resume->isValid()){
            $digits = 5;
            $ext = $resume->getClientOriginalExtension();
            $filename = strtolower($applicant['lastname']).'-'.strtolower($applicant['firstname']).rand(pow(10, $digits-1), pow(10, $digits)-1);
            $destination = storage_path().'/cv';

            $applicant['resume'] = $filename.'.'.$ext;
            $resume->move($destination,$applicant['resume']);
        }

        $data = $applicant;
        $data['position'] = $position->position;
        Applicant::create($applicant);

        Mail::later(60,'email.newapplicant',$data,function($mail)use($applicant,$destination,$position){
            $mail->from('info@talalcontracting.com', 'Applicant - '.$applicant['firstname'].' '.$applicant['lastname']);
            $mail->to('sachin@talalcontracting.com', 'HR Department');
            $mail->bcc('it@talalcontracting.com');
            $mail->replyTo($applicant['email'], $applicant['firstname'].' '.$applicant['lastname']);
            $mail->subject('Application for '.$position->position.' - '.$applicant['firstname'].' '.$applicant['lastname']);
            $mail->attach($destination.'/'.$applicant['resume']);
        });

        Mail::later(10,'email.applicant',$data,function($mail)use($applicant,$position){
            $mail->from('info@talalcontracting.com', 'Applicant - '.$applicant['firstname'].' '.$applicant['lastname']);
            $mail->to($applicant['email'], $applicant['firstname'].' '.$applicant['lastname']);
            $mail->subject('Your Application ('.$position->position.')- '.$applicant['firstname'].' '.$applicant['lastname']);
        });

        Flash::overlay('Your application for '.$position->position.' was successfully submitted. You will receive an email shortly regarding your application.','Thank you!');
        return redirect('/careers');
    }
/*
    public function showemail(){
        return view('email.applicant');
    }*/
    /*------------helper functions--------------*/

    public function getCountries(){
        return [
            ''=>'',
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua And Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia And Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo',
            'CD' => 'Congo, Democratic Republic',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote D\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island & Mcdonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran, Islamic Republic Of',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle Of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia, Federated States Of',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory, Occupied',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts And Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre And Miquelon',
            'VC' => 'Saint Vincent And Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome And Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia And Sandwich Isl.',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard And Jan Mayen',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad And Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks And Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Viet Nam',
            'VG' => 'Virgin Islands, British',
            'VI' => 'Virgin Islands, U.S.',
            'WF' => 'Wallis And Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe',
        ];
    }

    public function getCountryName($countryCode){
        $countries = $this->getCountries();
        return $countries[strtoupper($countryCode)];
    }
}
